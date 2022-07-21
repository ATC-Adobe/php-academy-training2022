<?php
/*

Simple script language implementation in PHP

Example syntax:

func Average(arg1, arg2, arg3) {

    t = (arg1 + arg2 + arg3) / 3

    return t
}


// any spacing allowed
func Max       (a,b     ) {
    if   (  a>     b) { return     a} else {return b}
}

*/




declare(strict_types = 1);

$script = "

print(10)

";

$script2 =
    "

func SomeFunction(par1, par2) {
    
    st = par1 + par2
    st2 = max(par1, par2)
    
    return *(st, st2, 1337)
}

print SomeFunction(10, 13)
";

echo $script;

echo '<br><br>';

const WHITES = 1;
const TOKEN = 2;
const NUMBER = 3;

const WHITE      = "@[\ \t\n]@";
const DIGIT      = "@[0-9.]@";
const WORD       = "@[a-zA-Z+*/!\-]@";
const SPECIAL    = "@[=\[\]\(\)\{\}]@";
const OPERATOR   = "";


function tokenizer($script) : array {

    $mode = WHITES;

    $i = 0;

    $white      = "@[\ \t\n]@";
    $digit      = "@[0-9]@";
    $word       = "@[a-zA-Z+*/!\-]@";
    $specials   = "@[=\[\](){},]@";

    $acc = '';

    $dest = [];

    // DFA-like parsing
    for(; $i < strlen($script); $i ++) {
        $char = $script[$i];

        if(preg_match($specials, $char)) {

            if($mode != WHITES) {
                if($mode == NUMBER) {
                    //echo "NUMBER: ".$acc.'<br>';
                    $mode = WHITES;
                    $dest[] = $acc;
                    $acc = '';
                }
                elseif($mode == TOKEN) {
                    //echo "TOKEN: ".$acc.'<br>';
                    $mode = WHITES;
                    $dest[] = $acc;
                    $acc = '';
                }
            }

            //echo "SPECIAL: ".$char.'<br>';
            $dest[] = $char;
            continue;
        }

        if($mode == WHITES) {
            if(preg_match($white, $char)) {
                continue;
            }
            elseif(preg_match($digit, $char)) {
                $acc = $char;
                $mode = NUMBER;
            }
            elseif(preg_match($word, $char)) {
                $acc = $char;
                $mode = TOKEN;
            }

        }
        elseif($mode == NUMBER) {
            if(preg_match($white, $char)) {
                //echo "NUMBER: ".$acc.'<br>';
                $mode = WHITES;
                $dest[] = $acc;
                $acc = '';
                continue;
            }
            elseif(preg_match($digit, $char)) {
                $acc .= $char;
                continue;
            }
            elseif(preg_match($word, $char)) {
                die('eval error');
            }
        }
        elseif($mode == TOKEN) {
            if(preg_match($white, $char)) {
                //echo "TOKEN: ".$acc.'<br>';
                $mode = WHITES;
                $dest[] = $acc;
                $acc = '';
                continue;
            }
            elseif(preg_match($digit, $char)) {
                $acc .= $char;
                continue;
            }
            elseif(preg_match($word, $char)) {
                $acc .= $char;
                continue;
            }
        }
    }
    return $dest;
}

print_r($arr = tokenizer($script));

$environ = [
    '+'   => new EnvApply(function ($a, $b) { return $a + $b; }),
    '*'   => new EnvApply(function ($a, $b) { return $a * $b; }),
    'max' => new EnvApply(function ($a, $b) { return max($a , $b); }),
    'print' => new EnvApply(function ($a) { echo $a.'<br>'; return $a; }),
    'lifeValue' => new EnvVariable(42),
];

class EnvApply {
    public array $applyf;
    public function __construct(callable $apply) {
        $this->applyf = [$apply];
    }

    public function apply(...$args) {
        return $this->applyf[0](...$args);
    }
}

class EnvVariable {
    public mixed $value;
    public function __construct(mixed $val) {
        $this->value = $val;
    }
}

abstract class Program {
    public abstract function eval(array $environ) : mixed;
}

class Constant extends Program {

    private mixed $val;

    public function __construct(mixed $val) {
        $this->val = $val;
    }

    public function eval(array $environ): mixed {
        return $this->val;
    }
}

class Apply extends Program {

    private string $name;
    private array $program;

    public function __construct(string $name, array $program) {
        $this->name = $name;
        $this->program = $program;
    }

    public function eval(array $environ): mixed {
        $arg = [];

        foreach ($this->program as $prog) {
            $arg[] = $prog->eval($environ);
        }

        return $environ[$this->name]->apply(...$arg);
    }
}

function buildProgram(ArrayIterator $prog) : ?Program {

    $token = $prog->current();
    $prog->next();

    echo $token;

    $white      = "@[\ \t\n]@";
    $digit      = "@[0-9]@";
    $word       = "@[a-zA-Z+*/!\-]@";
    $specials   = "@[=\[\]\(\)\{\}]@";

    if(preg_match($digit , $token)) {
        return new Constant(intval($token));
    }

    // function
    if($prog->current() == '(') {
        $prog->next();

        $arg = [];

        $curr = $prog->current();

        while($prog->current() != ')') {
            $arg[] = buildProgram($prog);
        }

        $prog->next();

        return new Apply($token, $arg);
    }

    return null;
}

echo '<br><br>';

// na razie zaimplementowana ewaluacja lispo-podobna
$program = 'print( max (+(5 90) *(6 7) ) )  ';

$ex = buildProgram(new ArrayIterator(tokenizer($program)));

echo '<br><br>';

$ex->eval($environ);

echo '<br><br>';

$ex = new Apply('print', [ new Constant(10) ]);

echo '<br><br>';

$ex->eval($environ);








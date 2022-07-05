
This is an exercise for my upcomming Algorithms-and-Data-Structures exam
<br><br>
<?php

// longest common subsequence od 2 strings
function lcs(string $a, string $b) : string {
    $a = " " . $a;
    $b = " " . $b;


    $m = [[]];
    for($j = 0; $j < strlen($b); $j++)
        $m[0][] = 0;

    for($i = 1; $i < strlen($a); $i++) {
        $mp = [0];


        for($j = 1; $j < strlen($b); $j++) {
            if ($a[$i] == $b[$j]) {
                $mp[] = 1 + $m[$i - 1][$j - 1];
            } else {
                $mp[] = max($m[$i - 1][$j], $mp[$j - 1]);
            }
        }

        $m[] = $mp;
    }

    /*for($i = 1; $i < strlen($a); $i++) {
        for($j = 1; $j < strlen($b); $j++) {

            echo " ".$m[$i][$j]." ";
        }

        echo '<br>';
    }*/

    $i = strlen($a) - 1;
    $j = strlen($b) - 1;

    $res = "";

    while($i > 0 && $j > 0) {
        if($a[$i] == $b[$j]) {
            $res = $a[$i] . $res;
            $i--; $j--;
        }
        else {
            if($m[$i - 1][$j] > $m[$i][$j - 1]) {
                $i--;
            } else {
                $j--;
            }
        }

    }

    return $res;
}

echo lcs("abaaaacgghj", "baaabckkkh");

// given array $arr find $i-th smallest element
function selection($arr, $i) : int {

    echo '<br>'.$i.'<br>';

    print_r($arr);
    echo '<br>';

    $delim = $arr[rand(0, count($arr)-1)];

    echo $delim.'<br>';

    $count = 0;
    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] <= $delim)
            $count++;
    }

    if($count == $i)
        return $delim;

    if($count < $i) {
        return selection(
                array_filter($arr,
                function ($arg) use ($delim) { return $delim < $arg; }),
        $i - $count);
    }
    else {
        return selection(
            array_filter($arr,
                function ($arg) use ($delim) { return $delim >= $arg; }),
            $i);
    }
}



?>
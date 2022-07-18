<?php


use Router\Response;
use Router\Router;

$router = new Router('404.html');

// an attempt at lazy loading
$router->get('/test', function(Response $res) {

    // structure for variables
    class EndPoint {
        // value path is resolving to, string for now, callback in the router
        public string $value;

        // path as iterator
        public ArrayIterator $it;

        // list of endpoints if current path is only part of more endpoints
        // loaded lazily
        public array $endpoints;

        public function __construct(string $path, string $value) {
            $this->value = $value;
            $this->it = new ArrayIterator(explode('/', $path));
            $this->endpoints = [];
        }

        public function __toString() : string {
            return $this->value.'<br>'.var_dump($this->it).'<br>'.var_dump($this->endpoints).'<br>';
        }
    }

    // example endpoints
    $path = [
        new EndPoint ('/a/b/c/d/e/f', '1'),
        new EndPoint ('/', '2'),
        new EndPoint ('/a/c', '3'),
        new EndPoint ('f', '4')
    ];

    // endpoint with internal endpoint attached
    $path[1]->endpoints = [new EndPoint("d", '2')];

    $it = $path;

    // path to resolve
    $query = explode('/', '/d');

    // iterating over requested path
    foreach ($query as $part) {

        // filter out all not matching paths
        $it = array_values(
            array_filter($it, function ( EndPoint $arr) use ($part) : bool {
                if($part == $arr->it->current()) {
                    return true;
                }
            return false;
        }));

        // if array is at the end but has endpoints attached -> attach them
        // bug here
        array_map(function(EndPoint $arr) use ($it) {
            if($arr->it->valid()) {
                $arr->it->next();
            }
            if($arr->it->current() == '') {
                foreach($arr->endpoints as $endpoint) {
                    $it[] = $endpoint;
                }
            }
        }, $it);

        // some debug statements
        echo '=======[ITER]=<br>';
        foreach($it as $i) {
            echo $i;
            echo '========<br>';
        }
        echo '<br><br><br>';
    }

    // results
    if(count($it) > 0) {
        echo "found path<br>";
        var_dump( $it[0] );
    }

    die();
});

$router->get('/user', function(Response $res) {
    var_dump(
        (new \User\Repository\UserConcreteRepository())
            ->getAllUsers()
    );

    die();
});
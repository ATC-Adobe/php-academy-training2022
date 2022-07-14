<?php

namespace System\Util;

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

//echo lcs("abaaaacgghj", "baaabckkkh");

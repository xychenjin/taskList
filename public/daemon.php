<?php 
/*
	$a = getopt('server');

	var_dump($a);*/

function twoSum($nums, $target) {

    $current = [];
    foreach($nums as $key=>$val) {
        for($i = $key+1;$i < count($nums); $i++) {
            if ($nums[$i] + $val == $target) {
                $current[$key] = $nums[$key];
                $current[$i] = $nums[$i];
                break;
            }
        }
    }

    return $current;
}


$a = [2,7,12,13,14];

$b = 27;

var_dump(twoSum($a, $b), $b);
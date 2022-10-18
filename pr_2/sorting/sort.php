<?php
function mergeSort(array $array = null) {
    $length = count($array);
    if ($length <= 1) {
        return $array;
    }
    $left_part = array_slice($array, 0, (int)($length / 2));
    $right_part = array_slice($array, (int)($length / 2));

    $left_part = mergeSort($left_part);
    $right_part = mergeSort($right_part);

    return merge($left_part, $right_part);
}

function merge(array $left, array $right) {
    $res = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
        array_push($res, array_shift($left));
        }
        else {
            array_push($res, array_shift($right));
        }
    }

    array_splice($res, count($res), 0, $left);
    array_splice($res, count($res), 0, $right);

    return $res;
}
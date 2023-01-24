<?php

function drawFigure($figure_id) {
    $figure_type = $figure_id & getPositiveBits(2);
    $color = $figure_id >> 2 & getPositiveBits(12);
    $color = getColor($color);
    $svg_res = '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="1200" version="1.1">';
    if ($figure_type == 1) {
        $width = $figure_id >> 14 & getPositiveBits(9);
        $height = $figure_id >> 23 & getPositiveBits(9);
        if ($width < 20) {
            $width = 20;
        }
        if ($height < 20) {
            $height = 20;
        }
        $svg_res .= '<rect x="600" y="600" width="' . $width . '" height="' . $height . '" fill="' . $color .'"/>';
    }
    else if ($figure_type == 0) {
        $r = $figure_id >> 14 & getPositiveBits(9);
        if ($r < 10) {
            $r = 10;
        }
        $svg_res .= '<circle cx="600" cy="600" r="' . $r . '" fill="' . $color .'"/>';
    } else {
        $points = getPoints($figure_id, 6, 14);
        addPointsToSvg($svg_res, $points);
        $svg_res .= '" fill="' . $color .'"/>';
    }
    return $svg_res;
}

function getPoints($figure_id, $count, $offset) {
    $points = array();
    $bits = 7;
    for ($i = 0; $i < $count; $i++) {
        $temp_point = $figure_id >> $offset & getPositiveBits($bits);
        if ($temp_point > 100) {
            $temp_point = random_int(50, 100);;
        }
        if ($temp_point <= 0) {
            $temp_point = random_int(2, 100);
        }
        $points[$i] = $temp_point * 10;
        $offset = $offset + $bits;
    }
    return $points;
}

function getColor($decimal_color) {
    $COLORS_ARRAY = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
    $result_color = '#';
    $offset = 0;
    while ($offset < 12) {
        $temp_color = $decimal_color >> $offset & getPositiveBits(4);
        $result_color .= $COLORS_ARRAY[$temp_color] . $COLORS_ARRAY[$temp_color];
        $offset = $offset + 4;
    }
    if ($color == '#ffffff') {
        return '#eeeeee';
    }
    return $result_color;
}

function addPointsToSvg(&$svg_res, $points) {
    $svg_res .= '<polygon points="';
    for ($i = 0, $size = count($points); $i < $size; $i++) {
        $svg_res .= $points[$i];
        if ($i != $size - 1) {
            $svg_res .= ' ';
        }
    }
}

function getPositiveBits($count) {
    return 2**$count - 1;
}

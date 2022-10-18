<?php
function drawFigure($figureId) {
    $res = '<svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="300" height="300">';
    $res .= '<defs><style>.cls-1 {fill: none;stroke: #1d1d1b;stroke-miterlimit: 10;stroke-width: 4px;overflow: visible;}</style></defs>';
    if ($figureId == 1) {
        $res .= '<rect class="cls-1" x="120" y="120" width="100" height="100"/>';
    }
    else if ($figureId == 2) {
        $res .= '<circle class="cls-1" cx="120" cy="120" r="100"/>';
    }
    else if ($figureId == 3) {
        $res .= '<polygon class="cls-1" points="134.16 4 3.46 230.37 264.85 230.37 134.16 4"/>';
    }
    else if ($figureId == 4) {
        $res .= '<polygon class="cls-1" points="149.61 6.47 183.47 110.7 293.06 110.7 204.4 175.11 238.27 279.34 149.61 214.92 60.95 279.34 94.81 175.11 6.16 110.7 115.74 110.7 149.61 6.47"/>';
    }
    else {
        $res = 'Такой фигуры нет';
    }
    return $res;
}
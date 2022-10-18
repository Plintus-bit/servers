<html>
    <head>
        <title>SORTING</title>
    </head>
    <body>
        <h1>Сортировка слиянием (3 вариант)</h1>
        <p>
            <?php
            $separator = ',';
            require_once "sort.php";
            print("Массив до сортировки: " . $_GET["array"] . "<br><br>");
            print("Массив после сортировки: " . implode($separator, mergeSort(explode($separator, $_GET["array"]))));
            ?>
        </p>
    </body>
</html>
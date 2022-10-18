<html>
    <head>
        <title>FIGURE DRAW</title>
    </head>
    <body>
        <h1>I can draw figures!</h1>
        <?php
            require_once 'draw.php';
            print(drawFigure($_GET["id"]));
        ?>
    </body>
</html>
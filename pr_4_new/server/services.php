<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Главная</title>
		<link href="./styles/style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
	<header>
        <nav id="nav">
            <h1>Услуги</h1>
            <div class="nav_links">
                <a class="links_link" href="home.php">Главная</a>
                <a class="links_link" href="profile.php">Профиль</a>
                <a class="links_link" href="index.html">Информация</a>
                <a class="links_link" href="#"></i>Услуги</a>
                <a class="links_link" href="logout.php"></i>Выйти</a>
            </div>
        </nav>
    </header>
	
    <div class="container">
        <?php
		   	$con = mysqli_connect("db", "user", "password", "appDB");
		   	$result=$con->query("SELECT * FROM services"); 
            echo "<table>";
		   	while ($row = mysqli_fetch_assoc($result)) 
		   	{
                echo "<tr><td>".$row["id"]."</td><td>".$row["s_name"]."</td><td>".$row["cost"]."</td></tr>";
		   	}
            echo "</table>";
			?>
    </div>
	</body>
</html>
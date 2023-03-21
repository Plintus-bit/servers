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
            <h1>Главная</h1>
            <div class="nav_links">
                <a class="links_link" href="#">Главная</a>
                <a class="links_link" href="profile.php">Профиль</a>
                <a class="links_link" href="services.php"></i>Услуги</a>
                <a class="links_link" href="logout.php"></i>Выйти</a>
            </div>
        </nav>
    </header>
	
	<section class="container">
        <div class="text-block">
			<p>Мы делаем дорого и некачественно</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam recusandae est doloremque odit quibusdam atque dolore.</p>
            <p>Lorem ipsum dolor sit amet.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio facere repudiandae tempora necessitatibus laborum quas reprehenderit ut eaque labore. Repudiandae corrupti at rerum.</p>
        </div>
    </section>
	</body>
</html>
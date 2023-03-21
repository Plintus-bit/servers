<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Профиль</title>
		<link href="./styles/style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
		<header>
			<nav id="nav">
				<h1>Главная</h1>
				<div class="nav_links">
					<a class="links_link" href="home.php">Главная</a>
					<a class="links_link" href="profile.php">Профиль</a>
					<a class="links_link" href="services.php"></i>Услуги</a>
					<a class="links_link" href="logout.php"></i>Выйти</a>
				</div>
			</nav>
		</header>
		<section class="container">
			<h2 class="header-text">Профиль</h2>
			<div>
				<table>
					<tr>
						<td>Имя пользователя:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Пароль:</td>
						<td><?=$_SESSION['pass']?></td>
					</tr>
				</table>
			</div>
		</section>
	</body>
</html>
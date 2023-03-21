<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
if(isset($_POST["submit"])) {
	
	$url = 'http://192.168.0.12:1000';

	$data = array('user' => $_SESSION['name'], 'info' => $_POST['info']);
	// use key 'http' even if you send the request to https://...
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data)
	    )
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ 
	var_dump($result);
	}
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
                <a class="links_link" href="index.html">Информация</a>
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

    <section class="conitainer">
		<form method="post">
            <input type="text" name="s_name" placeholder="service name"/>
            <input type="text" name="descript" placeholder="service description"/>
            <input type="number" name="cost" placeholder="service cost"/>
            <input type="submit" value="Post" class="submit" name ="submit"/>
        </form>
		</div>
        <?php
			$json = file_get_contents("http://192.168.0.12:1000/services");
			$obj = json_decode($json);
			
            echo "<table>";
		    foreach($obj as $serv){
                echo "<tr><td>" . $serv->s_name . "</td><td>" . $serv->descript . "</td><td>" . $serv->cost . "</td></tr>";
			    // echo '<div class="service">';
			    // echo "<h3>" ."Service: "  ."$serv->s_name". "</h3>" . "<p>". $serv->descript . "</p>" . "<p>". $serv->cost . "</p>";
			    // echo '</div> ';
		    }
            echo "</table>";
		?>
    </section>

	</body>
</html>
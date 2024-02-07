<?php 
include "Connect.php";
include "aheader.php";
$userQuery = "SELECT * FROM `Users` WHERE `user_id` = $user";
$user = $_COOKIE['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/CSS/reset.css">
    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>
	<?php
		echo "<h1>Добро пожаловать, " . $_COOKIE['Users'] . "!</h1>";
	?>
	<br>
	<a href="exit.php">Что бы выйти нажмите по ссылке.</a>
</body>
</html>
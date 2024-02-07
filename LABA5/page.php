<?php 
include "Connect.php";
$user = $_COOKIE['user_id'];
$userQuery = "SELECT * FROM `Users` WHERE `user_id` = $user";
$res = mysqli_fetch_all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Привет!</h1>
	<a href="exit.php">Что бы выйти нажмите по ссылке.</a>
</body>
</html>
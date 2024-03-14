<?php
include "aheader.php";
include "Connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>Привет " . $_COOKIE['username'] . "</h1>";
    ?>
    <a href="exit.php">Что бы выйти нажмите по ссылке.</a>

</body>

</html>
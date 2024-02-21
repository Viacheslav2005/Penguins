<?php
include "Connect.php";
include "aheader.php";
$new_id = isset($_GET["new"])?$_GET["new"]:false;

$query_getNew = "SELECT * from `News` where `news_id` = $new_id";
$new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));
$date = date("d:m:Y h:m:s", strtotime($new_info['publish_date']));
$mount = [
    '01' => 'Январь',
    '02' => 'Ферваль',
    '03' => 'Март',
    '04' => 'Апрель',
    '05' => 'Май',
    '06' => 'Июнь',
    '07' => 'Июль',
    '08' => 'Август',
    '09' => 'Сентябрь',
    '10' => 'Октябрь',
    '11' => 'Ноябрь',
    '12' => 'Декабрь'
];
$m_text = $mount[substr($date,3,2)];
$publish_date = substr($date,0,2)." ".$m_text." ".substr($date,6);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/reset.css">
    <link rel="stylesheet" href="/CSS/style.css">
    <title>Document</title>
</head>
    <body>
        <?php
        echo "<div class = 'card'>";
        echo "<div class = 'c_img'><img src = 'Image/News/".$new_info['image']. "'></div>";
        echo $new_info['title'];
        echo "<br>";
        echo $new_info['content'];
        echo "<br>";
        echo $publish_date;    
        ?>
    </body>
</html>
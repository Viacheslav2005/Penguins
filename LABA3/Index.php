<?php
include "Connect.php"; //выражение include включает и выполняет указанный файлах

$news = mysqli_query($con, "select * from news");

include "aheader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пингвины</title>
    <link rel="stylesheet" href="/CSS/reset.css">
    <link rel="stylesheet" href="/CSS/style.css">

</head>

<body>
    <main>
        <section class="last-news">
            <div class="container">
                <?php
                while ($new = mysqli_fetch_assoc($news)) {
                    echo "<div class = 'card'>";
                    $new_id = $new["news_id"];
                    echo "<div class ='c_img'> <img src='Image/News/" . $new['image'] . "'></div>";
                    echo "<a href ='OneNew.php?new=$new_id'>" . $new['title'] . "</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>
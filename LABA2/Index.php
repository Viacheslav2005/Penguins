<?php
include "Connect.php"; //выражение include включает и выполняет указанный файл
$news = mysqli_query($con, "SELECT * from `news`");
?>
<?php
include "aheader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пингвины</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <main>
        <section class="last-news">
            <div class="container">
                <?php

                //Выводится все карточки новостей

                while ($new = mysqli_fetch_assoc($news)) {
                    echo "<div class = 'card'>";
                    $new_id = $new["news_id"];
                    echo "<div class ='c_img'> <img src='Image/News/" . $new['image'] . "'></div>";
                    echo "<a href ='/'>" . $new['title'] . "</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>
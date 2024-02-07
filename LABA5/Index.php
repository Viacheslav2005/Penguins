<?php
include "Connect.php"; //выражение include включает и выполняет указанный файл
$news = mysqli_query($con, "SELECT * from `news`");
$query_cat = "";
$cat = isset($_GET["cat"]) ? $_GET["cat"] : false;
if ($cat) {
    $query_cat = " SELECT * FROM `News` WHERE `category_id` = $cat ";
} else {
    $query_cat = " SELECT * FROM `News`";
}
$result = mysqli_query($con, $query_cat);
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
                //Выводится все карточки новостей
                if (mysqli_num_rows($result) == 0) {
                    echo "Данных нет";
                } else {
                    while ($new = mysqli_fetch_assoc($result)) {
                        echo "<div class = 'card'>";
                        $new_id = $new["news_id"];
                        echo "<div class ='c_img'> <img src='image/news/" . $new['image'] . "'></div>";
                        echo "<a href ='oneNew.php?new=$new_id'>" . $new['title'] . "</a>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>
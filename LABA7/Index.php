<?php
include "Connect.php"; //выражение include включает и выполняет указанный файл
$news = mysqli_query($con, "SELECT * from `News`");

$filter = isset($_GET["cat"]) ? $_GET["cat"] : false;

$sort = isset($_GET["sort"]) ? $_GET["sort"] : false;

$search = isset($_GET["search"]) ? $_GET["search"] : false;

$query_search = "SELECT * FROM `News` WHERE `title` LIKE '%$search%'";

$search_result = mysqli_query($con, $query_search);

$query = "SELECT * FROM `News`";

$param = "";
if ($filter) {
    $param .= "cat=$filter";
    $query = " SELECT * FROM News WHERE category_id = $filter ";
}
if ($sort) {
    $query  = " SELECT * FROM news ORDER BY publish_date $sort";
    //$param .= "sort=$sort";
}
if ($sort && $filter) {
    $query  = " SELECT * FROM news WHERE category_id = $filter  ORDER BY publish_date $sort";
}
$news = mysqli_query($con, $query);

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
        <section class="sort_1">
            <div class="sort">
                <ul class="list-group list-group-horizontal mt-5 mb-3">
                    <h4>Сортировка по дате публикации:</h4>
                    <li class="list-group-item">
                        <a href="/?sort=ASC<?= ($param != "") ? '&' . $param : '' ?>"><img width="30" src="asc-sort.png" alt=""></a>
                    </li>
                    <li class="list-group-item">
                        <a href="/?sort=DESC<?= ($param != "") ? '&' . $param : '' ?>"><img width="30" src="desc-sort.png" alt=""></a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="last-news">
            <div class="container1">
                <?php
                //Выводится все карточки новостей
                if (mysqli_num_rows($news) == 0) {
                    echo "Данных нет";
                } else if (!empty($search)) {
                    while ($search_result_1 = mysqli_fetch_assoc($search_result)) {
                        echo "<div class = 'card'>";
                        $new_id =  $search_result_1["news_id"];
                        echo "<div class ='c_img'> <img src='image/news/" . $search_result_1['image'] . "'></div>";
                        echo "<a href ='oneNew.php?new=$new_id'>" . $search_result_1['title'] . "</a>";
                        echo "</div>";
                    }
                } else {
                    while ($new = mysqli_fetch_assoc($news)) {
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
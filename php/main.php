<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/theMiraeSeoul/db/create_statement.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/main.js"></script>
</head>

<body>
    <div class="container">
        <!-- header -->
        <?php
        include_once('./header.php');
        ?>

        <!-- article -->
        <article>
            <div class="article-group">
                <section class="section1">
                    <img src="../image/image.jpg" />
                </section>
                <section class="section2">
                    <span>체크인</span>
                    <input type="date" id="date1" />
                    <span>체크아웃</span>
                    <input type="date" id="date2" />
                    <input type="submit" id="submit" value="예약" />
                </section>
                <section class="section3">
                    <div class="section3-left">
                        <img src="../image/image.jpg" /><br>
                        <span>패키지명(1)</span><br>
                        <span>상품설명(1)</span><br>
                        <span>판매기간(1)</span>
                    </div>
                    <div class="section3-center">
                        <img src="../image/image.jpg" /><br>
                        <span>패키지명(2)</span><br>
                        <span>상품설명(2)</span><br>
                        <span>판매기간(2)</span>
                    </div>
                    <div class="section3-right">
                        <img src="../image/image.jpg" /><br>
                        <span>패키지명(3)</span><br>
                        <span>상품설명(3)</span><br>
                        <span>판매기간(3)</span>
                    </div>
                </section>
            </div>
        </article>

        <!-- footer -->
        <?php
        include_once('./footer.php');
        ?>
    </div>
</body>

</html>
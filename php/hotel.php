<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/hotel.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <div class="container">
        <!-- header -->
        <?php
            include('./header.php');
        ?>

        <!-- article -->
        <main>
            <article class="head">
                <h2>호 텔</h2>
            </article>
            <hr>
            <article class="main">
                <h1>소 개</h1>
                <table>
                    <tr>
                        <!-- 첫번째 줄 시작 -->
                        <td class="title">개 관 일</td>
                        <td>2021년 6월 11일</td>
                    </tr><!-- 첫번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title">주 소</td>
                        <td>서울특별시 성동구 왕십리로 303(지번주소: 성동구 행당동 284)</td>
                    </tr><!-- 두번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title">대표전화</td>
                        <td>02-441-6006</td>
                    </tr><!-- 두번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title" id="content">객실예약</td>
                        <td>02-441-7007</td>
                    </tr><!-- 두번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title">홈페이지</td>
                        <td> http://www.mrhi.or.kr/</td>
                    </tr><!-- 두번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title">구 조</td>
                        <td> 지하 4층 ~ 지상 15층</td>
                    </tr><!-- 두번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title">객 실 수</td>
                        <td> 총 61室</td>
                    </tr><!-- 두번째 줄 끝 -->
                    <tr>
                        <!-- 두번째 줄 시작 -->
                        <td class="title">시 설</td>
                        <td> 객실, 레스토랑, 피트니스 센터</td>
                    </tr><!-- 두번째 줄 끝 -->
                </table>
            </article>
        </main>
        <!-- footer -->
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
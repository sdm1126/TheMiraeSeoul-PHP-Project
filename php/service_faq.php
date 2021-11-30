<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/service_faq.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/aside.css">
</head>

<body>
    <div class="container">
        <!-- header -->
        <?php
            include('./header.php');
        ?>

        <!-- aside -->
        <aside>
            <div>
                <ul>
                    <li class="title">고객 서비스</li>
                    <hr>
                    <li>공지사항</li>
                    <li><b>F A Q</b></li>
                    <li>문의하기</li>
                </ul>
            </div>
        </aside>
        <main>
            <div class="h2">
                <h2>F A Q</h2>
            </div>
            <hr>
            <div class="search">
                <input type="text" placeholder="내용 검색">
                <input type="submit" value="검 색">
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th id="type">구분</th>
                        <th id="content">내용</th>
                    </tr>
                    <!-- 여기부터 PHP 반복문 사용 -->
                    <tr>
                        <td>Q</td>
                        <td>질문 내용</td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>대답 내용</td>
                    </tr>
                    <!-- 여기까지 PHP 반복문 사용 -->
                </table>
            </div>
        </main>

        <!-- footer -->
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
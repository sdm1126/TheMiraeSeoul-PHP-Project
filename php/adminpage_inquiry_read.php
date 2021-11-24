<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/service_inquiry.css">
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
                    <li class="title">관리자
                        <br>페이지
                    </li>
                    <hr>
                    <li>전체 정보</li>
                    <li>전체 예약</li>
                    <li><b>전체 문의</b></li>
                </ul>
            </div>
        </aside>

        <!-- article -->
        <main>
            <article class="head">
                <h2 id="h2">문의하기</h2>
            </article>
            <hr>
            <article class="main">
                <form action="">
                    <table>
                        <tr>
                            <td class="title">성명</td>
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr>
                        <tr>
                            <td class="title">예약번호</td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td class="title">제목</td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td class="title" id="content">내용</td>
                            <td><textarea name="" id="" cols="30" rows="10" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td class="title">휴대전화</td>
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr>
                        <tr>
                            <td class="title">이메일</td>
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr>
                    </table>
                </form>
            </article>
        </main>

        <!-- footer -->
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
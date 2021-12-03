<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/service_notification_read.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/aside.css">
</head>

<body>
    <div class="container">
    <?php
            include('./header.php');
        ?>
        <aside>
        <div>
               <ul>
                 <li class="title">고객 서비스</li>
                 <hr>
                 <li>공 지 사 항</li>
                 <li>F A Q</li>
                 <li>문의하기</li>
               </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>공 지 사 항</h2>
            </article>
            <hr>
            <article class="form">
                <form action="">
                    <table>
                     
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">제 목</td>
                            <td><input type="text"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">작 성 일 자</td>
                            <td><input type="text"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title" id="content">내 용</td>
                            <td><textarea name="" id="" cols="30" rows="10"></textarea></td>
                        </tr><!-- 두번째 줄 끝 -->
   
                    </table>
                </form>
            </article>
            <article class="button">
                <div>
                    <input type="button" value="수 정">
                    <input type="button" value="삭 제">
                </div>
            </article>
        </main>
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
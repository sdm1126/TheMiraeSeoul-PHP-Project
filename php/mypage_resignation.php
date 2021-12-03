<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_resignation.css">
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
                    <li class="title">마이 페이지</li>
                    <hr>
                    <li>내 정보</li>
                    <li>내 예약</li>
                    <li>내 문의</li>
                    <li><b>회원탈퇴</b></li>
                </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>회원탈퇴</h2>
            </article>
            <hr>
            <article class="warning">
                <h3>회원탈퇴 신청 전, 아래의 유의사항을 한번 더 확인해주시기 바랍니다.</h3>
                <ul>
                    <li>개인정보보호법에 따라 호텔 이용기록, 개인 정보, 문의 내역 모두 삭제됩니다.</li>
                    <li>탈퇴 신청이 완료되면 즉시 홈페이지 로그인이 제한됩니다.</li>
                </ul>
            </article>
            <article class="button">
                <input type="submit" value="탈 퇴">
            </article>
        </main>
        <?php
        include('./footer.php');
        ?>
    </div>
</body>

</html>
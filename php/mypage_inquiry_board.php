<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_inquiry_board.css">
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
                    <li><b>내 문의</b></li>
                    <li>회원탈퇴</li>
                </ul>
            </div>
        </aside>
        <main>
            <div class="h2">
                <h2>내 문의</h2>
            </div>
            <hr>
            <div class="search">
                <select name="" id="">
                    <option value="">제목</option>
                    <option value="">작성일</option>
                </select>
                <input type="text">
                <input type="submit" value="조 회">
            </div>
            <div class="table">
                <table>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성일</th>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>관리자 나오라고 해</td>
                        <td>2021.11.18</td>
                    </tr>
                </table>
            </div>
            <div class="index">
                <span>
                    <-- 1 2 3 4 -->
                </span>
            </div>
        </main>
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
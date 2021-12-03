<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_inquiry_read.css">
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
            <article class="h2">
                <h2>내 문의</h2>
            </article>
            <hr>
            <article class="form">
                <form action="">
                    <table>
                        <tr>
                            <!-- 첫번째 줄 시작 -->
                            <td class="title">성명</td>
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr><!-- 첫번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">예약번호</td>
                            <td><input type="text"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">제목</td>
                            <td><input type="text"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title" id="content">내용</td>
                            <td><textarea name="" id="" cols="30" rows="10"></textarea></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">휴대전화</td>
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">이메일</td>
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr><!-- 두번째 줄 끝 -->
                    </table>
                </form>
            </article>
            <article class="button">
                <div>
                    <input type="submit" value="수 정">
                    <input type="button" value="삭 제">
                </div>
            </article>
            <article class="textarea">
                <h3>댓 글</h3>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </article>
            <article class="reply">
                <div>
                    <input type="button" value="등 록">
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
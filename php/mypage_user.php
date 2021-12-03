<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_user.css">
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
                    <li><b>내 정보</b></li>
                    <li>내 예약</li>
                    <li>내 문의</li>
                    <li>회원탈퇴</li>
                </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>내 정보</h2>
            </article>
            <hr>
            <article class="name">
                <table>
                    <tr>
                        <td>성(영문)</td>
                        <td>SHIN</td>
                        <td>이름(영문)</td>
                        <td>DONGMIN</td>
                    </tr>
                    <tr class="gender">
                        <td>성별</td>
                        <td colspan="3">
                            <select name="" id="">
                                <option value="male">Mr.</option>
                                <option value="female">Ms.</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="id">
                        <td>아이디</td>
                        <td colspan="3">
                            <input type="text" placeholder="영어 소문자, 숫자만 사용">
                        </td>
                    </tr>
                    <tr class="password">
                        <td>비밀번호</td>
                        <td colspan="3">
                            <input type="password" placeholder="새 비밀번호 입력">
                        </td>
                    </tr>
                    <tr class="password_confirm">
                        <td>비밀번호 확인</td>
                        <td colspan="3">
                            <input type="password" placeholder="비밀번호와 동일하게 입력">
                        </td>
                    </tr>
                    <tr class="email">
                        <td>이메일</td>
                        <td colspan="3">
                            <input type="email">
                            <span>@</span>
                            <input type="email">
                            <select name="" id="">
                                <option value="">naver.com</option>
                                <option value="">gmail.com</option>
                                <option value="">직접 입력</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="phone">
                        <td>휴대전화</td>
                        <td colspan="3">
                            <input type="text">
                            <span>-</span>
                            <input type="text">
                            <span>-</span>
                            <input type="text">
                        </td>
                    </tr>
                </table>
            </article>
            <article class="buttons">
                <input type="submit" value="수 정">
                <input type="button" value="취 소">
            </article>

        </main>
        <?php
        include('./footer.php');
        ?>
    </div>
</body>

</html>
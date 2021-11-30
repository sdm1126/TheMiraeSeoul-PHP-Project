<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/registration.css">
</head>

<body>
    <div class="container">
        <!-- header -->
        <?php
        include('./header.php')
        ?>

        <!-- article -->
        <article>
            <section class="section1">
                <h2>회원가입</h2>
            </section>
            <section class="section2">
                <table>
                    <tr class="name">
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
                            <input type="password" placeholder="비밀번호 입력">
                        </td>
                    </tr>
                    <tr class="password_confirm">
                        <td>비밀번호 확인</td>
                        <td colspan="3">
                            <input type="password" placeholder="비밀번호 확인 입력">
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
            </section>
            <section class="section3">
                <input type="submit" value="가입">
            </section>
        </article>

        <!-- footer -->
        <?php
        include('./footer.php')
        ?>
    </div>
    <SCript>
        let id = document.querySelector('#id')
        let password_new = document.querySelector('#password_new')
        let password_check = document.querySelector('#password_check')
        let email1 = document.querySelector('#email1')
        let email2 = document.querySelector('#email2')
        let mobile1 = document.querySelector('#mobile1')
        let mobile2 = document.querySelector('#mobile2')
        let mobile3 = document.querySelector('#mobile3')
    </SCript>
</body>

</html>
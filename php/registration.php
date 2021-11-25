<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/registration.css">
</head>
<script>
    function fregisterform_submit(form) {
        if (form.first_name.value.length < 1) { // 회원아이디 검사
            alert("성(영문)를 입력하십시오.");
            form.first_name.focus();
            return false;
        }
        if (form.second_name.value.length < 1) { // 회원아이디 검사
            alert("이름(영문)를 입력하십시오.");
            form.second_name.focus();
            return false;
        }

        if (form.id.value.length < 1) { // 회원아이디 검사
            alert("아이디를 입력하십시오.");
            form.id.focus();
            return false;
        }

        if (form.password.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            form.mb_password.focus();
            return false;
        }

        if (form.password.value != form.password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            form.password_re.focus();
            return false;
        }

        if (form.password.value.length > 0) {
            if (form.password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                form.mb_password_re.focus();
                return false;
            }
        }

        if (form.email1.value.length < 1) { // 이메일 검사
            alert("이메일을 입력하십시오.");
            form.email1.focus();
            return false;
        }
        if (form.email2.value.length < 1) { // 이메일 검사
            alert("이메일을 입력하십시오.");
            form.email2.focus();
            return false;
        }
        if (form.mobile1.value.length < 1) { // 이메일 검사
            alert("휴대전화을 입력하십시오.");
            form.mobile1.focus();
            return false;
        }
        if (form.mobile2.value.length < 1) { // 이메일 검사
            alert("휴대전화을 입력하십시오.");
            form.mobile2.focus();
            return false;
        }
        if (form.mobile3.value.length < 1) { // 이메일 검사
            alert("휴대전화을 입력하십시오.");
            form.mobile3.focus();
            return false;
        }

        return true;
    }
    document.addEventListener('DOMContentLoaded', () => {
        const secondEmail = document.querySelector('#email_second');
        const selectedEmail = document.querySelector('#selected_email');
        selectedEmail.addEventListener('change', (event) => {
            secondEmail.textContent = selectedEmail.value;
            secondEmail.value = selectedEmail.value;
        })
    })

    function numberMaxLength(e) {

        if (e.value.length > e.maxLength) {

            e.value = e.value.slice(0, e.maxLength);

        }

    }
</script>

<body>
    <div class="container">
        <!-- header -->
        <?php
        include('./header.php')
        ?>

        <!-- article -->
        <article>
            <!--   -->
            <form action="./register_update.php" onsubmit="return fregisterform_submit(this);" method="post">
                <section class="section1">
                    <h2>회원가입</h2>
                </section>
                <section class="section2">



                    <table>
                        <tr class="name">
                            <td>성(영문)</td>
                            <td><input type="text" name="first_name"></td>
                            <td>이름(영문)</td>
                            <td><input type="text" name="second_name"></td>
                        </tr>
                        <tr class="gender">
                            <td>성별</td>
                            <td colspan="3">
                                <select id="" name="gender">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="id">
                            <td>아이디</td>
                            <td colspan="3">
                                <input type="text" placeholder="영어 소문자, 숫자만 사용" name="id">
                            </td>
                        </tr>
                        <tr class="password">
                            <td>비밀번호</td>
                            <td colspan="3">
                                <input type="password" placeholder="비밀번호 입력" name="password">
                            </td>
                        </tr>
                        <tr class="password_confirm">
                            <td>비밀번호 확인</td>
                            <td colspan="3">
                                <input type="password" placeholder="비밀번호 확인 입력" name="password_re">
                            </td>
                        </tr>
                        <tr class="email">
                            <td>이메일</td>
                            <td colspan="3">
                                <input type="text" name="email1">
                                <span>@</span>
                                <input type="text" name="email2" id="email_second">
                                <select name="" id="selected_email">
                                    <option value="">직접 입력</option>
                                    <option value="naver.com">naver.com</option>
                                    <option value="gmail.com">gmail.com</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="phone">
                            <td>휴대전화</td>
                            <td colspan="3">
                                <input type="number" name="mobile1" class="mobile" maxlength="3" oninput="numberMaxLength(this);">
                                <span>-</span>
                                <input type="number" name="mobile2" class="mobile" maxlength="4" oninput="numberMaxLength(this);">
                                <span>-</span>
                                <input type="number" name="mobile3" class="mobile" maxlength="4" oninput="numberMaxLength(this);">
                            </td>
                        </tr>
                    </table>

                </section>
                <section class="section3">
                    <input type="submit" value="가입">
                </section>
            </form>
        </article>

        <!-- footer -->
        <?php
        include('./footer.php')
        ?>
    </div>

</body>

</html>
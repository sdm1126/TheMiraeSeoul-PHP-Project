<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/find_password.css">
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
                <h2>비밀번호 찾기</h2>
            </section>
            <section class="section2">
                <table>
                    <tr class="name">
                        <td>성(영문)</td>
                        <td><input type="text" /></td>
                        <td>이름(영문)</td>
                        <td><input type="text" /></td>
                    </tr>
                    <tr class="id">
                        <td>아이디</td>
                        <td colspan="3">
                            <input type="text" placeholder="영어 소문자, 숫자만 사용">
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
                <input type="submit" value="찾기">
            </section>
        </article>

        <!-- footer -->
        <?php 
            include('./footer.php')
        ?>
    </div>

</body>

</html>
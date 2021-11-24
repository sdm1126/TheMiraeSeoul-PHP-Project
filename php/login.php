<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login.css">
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
                <h2>로그인</h2>
            </section>
            <section class="section2">
                <table>
                    <tr>
                        <td><input type="text" id="id" placeholder="아이디 입력" /></td>
                        <td rowspan="2"><input type="submit" id="login" value="로그인" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="password" placeholder="비밀번호 입력" /></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" id="saveId" />
                            <span>아이디 저장</span>
                        </td>
                    </tr>
                </table>
            </section>
            <section class="section3">
                <input type="submit" id="findId" value="아이디 찾기" />
                <input type="submit" id="findPassword" value="비밀번호 찾기" />
            </section>
        </article>

        <!-- footer -->
        <?php 
            include('./footer.php')
        ?>
    </div>

</body>

</html>
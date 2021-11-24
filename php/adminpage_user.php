<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/aside.css">
    <link rel="stylesheet" href="../css/adminpage_user.css">
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
                    <li><b>전체 정보</b></li>
                    <li>전체 예약</li>
                    <li>전체 문의</li>
                </ul>
            </div>
        </aside>
        <div class="section1">
            <h2 id="h2">전 체 정 보</h2>
            <hr>
            <select class="custom-select" id="root">
                <option value="이름">이름</option>
                <option value="아이디">아이디</option>
            </select>
            <input type="text" class="custum-search form-control">
            <button type="button" class="btn btn-secondary">조회</button>
        </div>
        <div class="section2">
            <table border="1">
                <tr>
                    <td class="name title">성명</td>
                    <td class="id title">예약번호</td>
                    <td class="email title">체크인</td>
                    <td class="phone title">체크아웃</td>
                    <td class="sign_out title">취소</td>
                </tr>
                <tr>
                    <td>신동민</td>
                    <td>00001</td>
                    <td>2021-11-15</td>
                    <td>2021-11-16</td>
                    <td><button type="button" class="btn btn-secondary btn1">취소</button></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>


        <!-- footer -->
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
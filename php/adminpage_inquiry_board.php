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
    <link rel="stylesheet" href="../css/adminpage_inquiry_board.css">

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
                    <li>전체 정보</li>
                    <li>전체 예약</li>
                    <li><b>전체 문의</b></li>
                </ul>
            </div>
        </aside>
        <div class="section1">
            <h2 id="h2">전 체 문 의</h2>
            <hr>
            <select class="custom-select" id="root">
                <option value="이름">제목</option>
                <option value="아이디">작성일자</option>
            </select>
            <input type="text" class="custum-search form-control">
            <button type="button" class="btn btn-secondary">조회</button>
        </div>
        <div class="section2">
            <table border="1">
                <tr>
                    <td class="name title">
                        <h4>번호</h4>
                    </td>
                    <td class="id title">
                        <h4>성명</h4>
                    </td>
                    <td class="email title">
                        <h4>제목</h4>
                    </td>
                    <td class="phone title">
                        <h4>작성일자</h4>
                    </td>
                    <td class="sign_out title">
                        <h4>삭제</h4>
                    </td>
                </tr>
                <tr>
                    <td> 1</td>
                    <td>신동민</td>
                    <td>제목1</td>
                    <td>2021-11-16</td>
                    <td><button type="button" class="btn btn-secondary btn1">삭제</button></td>
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
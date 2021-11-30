<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_reservation.css">
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
                    <li><a href="./mypage_user.php">내 정보</a></li>
                    <li><a href="./mypage_reservation.php"><b>내 예약</b></a></li>
                    <li><a href="./mypage_inquiry_board.php?page=1">내 문의</a></li>
                    <li><a href="./mypage_resignation.php">회원탈퇴</a></li>
                </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>내 예약</h2>
                <div class="span">
                    <span>※ 변경 / 취소는 객실예약실로 문의 바랍니다.</span>
                </div>
            </article>
            <hr>
            <article class="search">
                <select name="" id="">
                    <option value="">예약번호</option>
                    <option value="">상품명</option>
                    <option value="">체크인</option>
                </select>
                <input type="text">
                <input type="submit" value="조 회">
            </article>
            <article class="table">
                <table>
                    <th>예약번호</th>
                    <th>상품명</th>
                    <th>체크인</th>
                    <th>체크아웃</th>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Room Only</td>
                        <td>2021.11.18</td>
                        <td>2021.11.19</td>
                    </tr>
                </table>
            </article>
            <article class="index">
                <span>
                    <-- 1 2 3 4 -->
                </span>
            </article>
        </main>
        <?php
        include('./footer.php');
        ?>
    </div>
</body>

</html>
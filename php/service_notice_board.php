<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/service_notification_board.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/aside.css">
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
                    <li class="title">고객 서비스</li>
                    <hr>
                    <li>공지사항</li>
                    <li>F A Q</li>
                    <li>문의하기</li>
                </ul>
            </div>
        </aside>
        <main>
            <div class="h2">
                <h2>공 지 사 항</h2>
            </div>
            <hr>
            <div class="search">
                <select name="" id="">
                    <option value="">제목</option>
                    <option value="">내용</option>
                    <option value="">제목 및 내용</option>
                </select>
                <input type="text">
                <input type="submit" value="검 색">
            </div>
            <div class="table">
                <table>
                    <th>번 호</th>
                    <th>제 목</th>
                    <th>성 명</th>
                    <th>작 성 일 자</th>
                    <th>조 회 수</th>
                    <tr>
                        <td>1</td>
                        <td>1월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>3월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>4월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>5월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>6월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>7월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>8월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>9월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>10월 이벤트</td>
                        <td>The Shilla</td>
                        <td>2021-11-14</td>
                        <td>100</td>
                    </tr>
                </table>
            </div>
            <article class="button">
                <div class="paging">
                    <a class="select" href="#">
                        << /a>
                            <a ahref="#">1</a>
                            <a ahref="#">2</a>
                            <a ahref="#">3</a>
                            <a ahref="#">4</a>
                            <a ahref="#">></a>
                </div>
                <div>
                    <input type="button" value="글쓰기">
                </div>
            </article>
        </main>

        <!-- footer -->
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

</html>
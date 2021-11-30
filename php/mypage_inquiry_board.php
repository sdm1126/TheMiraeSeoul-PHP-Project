<?php
include_once('../db/db_connector.php');
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_inquiry_board.css">
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
                    <li><a href="./mypage_reservation.php">내 예약</a></li>
                    <li><a href="./mypage_inquiry_board.php?page=1"><b>내 문의</b></a></li>
                    <li><a href="./mypage_resignation.php">회원탈퇴</a></li>
                </ul>
            </div>
        </aside>
        <main>
            <div class="h2">
                <h2>내 문의</h2>
            </div>
            <?php
            $flag = false;
            $mb_id = $_SESSION['ss_mb_id'];
            // $option = $_POST['option'];
            if(isset($_GET['page'])){
                $current_page = $_GET['page'];
            }else{
                $current_page = 1;
            }
            
            if(isset($_GET['search_str'])){
                $search_str = $_GET['search_str'];
            }else{
                $search_str = '';
                $flag = true;
            }
            
            if(isset($_GET['option'])){
                $option = $_GET['option'];
            }else{
                $option = 'title';
                $flag = true;
            }

            if(!$flag){
                if($option === 'write_datetime'){
                    $sql = "SELECT COUNT(*) AS `total_count` FROM inquiry WHERE id = '$mb_id' AND DATE($option) LIKE '%$search_str%' ";
                }else{
                    $sql = "SELECT COUNT(*) AS `total_count` FROM inquiry WHERE id = '$mb_id' AND $option LIKE '%$search_str%' ";
                }

                
            }else{
                $sql = "SELECT COUNT(*) AS `total_count` FROM inquiry WHERE id = '$mb_id' ";
            }    
            // 1. 총 게시글을 구한다
            // 쿼리문 실행
            $result = mysqli_query($con, $sql);
            // 배열에 결과값을 담는다
            $row = mysqli_fetch_assoc($result);
            // 총 게시글 갯수를 변수에 옮긴다.
            $total_count = $row['total_count'];
            
            // 게시판 한 페이지에 들어갈 게시글
            $page_row = 10;
            //총 페이지 갯수 구하기
            $total_page = ceil($total_count / $page_row);

            //URL에 넣은 page값을 받아온다.
            $first_index = ($current_page - 1) * $page_row;
            
            if(!$flag){
                if($option === 'written_date'){
                    $sql = "SELECT * FROM inquiry WHERE id = '$mb_id'  AND  DATE($option) LIKE '%$search_str%' ORDER BY written_date desc LIMIT {$first_index}, {$page_row} ";
                }else{
                    $sql = "SELECT * FROM inquiry WHERE id = '$mb_id'  AND  $option LIKE '%$search_str%' ORDER BY written_date desc LIMIT {$first_index}, {$page_row} ";
                }
            }else{
                $sql = "SELECT * FROM inquiry WHERE id = '$mb_id' ORDER BY written_date desc LIMIT {$first_index}, {$page_row} ";
            }
            
            $result = mysqli_query($con, $sql);
            $list = array();
            for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                $list[$i] = $row;
                $list[$i]['num'] = $total_count - $first_index - $i;
            }
            
            //================================================ 여기까지가 테이블 세팅=========================================
            if(!$flag){
                $a = './mypage_inquiry_board.php?option='.$option.'&search_str='.$search_str.'&';
            }else{
                $a = './mypage_inquiry_board.php?';
            }
            $start_page = (int)($current_page / $page_row) * $page_row  + 1;
            $end_page = ($start_page + $page_row - 1) < $total_page ? ($start_page + $page_row - 1) < $total_page : $total_page;
            
            //HTML 메뉴 코드 추가하기
            $index_page = paging($current_page, $start_page, $end_page, $total_page, $a);

            ?>
            <hr>
            <div class="search">
                <form action="./mypage_inquiry_board.php" method="get">
                    <select name="option" id="select">
                        <option value="title">제목</option>
                        <option value="written_date">작성일</option>
                    </select>
                    <input type="text" name="search_str">
                    <input type="submit" value="조 회" class="submit" onsubmit="return false">
                </form>
            </div>
            <div class="table">
                <table>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성일</th>
                    <?php
                    for ($i = 0; $i < count($list); $i++) {
                    ?>
                        <tr>
                            <td><?= $list[$i]['num'] ?></td>
                            <td><?='<a class="link_title" href="mypage_inquiry_read.php?no='.$list[$i]['no'].'&id='.$mb_id.'">'.$list[$i]['title'].'</a>'?></td>
                            <td><?= substr($list[$i]['written_date'], 0, 10) ?></td>
                        </tr>
                    <?php }
                    mysqli_close($con); // 데이터베이스 접속 종료
                    ?>
                </table>
                <div class="index">
                    <p><?= $index_page ?></p>
                </div>
            </div>
        </main>
        <?php
        include('./footer.php');
        ?>
    </div>
</body>
</html>
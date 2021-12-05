<?php
include_once('../db/db_connector.php');

if (isset($_SESSION['session_id'])) {

    $id = sql_escape($con, $_SESSION['session_id']);

    if (empty($id)) {
        mysqli_close($con);
        header("location: login.php?error=empty_id");
        exit;
    } else {
        // 아이디가 실제 회원인지 확인
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        // 아이디가 존재한다면 넘어온 값 점검
        if (mysqli_num_rows($result) > 0) {
  
            if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST['mode'])) {

                $mode = $_POST['mode'];

                // 인젝션 방어 앞 뒤 공백 제거
                $title              = sql_escape($con, trim($_POST['title']));
                $content            = sql_escape($con, trim($_POST['content']));
                $written_date       = date('Y-m-d H:i:s', time());
            
                 // 공백 점검
                if (empty($title) || empty($content)) {
                    mysqli_close($con);
                    // 뒤로가기 + 새로 고침 기능을 한꺼번에
                    echo "<script>alert('제목 또는 내용이 비어있습니다')</script>";
                    echo "<script>location.href = document.referrer;</script>";
                    exit;
                } else {

                    switch($mode){
                        case '등 록' :
                            $sql = " INSERT INTO inquiry
                                SET id = '$id',
                                title = '$title',
                                content = '$content',
                                attached_file = '0',
                                written_date = '$written_date' ";
                            break;
    
                        case '확 인' :
                            $no = $_GET['no'];
                            $sql = "UPDATE inquiry SET title = '$title', content = '$content' WHERE no = $no";
                            break;
    
                        case '삭 제' :
                            $no = $_GET['no'];
                            $sql = "DELETE FROM inquiry WHERE no = $no";
                            break;
                    }
                        // 데이터베이스에 넣기
                        $result = mysqli_query($con, $sql) or die('fail' . mysqli_error($con));
                        if ($result) {
                            echo "<script>location.replace('./mypage_inquiry_board.php?option=title&page=1');</script>";
                            mysqli_close($con);
                            return;
                        }        
                }           
            } else {
                echo "<script>alert('로그인 후 이용 부탁드립니다.');</script>";
                echo "<script>location.replace('./login.php');</script>";
                mysqli_close($con);
                exit;
            }
        } else {
          echo "<script>alert('로그인 후 이용 부탁드립니다.');</script>";
          echo "<script>location.replace('./login.php');</script>";
          mysqli_close($con);
          exit;
        }
    }
} else {
    echo "<script>alert('로그인 후 이용 부탁드립니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    mysqli_close($con);
    exit;
}
mysqli_close($con);

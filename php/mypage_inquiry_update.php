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
                $no = $_GET['no'];

                // 인젝션 방어
                $title              = sql_escape($con, $_POST['title']);
                $content            = sql_escape($con, $_POST['content']);
                $written_date       = date('Y-m-d H:i:s', time());
            
                // 공백 점검
                if (empty($title)) {
                    mysqli_close($con);
                    alert_back('제목이 비어있습니다');
                    exit;
                } else if (empty($content)) {
                    mysqli_close($con);
                    alert_back('내용이 비어있습니다');
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
                            $sql = "UPDATE inquiry SET title = '$title', content = '$content' WHERE no = $no";
                            break;

                        case '삭 제' :
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
                header('location: login.php?error=empty_var');
            }
        } else {
            header('location: login.php?error=not_member');
        }
    }
} else {
    header('location: login.php?error=session_error');
}
mysqli_close($con);
?>
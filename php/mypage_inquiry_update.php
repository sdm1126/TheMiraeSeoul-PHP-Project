<?php
    include_once('../db/db_connector.php');

    $list_number = $_GET['no'];
    $mode = $_POST['mode'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $result_str = '';

    if($mode === '확 인'){
        $sql = "  UPDATE inquiry
				SET title = '$title',
                    content = '$content' WHERE no = $list_number";
        $result_str = "수정 완료";
    }else if($mode === '삭 제'){
        $sql = "  DELETE FROM inquiry WHERE no = $list_number";
        $result_str = "삭제 완료";
    }

	$result = mysqli_query($con, $sql);

    if($result){
        echo "<script>alert('".$result_str."');</script>";
        echo "<script>location.replace('./mypage_inquiry_board.php?page=1');</script>";
        mysqli_close($con);
    }
?>
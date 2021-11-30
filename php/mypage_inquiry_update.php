<<<<<<< HEAD
<?php
    include_once('../db/db_connector.php');

    $mode = $_POST['mode'];
    $content = $_POST['content'];

    $no = $_GET['no'];
    $member_id = $_GET['id'];
    $inquiry_number = $_GET['no'];
    $written_date = date('Y-m-d H:i:s', time());


    switch($mode){
        case '등 록' :
            $sql = " INSERT INTO comment
                    SET id = '$member_id',
                    content = '$content',
                    inquiry_number = $inquiry_number,
                    written_date = '$written_date' ";
            break;
        case '확 인' :
            $sql = "UPDATE comment SET content = '$content' WHERE no = $no";
            break;
        case '삭 제' :
            $sql = "DELETE FROM comment WHERE no = $no";
            break;
    }
                       
    $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>history.back()</script>";
        mysqli_close($con);
    }
=======
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
>>>>>>> master

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
?>
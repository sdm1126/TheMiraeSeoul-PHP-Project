<?php
//데이터 베이스 연동 및 members 테이블 생성( 테이블이 존재하면 생략)
include_once $_SERVER['DOCUMENT_ROOT']."/TheMiraeSeoul/db/db_connector.php";
include_once $_SERVER['DOCUMENT_ROOT']."/TheMiraeSeoul/db/create_table.php";
create_table($con,'notice');

$mode = $_POST['mode'];
if($mode === '작 성'){
    //1. 클라이언트로부터 전송해온 값이 존재하는지 점검한다.
    if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["written_date"])) {
        //2. mysql injection 함수 사용
        $no = "null";
        $title = mysqli_real_escape_string($con, $_POST["title"]);
        $content = mysqli_real_escape_string($con, $_POST["content"]);
        $written_date = mysqli_real_escape_string($con, $_POST["written_date"]);
        $read_count =  "1";
            
        if(empty($title)) {
            header("location: service_notice_read.php?error='제목이 비어있어요'");
            exit();
        }else if(empty($content)) {
            header("location: service_notice_read.php?error=내용이 비어있어요");
            exit();
        }else {
            $sql = "insert into notice(no, title, content, written_date, read_count) ";
            $sql .= "values($no, '$title', '$content', '$written_date', '$read_count')";
        
            mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
            mysqli_close($con);
            header("location: service_notice_board.php");
            exit();
        }
    }
}else if($mode === '수 정'){
    
        //1. 클라이언트로부터 전송해온 값이 존재하는지 점검한다.
        if(isset($_POST["title"]) && isset($_POST["content"])) {
            $title = mysqli_real_escape_string($con, $_POST["title"]);
            $content = mysqli_real_escape_string($con, $_POST["content"]);
            $no = mysqli_real_escape_string($con, $_POST["no"]);
            
            if(empty($title)) {
                header("location: service_notice_read.php?error=제목이 비어있어요");
                exit();
            }else if(empty($content)) {
                header("location: service_notice_read.php?error=내용이 비어있어요");
                exit();
            }else {
                $sql =  "UPDATE notice SET title= '$title', content= '$content' WHERE no = $no ";
        
                mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
                mysqli_close($con);
                header("location: service_notice_board.php");
                exit();
            }
        }
}else if($mode === '삭 제'){
    if(isset($_POST["title"]) && isset($_POST["content"])) {
        $title = mysqli_real_escape_string($con, $_POST["title"]);
        $content = mysqli_real_escape_string($con, $_POST["content"]);
        $no = mysqli_real_escape_string($con, $_POST["no"]);
            
        $sql = "DELETE FROM notice WHERE no = $no";

        $delete_result = mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
        mysqli_close($con);
        
        header("location: service_notice_board.php");
        exit();
    }
 
}
?>
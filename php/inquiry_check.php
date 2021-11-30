<?php
    include_once("../db/db_connector.php");

    // post방식으로 전송해온 데이터를 확인해서 변수에 저장하는 기능
    // dbconn에 있는 함수 호출
    $member_id          = "test_id_01";
    $title              = input_check($_POST['title']);
    $content            = $_POST['content'];
    $attached_file      = $_POST['attached_file'];
    $written_date     = date('Y-m-d H:i:s', time());
    //저장된 병수 값이 없을 경우 다시 입력을 해줄 것을 요청하고 register.php로 이동
    // if (!$mb_id) {
    //     echo "<script>alert('아이디가 넘어오지 않았습니다.');</script>";
    //     echo "<script>location.replace('./register_modify.php');</script>";
    //     exit;
    // }
    
    // if (!$mb_password) {
    //     echo "<script>alert('비밀번호가 넘어오지 않았습니다.');</script>";
    //     echo "<script>location.replace('./register_modify.php');</script>";
    //     exit;
    // }
    
    // if ($mb_password !== $mb_password_re) {
    //     echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    //     echo "<script>location.replace('./register_modify.php');</script>";
    //     exit;
    // }
    
    // if (!$mb_name) {
    //     echo "<script>alert('이름이 넘어오지 않았습니다.');</script>";
    //     echo "<script>location.replace('./register_modify.php');</script>";
    //     exit;
    // }
    
    // if (!$mb_email) {
    //     echo "<script>alert('이메일이 넘어오지 않았습니다.');</script>";
    //     echo "<script>location.replace('./register_modify.php');</script>";
    //     exit;
    // }

    // membertable에 기존 회원인지 확인
    // $sql = "select * from member where mb_id = '$mb_id' ";
    // $result = mysqli_query($conn, $sql);

    // 검색 결과가 1개 이상일 경우. 아이디가 중복된다는 의미
    // 보통 중복 체크는 ajax로 한다
    // if(mysqli_num_rows($result) < 1){
    //     echo "<script>alert('수정할 아이디가 존재하지 않습니다');</script>";
    //     echo "<script>location.replace('./register_modify.php');</script>";
    //     mysqli_close($conn);
    //     exit;
    // }

    // 암호화 처리
    // $sql = " SELECT PASSWORD('$mb_password') AS pass "; // 입력한 비밀번호를 MySQL password() 함수를 이용해 암호화해서 가져옴
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $mb_password = $row['pass'];

    // 데이터 베이스 membertable에 insert함
    $sql = " INSERT INTO inquiry
				SET id = '$member_id',
                    title = '$title',
                    content = '$content',
                    attached_file = '$attached_file',
                    written_date = '$written_date' ";

	$result = mysqli_query($con, $sql);

    if($result){
        echo "<script>alert('문의 사항 수정 및 삭제는 내 문의 페이지에서');</script>";
        echo "<script>location.replace('./mypage_inquiry_board.php?page=1');</script>";
        mysqli_close($conn);
    }
    ?>
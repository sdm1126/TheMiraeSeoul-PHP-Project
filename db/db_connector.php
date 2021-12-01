<!-- 
<데이터베이스와의 통신 고정 순서>
1. 쿼리문 준비($sql)
2. 쿼리문 전송(mysqli_query($con, $sql)) 후 결과($result) 받기
3. 결과로 값 불러오기(mysqli_fetch_row(인덱스)/assoc(연관배열)/array(인덱스 및 연관배열)) 
-->

<?php
    session_start();
    $_SESSION['session_id'] = 'test_id_01';
    // 1. 데이터베이스 시간 설정
    date_default_timezone_set("Asia/Seoul");

    // 2. 데이터베이스 접속 및 오류처리
    // 2-1. 접속
    $mysql_host = "localhost";
    $mysql_id = "root";
    $mysql_password = "123456";
    $con = mysqli_connect($mysql_host, $mysql_id, $mysql_password);
    // 2-2. 오류처리
    if(!$con) {
        die("데이터베이스 연결 실패".mysqli_connect_errno());
    }

    // 3. 데이터베이스가 이미 존재하는 지 여부 확인
    $database_flag = false;
    // 3-1. 쿼리문 생성
    $sql = "SHOW DATABASES";
    // 3-2. 쿼리문 전송 및 결과 받기
    $result = mysqli_query($con, $sql) or die("데이터베이스 확인 실패".mysqli_error($con));
    // 3-3. 결과로부터 값 불러오기
    while($row = mysqli_fetch_array($result)) {
        // 'Database'열을 확인하여 'theMiraeSeoul'이 있을 경우, flag = true로 변경
        if($row["Database"] == "themiraeseoul") {
            $database_flag = true;
            break;
        }
    }

    // 4. 데이터베이스가 존재하지 않을 경우 생성
    if($database_flag === false) {
        // 4-1. 쿼리문 생성
        $sql = "CREATE DATABASE theMiraeSeoul";
        // 4-2. 쿼리문 전송 및 결과 받기
        $value = mysqli_query($con, $sql) or die("데이터베이스 생성 실패".mysqli_error($con));
        // 4-3. 결과 확인
        if($value === true) {
            echo "<script>alert('theMiraeSeoul 데이터베이스가 생성되었습니다.')</script>";
        }
    }

    // 5. (쿼리문을 보낼 기본)데이터베이스 선택 및 오류처리
    // 5-1. 선택
    $dbcon = mysqli_select_db($con, "theMiraeSeoul") or die("데이터베이스 선택 실패".mysqli_error($con));
    // 5-2. 오류처리
    if(!$dbcon) {
        echo "<script>alert('theMiraeSeoul 데이터베이스 선택에 실패했습니다.')</script>";
    }

    // 6. 공용 함수 생성
    // 6-1. 메세지 표시 후 뒤로가기 함수
    function alert_back($message) {
        echo "<script>alert($message);</script>";
        echo "<script>history.go(-1);</script>";
        exit;
    }

    // 6-2. 데이터 결함 방어 함수
    function input_check($data) {
        $data = trim($data); // 공백 방어
        $data = stripslashes($data); // 슬래시 방어
        $data = htmlspecialchars($data); // 특수문자 방어
        return $data;
    }

    // 6-3. MySQL 인젝션 방어 함수
    function sql_escape($conn, $content) {
        return mysqli_real_escape_string($conn, $content);
    }

    function paging($current_page, $start_page, $end_page, $total_page, $a){
        //$a = './mypage_inquiry_board.php?'; 문자열에 주의할 것
        $paging_str = '';
    
        $paging_str .= $current_page > 1 ? '<a href="'.$a.'page=1" class="pg_page pg_start">처음</a>' : '';

        $paging_str .= $start_page > 1 ? '<a href="'.$a.'page="' . ($start_page - 1) . '"class="pg_page pg_start">이전</a>' : '';
    
        for ($i = $start_page; $i <= $end_page; $i++) {
            $paging_str .= $current_page != $i ? '<a href="'.$a.'page=' . $i . '" class="pg_page">' . $i . '</a>' : '<strong class="pg_current">' . $i . '</strong>';
        }
        
        $paging_str .= $end_page < $total_page ? '<a href="'.$a.'page=' . ($end_page + 1) . '" class="pg_page pg_next">다음</a>' : '';

        $paging_str .= $current_page < $total_page ? '<a href="'.$a.'page=' . $total_page . '" class="pg_page pg_end">맨끝</a>' : '';

        $index_page = $paging_str !== '' ? "<nav class=\"pg_wrap\"><span class=\"pg\">{$paging_str}</span></nav>" : '';

        return $index_page;
    }
?>
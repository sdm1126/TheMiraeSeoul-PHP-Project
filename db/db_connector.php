<?php
session_start();

// 1. 데이터베이스 시간 설정
date_default_timezone_set("Asia/Seoul");

// 2. 데이터베이스 접속 및 오류처리
$mysql_host = "localhost";
$mysql_id = "root";
$mysql_password = "123456";
$con = mysqli_connect($mysql_host, $mysql_id, $mysql_password);
if (!$con) {
    die("데이터베이스 연결 실패" . mysqli_connect_errno());
}

// 3. 데이터베이스가 이미 존재하는 지 여부 확인
$database_flag = false;
$sql = "SHOW DATABASES";
$result = mysqli_query($con, $sql) or die("데이터베이스 확인 실패" . mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
    // 'Database'열을 확인하여 'theMiraeSeoul'이 있을 경우, flag = true로 변경
    if ($row["Database"] == "themiraeseoul") {
        $database_flag = true;
        break;
    }
}

// 4. 데이터베이스가 존재하지 않을 경우 생성
if ($database_flag === false) {
    $sql = "CREATE DATABASE theMiraeSeoul";
    $value = mysqli_query($con, $sql) or die("데이터베이스 생성 실패" . mysqli_error($con));
    if ($value === true) {
        echo "<script>alert('theMiraeSeoul 데이터베이스가 생성되었습니다.')</script>";
    }
}

// 5. (쿼리문을 보낼 기본) 데이터베이스 선택 및 오류처리
$dbcon = mysqli_select_db($con, "theMiraeSeoul") or die("데이터베이스 선택 실패" . mysqli_error($con));
if (!$dbcon) {
    echo "<script>alert('theMiraeSeoul 데이터베이스 선택에 실패했습니다.')</script>";
}

// 6. 공용 함수 생성
// 6-1. 메세지 표시 후 뒤로가기 함수
function alert_back($message) {
    echo "<script>alert($message);</script>";
    echo "<script>history.go(-1);</script>";
    exit();
}

// 6-2. MySQL 인젝션 방어 함수
function sql_escape($con, $content) {
    return mysqli_real_escape_string($con, $content);
}

// 6-3. 게시판 페이지 설정 함수(한 페이지 당 목록 수, 현재 페이지, 총 페이지, URL)
function get_paging($write_pages, $current_page, $total_page, $url) { 
    
    // URL 변형
    // 예) 'memo_login&page=123' → 'memo_login&page='
    $url = preg_replace('/\&page=[0-9]*/', '', $url) . '&amp;page=';

    // 0. 페이징 시작
    $str = '';

    // 1. 2페이지부터 '처음(<<)' 가기 표시
    ($current_page > 1) ? ($str .= '<a href="' . $url . '1" class="arrow pprev"><<</a>' . PHP_EOL) : ''; // 'PHP_EOL' = \n

    // 2. 시작 페이지와 끝 페이지를 정한다.(= 정하기만 한다.)
    $start_page = (((int)(($current_page - 1) / $write_pages)) * $write_pages) + 1;
    $end_page = $start_page + $write_pages - 1;
    if ($end_page >= $total_page) $end_page = $total_page;

    // 3. 11페이지부터 '이전(<)' 가기 표시
    if ($start_page > 1) $str .= '<a href="' . $url . ($start_page - 1) . '" class="arrow prev"><</a>' . PHP_EOL;

    // 4. (총 페이지가 2페이지 이상일 경우부터) 시작 페이지와 끝 페이지를 등록한다.(= 페이지를 만드는 구문에 직접 추가한다.)
    if ($total_page > 1) {
        for ($k = $start_page; $k <= $end_page; $k++) {
            if ($current_page != $k)
                $str .= '<a href="' . $url . $k . '" class="">' . $k . '</a>' . PHP_EOL;
            else
                $str .= '<a href="' . $url . $k . '" class="active">' . $k . '</a>' . PHP_EOL;
        }
    }

    // 5. 총 페이지가 마지막 페이지보다 클 경우, '다음(>)' 가기 표시
    // 예) 20페이지에서 다음을 누르면 21페이지로 이동
    if ($total_page > $end_page) $str .= '<a href="' . $url . ($end_page + 1) . '" class="arrow next">></a>' . PHP_EOL;

    // 6. 현재 페이지가 총 페이지보다 작을 경우, '마지막(>>)' 가기 표시
    if ($current_page < $total_page) {
        $str .= '<a href="' . $url . $total_page . '" class="arrow nnext">>></a>' . PHP_EOL;
    }

    // 7. 페이지 등록
    if ($str)
        return "<nav class=\"pg_wrap\"><span class=\"pg\">{$str}</span></nav>";
    else
        return "";
}
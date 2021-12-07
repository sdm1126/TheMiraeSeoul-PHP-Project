<?php

$filename = $_GET['file']; // 요청한 파일명

// $_ SERVER['DOCUMENT_ROOT'] : 서버의 절대경로
$filepath = $_SERVER['DOCUMENT_ROOT'].'/theMiraeSeoul/data/'.$filename; // 서버에 저장된 파일 경로
var_dump($filepath);


if (!is_file($filepath) || !file_exists($filepath)) { // 파일이 존재하는지 확인
    echo '파일이 존재하지 않습니다.';
    exit;
}
// 브라우저를 체크합니다.
//preg_match() 정규 표현식 체크 함수
//대소문자 가리지 말고 msie가 있는지 확인
if(preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
    header("content-type: doesn/matter");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$filename\""); // 다운로드되는 파일명
    header("content-transfer-encoding: binary");
} else {
    header("content-type: file/unknown");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$filename\""); // 다운로드되는 파일명
    header("content-description: php generated data");
}

header("pragma: no-cache");
header("expires: 0");

$fp = fopen($filepath, 'rb'); //rb 읽기전용, 바이너리 타입

// feof 파일의 끝
while(!feof($fp)) {
    echo fread($fp, 100*1024); // 여기에서 echo는 전송을 의미
}
fclose($fp); // 파일을 닫음

?>

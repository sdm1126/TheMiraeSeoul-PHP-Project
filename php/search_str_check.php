<?php
    $str = $_GET['q'];
    if(!preg_match("/^[0-9]*$/", $str)){
        echo '숫자만 입력해 주세요';
    }   
?>
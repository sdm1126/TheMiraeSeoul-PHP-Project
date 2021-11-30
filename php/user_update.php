<?php
    include_once('../db/db_connector.php');

    $q = $_GET['q'];
    // $mode = $_GET['mode'];
        $sql = "SELECT COUNT(*) AS `total_count` FROM user WHERE id = '$q'";
    
        $result = mysqli_query($con, $sql);
    
        $row = mysqli_fetch_assoc($result);
    
        if($row['total_count'] === '0'){
            echo '<span style="color: blue; font-size: 14px;">사용가능한 아이디 입니다</span>';
        }else{
            echo '<span style="color: red; font-size: 14px;">중복되는 아이디 입니다</span>'; 
        }
?>
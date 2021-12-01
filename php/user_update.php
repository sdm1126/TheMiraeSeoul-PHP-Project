<?php
    include_once('../db/db_connector.php');

    $password = $_GET['q'];
    $mode = $_GET['mode'];
    $id = $_SESSION['ss_mb_id'];
    
    if($mode === 'password'){
        
        $sql = "SELECT password FROM user WHERE id = '$id'";
    
        $result = mysqli_query($con, $sql);
    
        $row = mysqli_fetch_assoc($result);

        if(!password_verify($password, $row['password'])){
            echo '<span style="color: blue; font-size: 14px;">사용가능한 비밀번호입니다</span>';
        }else{
            echo '<span style="color: red; font-size: 14px;">이미 사용중인 비밀번호입니다</span>'; 
        }
    }

?>
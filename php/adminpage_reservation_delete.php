<?php
include("../db/db_connector.php");  // DB연결을 위한 같은 경로의 dbconn.php를 인클루드합니다.
$no = $_POST['no'];

$sql = " delete from reservation where no = '{$no}' "; // 입력한 비밀번호를 MySQL password() 함수를 이용해 암호화해서 가져옴
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script>alert('취소 되었습니다.');</script>";
    echo "<script>location.replace('./adminpage_reservation.php?page=1');</script>";
}

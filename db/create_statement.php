<?php
    // 가비아 호스팅 서비스 이용 시 경로 수정 예정
    include('../db/db_connector.php');
    include('../db/create_table.php');
    // include $_SERVER['DOCUMENT_ROOT']."/TheMiraeSeoul-PHP-Project/theMiraeSeoul/db/db_connector.php";
    // include $_SERVER['DOCUMENT_ROOT']."/TheMiraeSeoul-PHP-Project/theMiraeSeoul/db/create_table.php";

    // 테이블 추가/삭제/변경 시 수정 예정
    create_table($con, "user");
    create_table($con, "deleted_user");
    create_table($con, "notice");
    create_table($con, "faq");
    create_table($con, "inquiry");
    create_table($con, "reservation");
    create_table($con, "inventory");
    create_table($con, "tariff");
    create_table($con, "comment");
?>
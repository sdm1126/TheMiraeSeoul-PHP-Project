<?php
function create_procedure($con, $procedure_name) {
    $flag = false;
    $sql = "SHOW PROCEDURE STATUS WHERE Db = 'theMiraeSeoul'";
    $result = mysqli_query($con, $sql) or die('프로시저 조회 실패'.mysqli_error($con));

    while ($row = mysqli_fetch_row($result)) {
        if ($row[1] === "$procedure_name") { // 문자열로 넘어오므로 ""으로 처리 ''은 문자열뿐아니라 속성도 반영
            $flag = true;
            break;
        }
    }

    if ($flag === false) {
        switch ($procedure_name) {
            case 'user_procedure':
                $sql = "
                    CREATE PROCEDURE `user_procedure`()
                    BEGIN
                    INSERT INTO user VALUES (NULL, '관', '리자', '관리자', 'Mr.', 'admin', HEX('1q2w3e4r!'), 'sdm1126', 'naver.com', '010', '5671', '1126', now());
                    END";
                    break;

            /* FAQ 내용 입력 요망
            case 'faq_procedure':
                $sql = "
                    CREATE PROCEDURE 'faq_procedure'()
                    BEGIN
                    INSERT INTO faq VALUES (NULL, '질문 내용', '답변 내용');
                    INSERT INTO faq VALUES (NULL, '질문 내용', '답변 내용');
                    INSERT INTO faq VALUES (NULL, '질문 내용', '답변 내용');
                    END";
                    break;
            */

            case 'deal_procedure':
                $sql = "
                    CREATE PROCEDURE `deal_procedure`()
                    BEGIN
                    INSERT INTO deal VALUES (NULL, '../image/room_only.jpg', 'Room Only', '3~15층 객실', '2021-01-01', '2999-12-31');
                    INSERT INTO deal VALUES (NULL, '../image/relaxing_package.jpg', 'Relaxing Package', '3~15층 객실 + 입욕제', '2021-01-01', '2021-12-31');
                    INSERT INTO deal VALUES (NULL, '../image/streaming_package.jpg', 'Streaming Package', '3~15층 객실 + 셋톱박스 대여 + CGV 팝콘(L)', '2021-01-01', '2021-12-31');
                    INSERT INTO deal VALUES (NULL, '../image/everland_package.jpg', 'Everland Package', '3~15층 객실 + 에버랜드 티켓 2~3매', '2021-11-11', '2022-03-31');
                    INSERT INTO deal VALUES (NULL, '../imagwinter_package.jpg', 'Winter Package', '3~15층 객실 + 담요 + 머그컵', '2021-12-10', '2022-02-28');
                    INSERT INTO deal VALUES (NULL, '../image/christmas_package.jpg', 'Christmas Package', '3~15층 객실 + 산타모자 인형', '2021-12-20', '2021-12-31'); 
                    END";
                    break;
                    
            case 'tariff_procedure':
                $sql = "
                    CREATE PROCEDURE `tariff_procedure`()
                    BEGIN
                    INSERT INTO tariff VALUES ('2021-12-01', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2021-12-02', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2021-12-03', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2021-12-04', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2021-12-05', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2021-12-06', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2021-12-07', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2021-12-08', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2021-12-09', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2021-12-10', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2021-12-11', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2021-12-12', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2021-12-13', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2021-12-14', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2021-12-15', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2021-12-16', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2021-12-17', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2021-12-18', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2021-12-19', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2021-12-20', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2021-12-21', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2021-12-22', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2021-12-23', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2021-12-24', 240000, 240000, 260000, 340000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2021-12-25', 240000, 240000, 260000, 340000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2021-12-26', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2021-12-27', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2021-12-28', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2021-12-29', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2021-12-30', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2021-12-31', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2022-01-01', 240000, 240000, 260000, 340000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2022-01-02', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2022-01-03', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2022-01-04', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2022-01-05', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2022-01-06', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2022-01-07', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2022-01-08', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2022-01-09', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2022-01-10', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2022-01-11', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2022-01-12', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2022-01-13', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2022-01-14', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2022-01-15', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2022-01-16', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2022-01-17', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2022-01-18', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2022-01-19', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2022-01-20', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2022-01-21', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2022-01-22', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2022-01-23', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2022-01-24', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    INSERT INTO tariff VALUES ('2022-01-25', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*화*/
                    INSERT INTO tariff VALUES ('2022-01-26', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*수*/
                    INSERT INTO tariff VALUES ('2022-01-27', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*목*/
                    INSERT INTO tariff VALUES ('2022-01-28', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30); /*금*/
                    INSERT INTO tariff VALUES ('2022-01-29', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30); /*토*/
                    INSERT INTO tariff VALUES ('2022-01-30', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*일*/
                    INSERT INTO tariff VALUES ('2022-01-31', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    END";
                    break;

            default : 
                echo "<script>alert('해당 프로지서가 없습니다.');</script>";
                break;
        }

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('{$procedure_name} 프로시저가 생성되었습니다.');</script>";
            call_procedure($con, $procedure_name);
        } else {
            echo "<script>alert('{$procedure_name} 프로시저가 생성되지 않았습니다.');</script>";
        }
    }
} 

function call_procedure($con, $procedure_name) {
    $sql = "CALL ".$procedure_name.";";
    $result = mysqli_query($con, $sql) or die("프로시저 호출 실패".mysqli_error($con));
    if ($result) {
    echo "<script>alert('{$procedure_name} 프로시저가 호출되었습니다.');</script>";
    } else {
    echo "<script>alert('{$procedure_name} 프로시저가 호출되지 않았습니다.');</script>";
    }
}
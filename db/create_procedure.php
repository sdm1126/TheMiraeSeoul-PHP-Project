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

            case 'faq_procedure':
                $sql = "
                    CREATE PROCEDURE `faq_procedure`()
                    BEGIN
                        INSERT INTO faq VALUES
                        (NULL, 
                        '얼리 체크인이 가능한가요?', 
                        '얼리 체크인
                        09:00 이전 : 1박 요금의 100%
                        12:00 이전 : 1박 요금의 50%
                        15:00 이전 : 1박 요금의 30%'),
                        (NULL, 
                        '레이트 체크아웃이 가능한가요?', 
                        '레이트 체크아웃
                        12:00 이후 : 1박 요금의 30%
                        15:00 이후 : 1박 요금의 50%
                        18:00 이후 : 1박 요금의 100%'),
                        (NULL, '공식 홈페이지에서가 아닌 다른 사이트를 통한 예약 건도 취소가 가능한가요?','개인정보보호의 이유로 예약하신 사이트 측에 문의 부탁드립니다.'),
                        (NULL, '장애인이 이용 가능한 전용 객실이 있나요?','장애인 이용에 불편이 없도록 전용 객실 및 서비스(주차 구역, 휠체어 대여 등)를 운영 중입니다.'),
                        (NULL, '객실 내 와인잔 및 오프너가 비치되어있나요?',' 수량에 여유가 있을 경우에 한하여 프론트에서 체크인 시 대여 중입니다.'),
                        (NULL, '객실 내 전자레인지가 비치되어있나요?','화재 가능성이 있어 전자레인지는 별도로 비치되어있지 않습니다.'),
                        (NULL, '객실 예약 안내 부탁드립니다.','객실 예약은 대표전화와 홈페이지,모바일,앱,이메일을 통하여 예약가능합니다.'),
                        (NULL, '객실 예약 시 개인정보 유출의 위험이 있나요?','호텔의 보안은 안전합니다 예약 시 본인 인증 후 개인 예약 내역을 알려드립니다. 본인 인증에 실패 하였을 경우 개인 예약 내역을 누설하지 않습니다.'),
                        (NULL, '공식 홈페이지가 아닌 다른 사이트를 통한 예약건도 직접 취소가 가능한가요?','개인정보보호의 이유로 호텔에서는 취소가 어렵습니다. 타사이트를 통한 예약 건은 예약하신 사이트를 통해 취소 가능합니다.'),
                        (NULL, '예약 후 당일 취소가 가능한가요?','당일 취소 및 변경은 불가하며,예약 후 사용예정일(체크인 기준)에 따른 위약금이 부과 됩니다.'),
                        (NULL, '성인 3명이 투숙할 수 있는 룸이 있나요?','트리플객실과 그랜드객실에서 3인투숙이 가능하시며,추가 요금 없이 편하게 투숙하실 수 있습니다.'),
                        (NULL, '객실 내 넷플릭스 시청과 미러링 가능한가요?','객실 내 넷플릭스, 미러링 서비스는 지원되지 않습니다.'),
                        (NULL, '와인을 직접 구매하여 가져왔는데 차갑게 보관이 가능한가요?','고객님 가져오신 와인을 차갑게 보관해드리기 위하여 와인을 담을 수 있는 아이스 버킷을 제공해 드리고 있습니다.'),
                        (NULL, '객실에서 아이스버킷은 어떻게 이용하나요?','전 객실에 비치 되어 있는 아이스버킷의 경우,전 층에 설치 되어있는 아이스 머신에서 원하시는 만큼 자유롭게 얼음을 담아서 이용 하실 수 있습니다.'),
                        (NULL, '객실 내 별도의 장식이 가능한가요?','외부업체 이용은 불가능합니다.'),
                        (NULL, '숙박 예약 시 어떤 결제수단을 사용할 수 있나요','숙박을 예약 하실 때 사용할 수 있는 결제수단을 신용카드 방법이 있습니다.'),
                        (NULL, '피트니스 이용요금이 궁금합니다','투숙객 한하여 무료로 제공되는 시설입니다.'),
                        (NULL, '외부 배달 음식을 주문해도 되나요?','호텔 규정 상 외부 배달 음식은 주문하실 수 없습니다.'),
                        (NULL, '결제 취소를 했는데 취소 기간이 얼마나 걸리나요?','카드취소 시 카드 취소 접수 후 영업일 기준 약 7일 소요됩니다'),
                        (NULL, '컴퓨터와 프린트는 무료로 사용가능한가요?','프린트는 컬러 1장 기준 1,100원, 흑백 1장 550원의 이용료가 부과되며 24시간으로 이용가능합니다.'),
                        (NULL, '성수기는 언제부터인가요?','성수기는 5월/7월/8월/9월/10월/12월 6개월의 전체 일자와 연중 모든 토요일, 연중 국/공휴일 또는 대체 휴무일의 하루 전 날, 연중 연휴 시작 하루 전날부터 마지막 연휴 전날까지를 의미합니다.');
                    END";
                    break;

            case 'reservation_insert_procedure':
                $sql = "
                    CREATE PROCEDURE `reservation_insert_procedure`(
                        IN in_no INT(11),
                        IN in_id VARCHAR(20),
                        IN in_full_name VARCHAR(40),
                        IN in_check_in DATE,
                        IN in_check_out DATE,
                        IN in_adult INT,
                        IN in_child INT,
                        IN in_deal_name VARCHAR(40),
                        IN in_room_type VARCHAR(3),
                        IN in_adult_breakfast INT,
                        IN in_child_breakfast INT,
                        IN in_total_tariff INT,
                        IN in_room_night INT,
                        IN in_cc_company VARCHAR(15),
                        IN in_cc_number VARCHAR(19),
                        IN in_cc_expiry_month CHAR(2),
                        IN in_cc_expiry_year CHAR(4),
                        IN in_special_request VARCHAR(255),
                        IN in_reservation_date DATETIME
                    )
                    BEGIN
                        DECLARE prev_check_out DATE;
                        SET prev_check_out = DATE_SUB(in_check_out, INTERVAL 1 DAY);
                    
                        INSERT INTO reservation VALUES(
                            in_no,
                            in_id,
                            in_full_name,
                            in_check_in,
                            in_check_out,
                            in_adult,
                            in_child,
                            in_deal_name,
                            in_room_type,
                            in_adult_breakfast,
                            in_child_breakfast,
                            in_total_tariff,
                            in_room_night,
                            in_cc_company,
                            in_cc_number,
                            in_cc_expiry_month,
                            in_cc_expiry_year,
                            in_special_request,
                            in_reservation_date
                        );
                        
                        IF in_room_type = '더블' THEN
                        UPDATE inventory 
                        SET inventory_double = inventory_double - 1
                        WHERE inventory_date BETWEEN in_check_in AND prev_check_out;
                        END IF;
                        
                        IF in_room_type = '트윈' THEN
                        UPDATE inventory 
                        SET inventory_twin = inventory_twin - 1
                        WHERE inventory_date BETWEEN in_check_in AND prev_check_out;
                        END IF;
                        
                        IF in_room_type = '트리플' THEN
                        UPDATE inventory 
                        SET inventory_triple = inventory_triple - 1
                        WHERE inventory_date BETWEEN in_check_in AND prev_check_out;
                        END IF;
                        
                        IF in_room_type = '그랜드' THEN
                        UPDATE inventory 
                        SET inventory_grand = inventory_grand - 1
                        WHERE inventory_date BETWEEN in_check_in AND prev_check_out;
                        END IF;
                    END";
                    break;

            case 'reservation_delete_procedure':
                $sql = "
                    CREATE PROCEDURE `reservation_delete_procedure`(
                        IN in_no INT(11)
                    )
                    BEGIN
                        DECLARE in_check_in DATE;
                        DECLARE in_check_out DATE;
                        DECLARE in_prev_check_out DATE;
                        DECLARE in_room_type VARCHAR(3);
                    
                        SET in_check_in = (SELECT check_in FROM reservation WHERE no = in_no);
                        SET in_check_out = (SELECT check_out FROM reservation WHERE no = in_no);
                        SET in_prev_check_out = DATE_SUB(in_check_out, INTERVAL 1 DAY);
                        SET in_room_type = (SELECT room_type FROM reservation WHERE no = in_no);
                    
                        IF in_room_type = '더블' THEN
                        UPDATE inventory 
                        SET inventory_double = inventory_double + 1
                        WHERE inventory_date BETWEEN in_check_in AND in_prev_check_out;
                        END IF;
                        
                        IF in_room_type = '트윈' THEN
                        UPDATE inventory 
                        SET inventory_twin = inventory_twin + 1
                        WHERE inventory_date BETWEEN in_check_in AND in_prev_check_out;
                        END IF;
                        
                        IF in_room_type = '트리플' THEN
                        UPDATE inventory 
                        SET inventory_triple = inventory_triple + 1
                        WHERE inventory_date BETWEEN in_check_in AND in_prev_check_out;
                        END IF;
                        
                        IF in_room_type = '그랜드' THEN
                        UPDATE inventory 
                        SET inventory_grand = inventory_grand + 1
                        WHERE inventory_date BETWEEN in_check_in AND in_prev_check_out;
                        END IF;
                        
                        DELETE FROM reservation WHERE no = in_no;
                        
                    END";
                    break;

            case 'deal_procedure':
                $sql = "
                    CREATE PROCEDURE `deal_procedure`()
                    BEGIN
                        INSERT INTO deal 
                        VALUES 
                        (NULL, '../image/room_only.jpg', 'Room Only', '3~15층 객실', '2021-01-01', '2999-12-31'),
                        (NULL, '../image/relaxing_package.jpg', 'Relaxing Package', '3~15층 객실 + 입욕제', '2021-01-01', '2021-12-31'),
                        (NULL, '../image/streaming_package.jpg', 'Streaming Package', '3~15층 객실 + 셋톱박스 대여 + CGV 팝콘(L)', '2021-01-01', '2021-12-31'),
                        (NULL, '../image/everland_package.jpg', 'Everland Package', '3~15층 객실 + 에버랜드 티켓 2~3매', '2021-11-11', '2022-03-31'),
                        (NULL, '../image/winter_package.jpg', 'Winter Package', '3~15층 객실 + 담요 + 머그컵', '2021-12-10', '2022-02-28'),
                        (NULL, '../image/christmas_package.jpg', 'Christmas Package', '3~15층 객실 + 산타모자 인형', '2021-12-20', '2022-01-25');
                    END";
                    break;

            case 'inventory_procedure':
                $sql = "
                    CREATE PROCEDURE `inventory_procedure`()
                    BEGIN
                        INSERT INTO inventory 
                        VALUES 
                        (NULL, '2021-12-01', 30, 30, 30, 1), /*수*/
                        (NULL, '2021-12-02', 30, 30, 30, 1), /*목*/
                        (NULL, '2021-12-03', 30, 30, 30, 1), /*금*/
                        (NULL, '2021-12-04', 30, 30, 30, 1), /*토*/
                        (NULL, '2021-12-05', 30, 30, 30, 1), /*일*/
                        (NULL, '2021-12-06', 30, 30, 30, 1), /*월*/
                        (NULL, '2021-12-07', 30, 30, 30, 1), /*화*/
                        (NULL, '2021-12-08', 30, 30, 30, 1), /*수*/
                        (NULL, '2021-12-09', 30, 30, 30, 1), /*목*/
                        (NULL, '2021-12-10', 30, 30, 30, 1), /*금*/
                        (NULL, '2021-12-11', 30, 30, 30, 1), /*토*/
                        (NULL, '2021-12-12', 30, 30, 30, 1), /*일*/
                        (NULL, '2021-12-13', 30, 30, 30, 1), /*월*/
                        (NULL, '2021-12-14', 30, 30, 30, 1), /*화*/
                        (NULL, '2021-12-15', 30, 30, 30, 1), /*수*/
                        (NULL, '2021-12-16', 30, 30, 30, 1), /*목*/
                        (NULL, '2021-12-17', 30, 30, 30, 1), /*금*/
                        (NULL, '2021-12-18', 30, 30, 30, 1), /*토*/
                        (NULL, '2021-12-19', 30, 30, 30, 1), /*일*/
                        (NULL, '2021-12-20', 30, 30, 30, 1), /*월*/
                        (NULL, '2021-12-21', 30, 30, 30, 1), /*화*/
                        (NULL, '2021-12-22', 30, 30, 30, 1), /*수*/
                        (NULL, '2021-12-23', 30, 30, 30, 1), /*목*/
                        (NULL, '2021-12-24', 30, 30, 30, 1), /*금*/
                        (NULL, '2021-12-25', 30, 30, 30, 1), /*토*/
                        (NULL, '2021-12-26', 30, 30, 30, 1), /*일*/
                        (NULL, '2021-12-27', 30, 30, 30, 1), /*월*/
                        (NULL, '2021-12-28', 30, 30, 30, 1), /*화*/
                        (NULL, '2021-12-29', 30, 30, 30, 1), /*수*/
                        (NULL, '2021-12-30', 30, 30, 30, 1), /*목*/
                        (NULL, '2021-12-31', 30, 30, 30, 1), /*금*/
                        (NULL, '2022-01-01', 30, 30, 30, 1), /*토*/
                        (NULL, '2022-01-02', 30, 30, 30, 1), /*일*/
                        (NULL, '2022-01-03', 30, 30, 30, 1), /*월*/
                        (NULL, '2022-01-04', 30, 30, 30, 1), /*화*/
                        (NULL, '2022-01-05', 30, 30, 30, 1), /*수*/
                        (NULL, '2022-01-06', 30, 30, 30, 1), /*목*/
                        (NULL, '2022-01-07', 30, 30, 30, 1), /*금*/
                        (NULL, '2022-01-08', 30, 30, 30, 1), /*토*/
                        (NULL, '2022-01-09', 30, 30, 30, 1), /*일*/
                        (NULL, '2022-01-10', 30, 30, 30, 1), /*월*/
                        (NULL, '2022-01-11', 30, 30, 30, 1), /*화*/
                        (NULL, '2022-01-12', 30, 30, 30, 1), /*수*/
                        (NULL, '2022-01-13', 30, 30, 30, 1), /*목*/
                        (NULL, '2022-01-14', 30, 30, 30, 1), /*금*/
                        (NULL, '2022-01-15', 30, 30, 30, 1), /*토*/
                        (NULL, '2022-01-16', 30, 30, 30, 1), /*일*/
                        (NULL, '2022-01-17', 30, 30, 30, 1), /*월*/
                        (NULL, '2022-01-18', 30, 30, 30, 1), /*화*/
                        (NULL, '2022-01-19', 30, 30, 30, 1), /*수*/
                        (NULL, '2022-01-20', 30, 30, 30, 1), /*목*/
                        (NULL, '2022-01-21', 30, 30, 30, 1), /*금*/
                        (NULL, '2022-01-22', 30, 30, 30, 1), /*토*/
                        (NULL, '2022-01-23', 30, 30, 30, 1), /*일*/
                        (NULL, '2022-01-24', 30, 30, 30, 1), /*월*/
                        (NULL, '2022-01-25', 30, 30, 30, 1), /*화*/
                        (NULL, '2022-01-26', 30, 30, 30, 1), /*수*/
                        (NULL, '2022-01-27', 30, 30, 30, 1), /*목*/
                        (NULL, '2022-01-28', 30, 30, 30, 1), /*금*/
                        (NULL, '2022-01-29', 30, 30, 30, 1), /*토*/
                        (NULL, '2022-01-30', 30, 30, 30, 1), /*일*/
                        (NULL, '2022-01-31', 30, 30, 30, 1); /*월*/
                    END";
                    break;
                    
            case 'tariff_procedure':
                $sql = "
                    CREATE PROCEDURE `tariff_procedure`()
                    BEGIN
                        INSERT INTO tariff 
                        VALUES 
                        (NULL, '2021-12-01', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2021-12-02', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2021-12-03', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2021-12-04', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2021-12-05', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2021-12-06', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2021-12-07', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2021-12-08', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2021-12-09', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2021-12-10', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2021-12-11', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2021-12-12', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2021-12-13', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2021-12-14', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2021-12-15', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2021-12-16', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2021-12-17', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2021-12-18', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2021-12-19', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2021-12-20', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2021-12-21', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2021-12-22', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2021-12-23', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2021-12-24', 240000, 240000, 260000, 340000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2021-12-25', 240000, 240000, 260000, 340000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2021-12-26', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2021-12-27', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2021-12-28', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2021-12-29', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2021-12-30', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2021-12-31', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2022-01-01', 240000, 240000, 260000, 340000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2022-01-02', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2022-01-03', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2022-01-04', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2022-01-05', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2022-01-06', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2022-01-07', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2022-01-08', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2022-01-09', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2022-01-10', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2022-01-11', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2022-01-12', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2022-01-13', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2022-01-14', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2022-01-15', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2022-01-16', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2022-01-17', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2022-01-18', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2022-01-19', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2022-01-20', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2022-01-21', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2022-01-22', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2022-01-23', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2022-01-24', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*월*/
                        (NULL, '2022-01-25', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*화*/
                        (NULL, '2022-01-26', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*수*/
                        (NULL, '2022-01-27', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*목*/
                        (NULL, '2022-01-28', 160000, 160000, 180000, 260000, 50, 40, 40, 30, 30, 30), /*금*/
                        (NULL, '2022-01-29', 180000, 180000, 200000, 280000, 50, 40, 40, 30, 30, 30), /*토*/
                        (NULL, '2022-01-30', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30), /*일*/
                        (NULL, '2022-01-31', 140000, 140000, 160000, 240000, 50, 40, 40, 30, 30, 30); /*월*/
                    END";
                    break;

            default : 
                echo "<script>alert('해당 프로시저가 없습니다.');</script>";
                break;
        }

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('{$procedure_name} 프로시저가 생성되었습니다.');</script>";
            if ($procedure_name !== "reservation_insert_procedure" && $procedure_name !== "reservation_delete_procedure") {
                call_procedure($con, $procedure_name);
            }
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
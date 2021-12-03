<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reservation2.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/reservation2.js"></script>
</head>

<body>
    <div class="container">
        <!-- header -->
        <?php
            include_once('./header.php');
        ?>

        <!-- article -->
        <article>
            <div class="article-group">
                <section class="section1">
                    <h2>예 약</h2>
                </section>

                <section class="section2">
                    <h3>신용카드 정보</h3>
                    <table>
                        <tr>
                            <td>카드 종류 *</td>
                            <td>
                                <select id="#company">
                                    <option>AMEX</option>
                                    <option>BC</option>
                                    <option>CITI BANK</option>
                                    <option>DINERS</option>
                                    <option>HYUNDAI</option>
                                    <option>JCB</option>
                                    <option>AMEX</option>
                                    <option>KEB</option>
                                    <option>AMEX</option>
                                    <option>KOOKMIN</option>
                                    <option>LOTTE</option>
                                    <option>AMEX</option>
                                    <option>MASTER OVERSEAS</option>
                                    <option>SHINHAN</option>
                                    <option>SAMSUNG</option>
                                    <option>VISA OVERSEAS</option>
                                    <option>UNION PAY</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>카드 번호 *</td>
                            <td>
                                <input type="text" maxlength="4" /> -
                                <input type="text" maxlength="4" /> -
                                <input type="text" maxlength="4" /> -
                                <input type="text" maxlength="4" />
                            </td>
                        </tr>
                        <tr>
                            <td>유효 기간 *</td>
                            <td>
                                <select>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select> /
                                <select>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <span>
                        ※ 위 정보는 투숙을 개런티하기 위한 용도 외에는 어떤 목적으로도 사용되지 않습니다.<br>
                        ※ 체크카드 및 일부 신용카드의 경우 사용이 제한될 수 있습니다.<br>
                        ※ 온라인 예약 시 직접 결제가 이루어지지 않으며, 최종 결제는 프론트 데스크에서 해주시기 바랍니다.
                    </span>
                </section>

                <section class="section3">
                    <h3>추가 요청 사항</h3>
                    <textarea></textarea><br>
                    <span>
                        ※ 객실 컨디션은 당일 객실 상황에 따라 달라질 수 있습니다.<br>
                        ※ 전 객실은 금연실로 운영 중입니다.
                    </span>
                </section>

                <section class="section4">
                    <h3>유의 사항</h3>
                    <span>
                        ※ 체크인 시 등록카드 작성 및 투숙객 본인 확인을 위해 본인 사진이 포함된 신분증을 반드시 제시해 주시기 바랍니다.<br>
                        ※ 안내견을 제외한 애완견 등 동물 입장은 불가합니다.<br>
                        ※ 부모를 동반하지 않은 만 19세 미만 미성년자는 투숙할 수 없습니다.(청소년 보호법 제 30조/제 58조)<br>
                        ※ 객실 이용 시 객실 당 1대 무료로 주차 가능합니다.(체크아웃 당일 오후 1시까지)<br>
                        ※ 자세한 객실 안내는 객실예약실(02-441-7007)로 문의 바랍니다.
                    </span>
                </section>

                <section class="section5">
                    <h3>취소 및 환불 규정</h3>
                    <span>
                        ※ 모든 취소 및 환불 요청은 객실예약실(02-441-7007)로 문의 바랍니다. <br>
                        ※ 숙박예정일 1일 전 18시 이전: 위약금 없이 취소 가능<br>
                        ※ 숙박예정일 1일 전 18시 이후: 1박 요금의 80% 부과
                    </span>
                </section>

                <section class="section6">
                    <input type="submit" id="submit" value="예약"></input>
                </section>
            </div>

        </article>

        <!-- footer -->
        <?php
            include_once('./footer.php');
        ?>
    </div>
</body>

</html>
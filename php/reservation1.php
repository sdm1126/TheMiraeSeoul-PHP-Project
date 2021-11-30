<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reservation1.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/reservation1.js"></script>
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
                    <h3>예약 세부정보</h3>
                </section>

                <section class="section3">
                    <!-- 1. 일정 선택 -->
                    <div class="section3-1">
                        <h3>일정 선택</h3>
                        <fieldset>
                            <span>체크인</span>
                            <input type="date" id="date1" />
                            <span>체크아웃</span>
                            <input type="date" id="date2" />
                        </fieldset>
                    </div>

                    <!-- 2. 인원 선택 -->
                    <div class="section3-2">
                        <h3>인원 선택</h3>
                        <fieldset>
                            <span>성인</span>
                            <input type="number" id="number1" value="2" />
                            <span>소아</span>
                            <input type="number" id="number2" value="0" />
                        </fieldset>
                        <span>※ 객실당 총 4인까지 투숙 가능합니다.</span>
                    </div>

                    <!-- 3. 상품 선택 -->
                    <div class="section3-3">
                        <h3>상품 선택</h3>
                        <!-- PHP 반복문 사용 요망 -->
                        <fieldset>
                            <div class="section3-3-group">
                                <div class="section3-3-left">
                                    <img src="../image/image.jpg" />
                                </div>
                                <div class="section3-3-center">
                                    <h3>Room Only</h3>
                                    <h4>3~15층 객실</h4>
                                    <h4>상시</h4>
                                </div>
                                <div class="section3-3-right">
                                    <label><input type="radio" name="type" value="더블" checked>더블</label><br>
                                    <label><input type="radio" name="type" value="트윈">트윈</label><br>
                                    <label><input type="radio" name="type" value="트리플">트리플</label><br>
                                    <label><input type="radio" name="type" value="그랜드">그랜드</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- 4. 옵션 선택 -->
                    <div class="section3-4">
                        <h3>옵션 선택</h3>
                        <fieldset>
                            <span>성인 조식</span>
                            <input type="number" id="number3" value="0" />
                            <span>소아 조식</span>
                            <input type="number" id="number4" value="0" />
                        </fieldset>
                        <span>
                            ※ 투숙 시 조식 요금은 성인 1인 19,800원, 소아 1인 10,000원입니다.<br>
                            ※ 조식이 포함된 패키지를 예약하신 경우, 추가 인원에 대한 조식만 선택해주시기 바랍니다.<br>
                            ※ 37개월 미만의 유아 동반 시 조식에 대한 요금은 무료입니다.
                        </span>
                    </div>
                </section>
                <section class="section4">
                    <h2>총 90,000원(VAT 포함)</h2>
                    <button>다 음</button>
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
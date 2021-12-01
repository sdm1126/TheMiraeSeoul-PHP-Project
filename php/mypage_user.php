<?php
include_once('../db/db_connector.php');
if(isset($_SESSION['ss_mb_id'])){
    
    $id = sql_escape($con, $_SESSION['ss_mb_id']);

    if(empty($id)){
        mysqli_close($con);
        header("location: login.php?error=user_id_empty");
        exit;
    }else{
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
?>
        <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="../css/mypage_user.css">
                <link rel="stylesheet" href="../css/header.css">
                <link rel="stylesheet" href="../css/footer.css">
                <link rel="stylesheet" href="../css/aside.css">
            </head>

            <body>
                <div class="container">
                    <?php
                    include('./header.php');
                    ?>
                    <aside>
                        <div>
                            <ul>
                                <li class="title">마이 페이지</li>
                                <hr>
                                <li><a href="./mypage_user.php"><b>내 정보</b></a></li>
                                <li><a href="./mypage_reservation.php">내 예약</a></li>
                                <li><a href="./mypage_inquiry_board.php?page=1">내 문의</a></li>
                                <li><a href="./mypage_resignation.php">회원탈퇴</a></li>
                            </ul>
                        </div>
                    </aside>
                    <main>
                        <article class="h2">
                            <h2>내 정보</h2>
                        </article>
                        <hr>
                        <article class="name">
                            <table>
                                <tr>
                                    <td>성(영문)</td>
                                    <td><?= $row['last_name'] ?></td>
                                    <td>이름(영문)</td>
                                    <td><?= $row['first_name'] ?></td>
                                </tr>
                                <form action="./mypage_user_update.php" name="user_form" method="post">
                                    <tr class="gender">
                                        <td>성별</td>
                                        <td colspan="3">
                                            <span id="span_gender"><?= $row['gender'] ?></span>
                                            <select name="gender" id="gender" style="display: none" ;>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Ms.">Ms.</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="id_password">
                                        <td>아이디</td>
                                        <td colspan="3">
                                            <span id="id"><?= $row['id'] ?></span>
                                            <div id="check_id"></div>
                                        </td>
                                    </tr>
                                    <tr class="id_password" style="display: none;">
                                        <td>새 비밀번호</td>
                                        <td colspan="3">
                                            <input type="password" name="password" id="password_new" placeholder="새 비밀번호 입력" required>
                                            <div></div>
                                        </td>
                                    </tr>
                                    <tr class="id_password" style="display: none;">
                                        <td>비밀번호 확인</td>
                                        <td colspan="3">
                                            <input type="password" id="password_check" placeholder="비밀번호와 동일하게 입력" required>
                                            <div id="password_failed"></div>
                                        </td>
                                    </tr>
                                    <tr class="email">
                                        <td>이메일</td>
                                        <td colspan="3">
                                            <input type="text" id="email1" name="email1" value="<?= $row['email1'] ?>" readonly required>
                                            <span>@</span>
                                            <input type="text" id="email2" name="email2" value="<?= $row['email2'] ?>" readonly required>
                                            <select name="email" id="email" style="display: none;">
                                                <option value="naver.com">naver.com</option>
                                                <option value="gmail.com">gmail.com</option>
                                                <option value="">직접 입력</option>
                                            </select>
                                            <div></div>
                                        </td>
                                    </tr>
                                    <tr class="phone">
                                        <td>휴대전화</td>
                                        <td colspan="3">
                                            <input type="text" id="mobile1" name="mobile1" value="<?= $row['mobile1'] ?>" readonly required>
                                            <span>-</span>
                                            <input type="text" id="mobile2" name="mobile2" value="<?= $row['mobile2'] ?>" readonly required>
                                            <span>-</span>
                                            <input type="text" id="mobile3" name="mobile3" value="<?= $row['mobile3'] ?>" readonly required>
                                            <div></div>
                                        </td>
                                    </tr>
                            </table>
                        </article>
                        <article class="buttons">
                            <input type="button" id="update" value="수 정">
                            <input type="button" id="cancel" value="취 소" style="display: none;">
                        </article>
                        </form>
                    </main>
                    <?php
                    include('./footer.php');
                    ?>
                </div>
                <script>
                    let password_flag       = true
                    let password_check_flag = true
                    let email_flag          = true
                    let mobile_flag         = true

                    let id                  = document.querySelector('#id')
                    let password_new        = document.querySelector('#password_new')
                    let password_check      = document.querySelector('#password_check')
                    let email1              = document.querySelector('#email1')
                    let email2              = document.querySelector('#email2')
                    let mobile1             = document.querySelector('#mobile1')
                    let mobile2             = document.querySelector('#mobile2')
                    let mobile3             = document.querySelector('#mobile3')
                    
                    let passwords           = document.querySelectorAll('.id_password')
                    let selects             = document.querySelectorAll('table select')
                    let texts               = document.querySelectorAll('table input[type="text"]')
                    
                    let button_update       = document.querySelector('#update')
                    let button_cancel       = document.querySelector('#cancel')
                    
                    // functions
                    let set_event = function(){
                        
                        // 비밀번호 재설정 체크
                        password_new.addEventListener('keyup', function(){
                            let str = this.value
                            let reg_id = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/
                            if(reg_check(this, str, reg_id, '', '최소 8자, 하나의 숫자와 특수 문자 포함한 문자')){
                                formCheck(this, str, 'password')
                                password_flag = !this.lastElementChild.innerHTML.includes('red') 
                            }
                        })

                        password_check.addEventListener('keyup', function(){
                            let str = this.value
                            if(str === ''){
                                this.parentElement.lastElementChild.innerHTML = ''
                            }else if(password_new.value === str){
                                this.parentElement.lastElementChild.innerHTML = '<span style="color: blue; font-size: 14px;">비밀번호가 일치합니다</span>'
                                password_check_flag = true
                            }else{
                                this.parentElement.lastElementChild.innerHTML = '<span style="color: red; font-size: 14px;">비밀번호가 일치하지 않습니다</span>'
                            password_check_flag = false
                            }
                        })

                        // 이메일 체크
                        email1.addEventListener('keyup', function(){
                            let str = this.value
                            let reg_email1 = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*$/i
                            if(!reg_check(this, str, reg_email1, '사용가능한 이메일입니다', '이메일 형식에 맞지 않습니다')){
                                email1.style.borderColor = "red"
                                this.parentElement.lastElementChild.innerHTML = '<span style="color: red; font-size: 14px;">이메일 아이디 형식이 아닙니다</span>'
                            }else{
                                email1.style.borderColor = ""
                            }
                            email_flag = !email1.parentElement.lastElementChild.innerHTML.includes('red')
                        })

                        email2.addEventListener('keyup', function(){
                            let str = this.value
                            let reg_email2 = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i
                            if(!reg_check(this, str, reg_email2, '사용가능한 이메일입니다', '이메일 형식에 맞지 않습니다')){
                                email2.style.borderColor = "red"
                                this.parentElement.lastElementChild.innerHTML = '<span style="color: red; font-size: 14px;">이메일 주소 형식이 아닙니다</span>'
                            }else{
                                email2.style.borderColor = ""
                            }
                            email_flag = !email2.parentElement.lastElementChild.innerHTML.includes('red')
                        })

                        // 전화번호 체크 
                        mobile1.addEventListener('keyup', function(){
                            let str = this.value
                            let reg_mobile1 =  /^01([0|1|6|7|8|9])$/
                            mobile_flag = reg_check(this, str, reg_mobile1, '사용가능한 번호입니다', '전화번호 형식이 아닙니다')
                        })

                        mobile2.addEventListener('keyup', function(){
                            let str = this.value
                            let reg_mobile2 =  /^([0-9]{3,4})$/
                            mobile_flag = reg_check(this, str, reg_mobile2, '사용가능한 번호입니다', '전화번호 형식이 아닙니다')
                        })

                        mobile3.addEventListener('keyup', function(){
                            let str = this.value
                            let reg_mobile3 =  /^([0-9]{3,4})$/
                            mobile_flag = reg_check(this, str, reg_mobile3, '사용가능한 번호입니다', '전화번호 형식이 아닙니다')
                        })
                    }
            
                    document.querySelector('#gender option[value="<?= $row['gender'] ?>"]').selected = "selected"
                    selects[0].addEventListener('change', function(){
                        document.querySelector('#span_gender').innerHTML = this.value
                    })

                    selects[1].addEventListener('change', function(){
                        document.querySelector('#email2').value = this.value
                    })

                    button_update.addEventListener('click', function() {
                        if (button_update.value === "수 정") {
                            change_attr(false)
                            button_cancel.style.display = ""
                            button_update.value = "확 인"
                            set_event()
                        } else if (button_update.value === "확 인") {
                            if(password_flag && password_check_flag && email_flag && mobile_flag){
                                button_update.type = "submit"
                            }else{
                                alert('형식에 맞지 않습니다!')
                            }
                        }
                    })

                    button_cancel.addEventListener('click', function() {
                        location.reload()
                    })


                    let reg_check = function(btn, str, reg, good, fail){
                        if(reg.test(str)){
                            btn.parentElement.lastElementChild.innerHTML = '<span style="color: blue; font-size: 14px;">' +good + '</span>'
                            return true
                        }else{
                            btn.parentElement.lastElementChild.innerHTML = '<span style="color: red; font-size: 14px;">' +fail + '</span>'
                            return false
                        }
                    }

                    let formCheck = function(button, str, mode) {
                        var xhttp
                        if (str == "") {
                            button.parentElement.lastElementChild.innerHTML = ""
                            return
                        }
                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState === this.DONE && this.status === 200) {
                                button.parentElement.lastElementChild.innerHTML = this.responseText
                                id_flag = (button.parentElement.lastElementChild.innerHTML.includes('blue'))
                            }
                        }
                        xhttp.open("GET", "user_update.php?q=" + str + "&mode=" + mode, true)
                        xhttp.send()
                    }

                    let change_attr = function(flag) {
                        let str = ""
                        if (flag) str = "none"
                        for (let i = 0; i < selects.length; i++) {
                            selects[i].style.display = str
                        }
                        for(let i = 1; i < passwords.length; i++){
                            passwords[i].style.display = str
                        }
                        for (let i = 0; i< texts.length; i++){
                            texts[i].readOnly = flag
                        }
                    }
                </script>
            </body>
            </html> 
<?php
        }
    }
 }
 ?>

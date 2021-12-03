document.addEventListener('DOMContentLoaded', () => {
let password_flag       = true
let password_check_flag = true
let email_flag          = true
let mobile_flag         = true

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
})
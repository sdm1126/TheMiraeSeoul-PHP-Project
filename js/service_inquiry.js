document.addEventListener('DOMContentLoaded', () => {

let check1 = document.querySelector('#check1')
let submit = document.querySelector('#submit')
let message = document.querySelector('#message')
check1.addEventListener('click', function(){
    if(check1.checked){
        submit.disabled = false
        message.innerHTML = ""
    }else{
        submit.disabled = true
        message.innerHTML = '<span style="color: red; font-size: 14px;">필수 동의 사항입니다</span>'
    }
})
})
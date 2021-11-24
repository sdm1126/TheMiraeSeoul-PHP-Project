document.addEventListener('DOMContentLoaded', () => {
    // 체크인 - 오늘 날짜 이전은 선택 불가
    let date1 = document.querySelector('#date1')
    let today = new Date().getFullYear() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getDate()
    console.log(today)
    date1.setAttribute('min', today)

    // 체크아웃 - (오늘 날짜 + 1) 이전은 선택 불가
    let date2 = document.querySelector('#date2')
    let tomorrow = new Date().getFullYear() + "-" + (new Date().getMonth() + 1) + "-" + (new Date().getDate() + 1)
    console.log(tomorrow)
    date2.setAttribute('min', tomorrow)

    // 성인
    let number1 = document.querySelector('#number1')
    number1.setAttribute('min', 0)
    number1.setAttribute('max', 3)

    // 소아
    let number2 = document.querySelector('#number2')
    number2.setAttribute('min', 0)
    number2.setAttribute('max', 3)

    // 성인 조식
    let number3 = document.querySelector('#number3')
    number3.setAttribute('min', 0)
    number3.setAttribute('max', 3)
    
    // 소아 조식
    let number4 = document.querySelector('#number4')
    number4.setAttribute('min', 0)
    number4.setAttribute('max', 3)
})
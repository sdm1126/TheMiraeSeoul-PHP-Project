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
})
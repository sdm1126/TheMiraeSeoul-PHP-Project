document.addEventListener('DOMContentLoaded', () => {
    // 1. 체크인
    let date1 = document.querySelector('#date1')

    // 1-1. 최소 일자를 오늘로 설정
    let today = new Date().getFullYear() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getDate()
    date1.setAttribute('min', today)

    // 1-2. 변경 시 값 추출
    date1.addEventListener('change', function() {
        let check_in = this.value
        console.log(check_in)
    })
})
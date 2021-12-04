document.addEventListener('DOMContentLoaded', () => {
    const search = document.querySelector('#search');
    const search_excel = document.querySelector('#search_excel');
    const all_excel = document.querySelector('#all_excel');
    const root = document.querySelector('#root');
    const nameId = document.querySelector('#nameId');
    search.addEventListener('click', (event) => {
        if (nameId.value.trim() === '') {
            location.replace('./adminpage_inquiry_board.php?page=1');
        } else {

            location.replace('./adminpage_inquiry_board.php?page=1&search=' + root.value + '&nameId=' + nameId.value);
        }
    })

    search.addEventListener('click', (event) => {
        if (nameId.value.trim() === '') {
            location.replace('./adminpage_inquiry_board.php?page=1');
        } else {

            location.replace('./adminpage_inquiry_board.php?page=1&search=' + root.value + '&nameId=' + nameId.value);
        }
    })

})


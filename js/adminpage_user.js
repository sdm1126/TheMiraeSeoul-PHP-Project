document.addEventListener('DOMContentLoaded', () => {
  const search = document.querySelector('#search');
  const search_excel = document.querySelector('#search_excel');
  const all_excel = document.querySelector('#all_excel');
  const root = document.querySelector('#root');
  const nameId = document.querySelector('#nameId');
  search.addEventListener('click', (event) => {
      if (nameId.value.trim() === '') {
          location.replace('./adminpage_user.php?page=1');
      } else {
          location.replace('./adminpage_user.php?page=1&search=' + root.value + '&nameId=' + nameId.value);
      }
  })

const excel = function(){
    let url = new URL(window.location.href)
    let root_value = url.searchParams.get('search')
    let nameId_value = url.searchParams.get('nameId')

    if (nameId.value.trim() === '') {
        location.replace('./adminpage_excel.php?mode=user_log');
    } else {
        location.replace('./adminpage_excel.php?mode=user_log&search=' + root_value + '&nameId=' + nameId_value);
    }
}
search_excel.addEventListener('click', excel)
all_excel.addEventListener('click', excel)
})
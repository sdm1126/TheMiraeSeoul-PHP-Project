document.addEventListener('DOMContentLoaded', () => {
  const search = document.querySelector('#search');
  const root = document.querySelector('#root');
  const nameId = document.querySelector('#nameId');
  search.addEventListener('click', (event) => {
      if (nameId.value.trim() === '') {
          location.replace('./adminpage_reservation.php?page=1');
      } else {

          location.replace('./adminpage_reservation.php?page=1&search=' + root.value + '&nameId=' + nameId.value);
      }
  })
})
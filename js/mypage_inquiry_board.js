document.addEventListener('DOMContentLoaded', () =>{

    let select = document.querySelector('#select')
    let search_str = document.querySelector('#search_str')
    let error = document.querySelector('#error')
    let submit = document.querySelector('#submit')
    
    search_str.addEventListener('keyup', function() {
      let str = this.value
      if (select.options[select.selectedIndex].value === 'written_date') {
        var xhttp
        if (str == "") {
          error.innerHTML = ""
          return
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === this.DONE && this.status === 200) {
            error.innerHTML = this.responseText
          }
        }
        xhttp.open("GET", "search_str_check.php?q=" + str, true)
        xhttp.send()
    
      }
    })
    
    submit.addEventListener('click', function(){
      if (select.options[select.selectedIndex].value === 'written_date'){
          if(error.innerHTML){
            search_str.value = ''
          }
      }
    })
    })
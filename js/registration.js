function fregisterform_submit(form) {
  if (form.first_name.value.length < 1) { // 회원아이디 검사
      alert("성(영문)를 입력하십시오.");
      form.first_name.focus();
      return false;
  }
  if (form.second_name.value.length < 1) { // 회원아이디 검사
      alert("이름(영문)를 입력하십시오.");
      form.second_name.focus();
      return false;
  }

  if (form.id.value.length < 1) { // 회원아이디 검사
      alert("아이디를 입력하십시오.");
      form.id.focus();
      return false;
  }

  if (form.password.value.length < 3) {
      alert("비밀번호를 3글자 이상 입력하십시오.");
      form.mb_password.focus();
      return false;
  }

  if (form.password.value != form.password_re.value) {
      alert("비밀번호가 같지 않습니다.");
      form.password_re.focus();
      return false;
  }

  if (form.password.value.length > 0) {
      if (form.password_re.value.length < 3) {
          alert("비밀번호를 3글자 이상 입력하십시오.");
          form.mb_password_re.focus();
          return false;
      }
  }

  if (form.email1.value.length < 1) { // 이메일 검사
      alert("이메일을 입력하십시오.");
      form.email1.focus();
      return false;
  }
  if (form.email2.value.length < 1) { // 이메일 검사
      alert("이메일을 입력하십시오.");
      form.email2.focus();
      return false;
  }
  if (form.mobile1.value.length < 1) { // 이메일 검사
      alert("휴대전화을 입력하십시오.");
      form.mobile1.focus();
      return false;
  }
  if (form.mobile2.value.length < 1) { // 이메일 검사
      alert("휴대전화을 입력하십시오.");
      form.mobile2.focus();
      return false;
  }
  if (form.mobile3.value.length < 1) { // 이메일 검사
      alert("휴대전화을 입력하십시오.");
      form.mobile3.focus();
      return false;
  }

  return true;
}
document.addEventListener('DOMContentLoaded', () => {
  const secondEmail = document.querySelector('#email_second');
  const selectedEmail = document.querySelector('#selected_email');
  const id = document.querySelector('#id');
  const password_new = document.querySelector('#password_new');
  const password_check = document.querySelector('#password_check');
  const email1 = document.querySelector('#email1');
  const email2 = document.querySelector('#email2');
  const mobile1 = document.querySelector('#mobile1');
  const mobile2 = document.querySelector('#mobile2');
  const mobile3 = document.querySelector('#mobile3');
  selectedEmail.addEventListener('change', (event) => {
      secondEmail.textContent = selectedEmail.value;
      secondEmail.value = selectedEmail.value;
  })

})

function numberMaxLength(e) {

  if (e.value.length > e.maxLength) {

      e.value = e.value.slice(0, e.maxLength);

  }

}
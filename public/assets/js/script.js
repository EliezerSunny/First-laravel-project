
document.getElementById('year').innerHTML = new Date().getFullYear();


function showPassword(x) {
  var passwordField = document.getElementById('password');
  if (passwordField.type === 'password') {
      passwordField.type = 'text';
      // x.classList.toggle('fa-eye-slash');
  } else {
      passwordField.type = 'password';
  }
}




function openNav() {
  // body...
  document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
  // body...
  document.getElementById("mySidenav").style.width = "0";
}

var open = document.querySelector(".nav-menu");

open.addEventListener("click", function() {
  // body...
  document.querySelector("body").classList.toggle("active");
})
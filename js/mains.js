$(document).ready(function(){
    $('.cross').click(function() {
      $('.sucDiv').hide();
    });
});
//validate form for adding customer.
$(document).ready(function() {
$("#validateCustomer").validate({
  rules: {
    fname: "required",
    lname: "required",
    email: {
      required: true,
      email: true
    },
    password: {
      required: true,
      minlength: 6,
    },
    confirmPassword: {
      required: true,
      minlength: 6,
      equalTo: "#password"
  }
  },
  messages: {
    fname: "Please enter your first name",
    lname: "Please enter your last name",
    email: {
      required: "Please enter your email",
      email: "Please enter a valid email"
    },
    password: {
      required: "Please enter your password",
      minlength: "Please enter password of minimum length of 6 characters"
    },
    confirmPassword: {
      required: "Please enter your password",
      minlength: "Please enter password of minimum length of 6 characters",
      equalTo: "Password doesnot match"
    }
  }
  });
});


document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});

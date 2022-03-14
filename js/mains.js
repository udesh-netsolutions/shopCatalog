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

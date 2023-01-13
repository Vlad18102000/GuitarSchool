$(document).ready(function () {
   $("#studentEmail").on("keypress blur", function () {
      let register = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      let studentEmail = $("#studentEmail").val();
      $.ajax({
         url: 'Student/addStudent.php',
         method: 'POST',
         data: {
            checkEmail: "CheckEmail",
            studentEmail: studentEmail,
         },
         success: function (data) {
            if (data != 0) {
               $("#statusMsg2").html("<div style='color:red';font-size:8px;>*Email Already Used !</div>");
               $("#SignUpBtn").addClass('btn--disabled');
               $("#SignUpBtn").attr('disabled', true);

            } else if (data == 0 && register.test(studentEmail)) {
               $("#statusMsg2").html(" ");
               $("#SignUpBtn").removeClass('btn--disabled');
               $("#SignUpBtn").attr('disabled', false);
            } else if (!register.test(studentEmail)) {
               if (studentEmail == "") {
                  $("#statusMsg2").html("<div style='color:red';font-size:8px;>*Please Enter Your Email</div>");
               } else {
                  $("#statusMsg2").html("<div style='color:red';font-size:8px;>*Please Enter Valid Email e.x example@example.com</div>");
               }

               $("#SignUpBtn").addClass('btn--disabled');
               $("#SignUpBtn").attr('disabled', true);
            }
         }
      });
   });
});


function addStudent() {
   let register = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
   let studentName = $("#studentName").val();
   let studentEmail = $("#studentEmail").val();
   let studentPassword = $("#studentPassword").val();
   let studentPassword2 = $("#studentPassword2").val();

   if (studentName.trim() == "") {
      $("#statusMsg1").html("<div style='color:red;font-size:11px;'>*Please Enter Your Name</div>");
      $("#studentName").focus();
      return false;
   } else if (studentEmail.trim() == "") {
      $("#statusMsg2").html("<div style='color:red';font-size:8px;>*Please Enter Your Email</div>");
      $("#studentEmail").focus();
      return false;
   } else if (studentEmail.trim() != "" && !register.test(studentEmail)) {
      $("#statusMsg2").html("<div style='color:red';font-size:8px;>*Entered Valid Email e.x example@example.com</div>");
      $("#studentEmail").focus();
      return false;
   } else if (studentPassword.trim() == "") {
      $("#statusMsg3").html("<div style='color:red';font-size:8px;>*Please Enter Password</div>");
      $("#studentPassword").focus();
      return false;

   } else if (studentPassword != studentPassword2) {
      $("#statusMsg4").html("<div style='color:red';font-size:8px;>*Please Confirm Password</div>");
      $("#studentPassword2").focus();
      return false;
   } else {
      $.ajax({
         url: 'Student/addStudent.php',
         method: 'POST',
         dataType: "json",
         data: {
            studentSignUp: "studentSignUp",
            studentName: studentName,
            studentEmail: studentEmail,
            studentPassword: studentPassword,
            studentPassword2: studentPassword2,
         },
         success: function (data) {
            console.log(data);
            if (data == "OK") {
               $('#successMsg').html('<span class="modal__span-success">Registration Successfuly!</span>');
               clearStudentRegisterForm();
            } else if (data == "Failed") {
               $('#successMsg').html('<span class="modal__span-unsuccess> Unable to Register</span>');
            }
         },
      });
   }
}

function clearStudentRegisterForm() {
   $("#studentRegisterForm").trigger("reset");
   $("#statusMsg1").html(" ");
   $("#statusMsg2").html(" ");
   $("#statusMsg3").html(" ");
   $("#statusMsg4").html(" ");
}


function checkStudentLogin() {
   let studentLoginEmail = $("#studentLoginEmail").val();
   let studentLoginPassword = $("#studentLoginPassword").val();
   $.ajax({
      url: 'Student/addStudent.php',
      method: 'POST',

      data: {
         checkStudentEmail: "checkStudentEmail",
         studentLoginEmail: studentLoginEmail,
         studentLoginPassword: studentLoginPassword,
      },
      success: function (data) {
         if (data == 0) {
            $("#logMsgInvalid").html("<span style='color:red;'>Invalid Email or Password</span>");
         } else if (data == 1) {
            $("#logMsgInvalid").html(" ");
            $("#logMsg").html('<div class="modal__loading-img"><img class="img-loading__modal" src="./assets/img/Loading.gif"></div>');
            setTimeout(() => {
               window.location.href = 'index.php';
            }, 1000);
         }
      },
   });
}
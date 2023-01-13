function adminLogin() {
   console.log("aa");
   let adminEmail = $("#adminEmail").val();
   let adminPassword = $("#adminPassword").val();
   $.ajax({
      url: 'Admin/admin.php',
      method: 'POST',

      data: {
         checkAdminEmail: "checkAdminEmail",
         adminEmail: adminEmail,
         adminPassword: adminPassword,
      },
      success: function (data) {
         if (data == 0) {
            $("#logMsgInvalid1").html("<span style='color:red;'>Invalid Email or Password</span>");
         } else if (data == 1) {
            $("#logMsgInvalid1").html(" ");
            $("#logMsg1").html('<div class="modal__loading-img"><img class="img-loading__modal" src="./assets/img/Loading.gif"></div>');
            setTimeout(() => {
               window.location.href = 'Admin/dashboard.php';
            }, 1000);
         }
      },
   });
}
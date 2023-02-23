<?php
include('configDb.php');
session_start();


if(!isset($_SESSION['studentLoginEmail'])){
   include_once('checkoutLogin.php');
   echo "
   
      <div class='courses courses--checkout'>
         <div class = 'container'>
            <div class = 'login_or_signup'>
               <h1 class='checkout__title'>
                  You need to Sign In or Sign Up before continuing
               </h1>

               <div class='checkout_btns' >
                  <a class='btn btn--red' href='#' data-modal='login-modal' >Sign In</a>
                  <button class='btn btn--blue ml-40' type='button' data-modal='reg-modal'>Sign Up</button>
            </div>
            </div>
         </div>
      </div>
   

   ";
}else{
   $student_email = $_SESSION['studentLoginEmail'];
?>



<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Useful meta tags -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    
    <title>GuitarSchool | Checkout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<?php 
         $query = "SELECT course_id FROM courseorder WHERE student_email = '$student_email'";
         $answer = $con->query($query);
         while($row = $answer->fetch_assoc()){
            $course_id = $row['course_id'];
            if($course_id != $_POST['course_id'] ){
               // echo '';
               continue;
            }else{
               echo "<div class='courses courses--checkout'>
                        <div class = 'container'>
                           <div class = 'login_or_signup'>
                              <h1 class='checkout__title'>
                                 You have already subscribed to this course
                              </h1>
                              <a href='index.php' class='modal__close'>
                                 <img class='close-modal__img' src='./assets/img/close.svg' alt='Close'>
                              </a>
                           </div>
                        </div>
                     </div>";
               exit();
            }
         }
        

?> 
<body>
<div class="checkout">
   <div class="container--checkout">
      <div class="checkout__info">
         <h3 class="checkout__title">GuitarSchool Payment Page </h3>
         <form class="checkout__form" action="PayPalpayment.php" method="POST" id="PayPalForm">
            <div class="checkout__form--group">
               <input type="hidden" id="co_id" class="checkout__input"  name="co_id"  value="<?php if(isset($_SESSION['co_id'])){echo $_SESSION['co_id'];} ?>" readonly>
            </div>
            <div class="checkout__form--group">
               <label for="ORDER_ID" class="checkout__label">Order ID:</label>
               <input id="ORDER_ID" class="checkout__input" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
               value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
            </div>
            <div class="checkout__form--group">
               <label for="CUST_ID" class="checkout__label">Student Email:</label>
               <input id="CUST_ID" class="checkout__input" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($student_email)){echo $student_email; }?>" readonly>
            </div>
            <div class="checkout__form--group">
               <label for="TXN_AMOUNT" class="checkout__label">Price:</label>
               <input title="TXN_AMOUNT" class="checkout__input" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['id'])){echo $_POST['id']; }?> PLN" readonly>
            </div>
            <div class="checkout__center">
            
               <div id="paypal-button-container"></div>
               <a href="./courses.php" class="btn btn--red btn--center">Cancel</a>
            </div>
         </form>
      </div>
   </div>
</div>
  <!-- Include the PayPal JavaScript SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id=AS_dfYZSS1jd-Cb9k8a58WQLsEDsDr47s0qIeUzi2En-GOLllDa8dIXSnmrA5zvbImF-9YGu3NTOLoq5&currency=PLN"></script>

  <script>
      // Render the PayPal button into #paypal-button-container
      paypal.Buttons({

          // Set up the transaction
          createOrder: function(data, actions) {
              return actions.order.create({
                  purchase_units: [{
                      amount: {
                          value: '<?php if(isset($_POST['id'])){echo $_POST['id']; }?>'
                      }
                  }]
              });
          },
          // Finalize the transaction
          onApprove: function(data, actions) {
              return actions.order.capture().then(function(details) {
                  // Show a success message to the buyer
                  alert('Transaction completed by ' + details.payer.name.given_name + '!');
                  document.getElementById("PayPalForm").submit()
              });
          }
      }).render('#paypal-button-container');

  </script>


</body>
</html>
<?php } ?>
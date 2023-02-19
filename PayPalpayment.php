<?php
   include_once('configDb.php');
   include_once('includes/PayPalstatus.php');
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
     
      date_default_timezone_set('Europe/Warsaw');
      $date = date('Y-m-d H:i:s');
      if(isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])){
         $order_id = $_POST['ORDER_ID'];
         $student_email = $_SESSION['studentLoginEmail'];
         $course_id = $_SESSION['course_id'];
         $status = "Success";
         $respmsg = "Done";
         $price = $_POST['TXN_AMOUNT'];
         $order_date = $date;
         
         // $query1 = "SELECT * FROM courseorder";
         // $answer = $con->query($query1);
         // $row = $answer->fetch_assoc();

        
            $query = "INSERT INTO courseorder(order_id,student_email,course_id,status,respmsg,amount,order_date) VALUES('$order_id','$student_email','$course_id','$status','$respmsg','$price','$order_date')";
         
         
         if($con->query($query) == true){
            echo '
            <div class="checkout">
               <div class="container--checkout">
                  <div class="checkout__info">
                     <h3 class="checkout__title">Transaction Successful!</h3>
                     <div class = "success">
                        <i class="success__img fa-solid fa-circle-check"></i>
                        <a href="index.php" class="modal__close">
                           <img class="close-modal__img" src="./assets/img/close.svg" alt="Close">
                        </a>
                     </div>
                     <h3 class="checkout__title">Your Order ID : '.$order_id.'</h3>
                  </div>
               </div
            </div>
            ';
         }else{
            echo '
               <div>ERROR</div>
            ';
         }
      }
   }
?>
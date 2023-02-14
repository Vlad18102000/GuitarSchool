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
<body>


<div class="modal" id="login-modal">
   <div class="modal__content modal__content--login">
      <h1 class="modal__title">Student Login</h1>
      <form  class="form " id="studentLoginForm">
         <div class="form__group form__group--md">
            <input type="email" class="form__control" placeholder="Email" name="studentLoginEmail" id="studentLoginEmail">
            <span class="form__line"></span>
         </div>
         <div class="form__group form__group--md">
            <input type="password" class="form__control" placeholder="Password"  name="studentLoginPassword" id="studentLoginPassword" autocomplete="new-password" >
            <span class="form__line"></span>
         </div>
         <div class="form__footer form__footer--flex">
            <div class="form__group form__group--md">
               <button class="btn btn--blue btn--rounded btn--sm" type="button" id="stuLoginBtn" onclick="checkStudentLogin()">Login</button>
               <a class="btn btn--red btn--rounded btn--sm ml-10" type="submit" href='index.php'>Cancel</a>
            </div>
            <span id="logMsg"></span>
         </div>
         <span id="logMsgInvalid"></span>
      </form>
      <button type="button" class="modal__close">
         <img class="close-modal__img" src="./assets/img/close.svg" alt="Close">
      </button>
   </div>
</div>

<div class="modal" id="reg-modal">
   <div class="modal__content modal__content--login">
      <h1 class="modal__title">Student Registration</h1>
      <form id="studentRegisterForm" class="form ">
         <div class="form__group form__group--md">
            <div id="statusMsg1"></div>
            <input type="text" class="form__control" placeholder="Name" name="studentName" id="studentName" autocomplete="off"> 
            <span class="form__line"></span>
         </div>
         <div class="form__group form__group--md">
            <div id="statusMsg2"></div>
            <input type="email" class="form__control" placeholder="Email" name="studentEmail" id="studentEmail" autocomplete="off">
            <span class="form__line"></span>
         </div>
         <div class="form__group form__group--md">
            <div id="statusMsg3"></div>
            <input type="password" class="form__control" placeholder="Password" name="studentPassword" id="studentPassword" autocomplete="new-password">
            <span class="form__line"></span>
         </div>
         <div class="form__group form__group--md">
            <div id="statusMsg4"></div>
            <input type="password" class="form__control" placeholder="Confirm Password" name="studentPassword2" id="studentPassword2" autocomplete="new-password">
            <span class="form__line"></span>
         </div>
         <div class="form__footer ">
            <div class="form__group form__group--md">
               
               <button class="btn btn--blue btn--rounded btn--sm" type="button" id="SignUpBtn" onclick="addStudent()" >Sign Up</button>
               <a class="btn btn--red btn--rounded btn--sm ml-10" type="submit" href='index.php'>Cancel</a>
               
            </div>
            <span id="successMsg"></span>
         </div>

      </form>
      <button type="button" class="modal__close">
         <img class="close-modal__img" src="./assets/img/close.svg" alt="Close">
      </button>
   </div>
</div>



<script src="./assets/js/mobileNav.js" ></script>
<script src="./assets/js/modal.js" ></script>
<script src="./assets/js/textarea.js" ></script>
<script src="./assets/js/filter.js" ></script>
<script src="./assets/js/ajaxAdmin.js" ></script>
<script src="./assets/js/ajaxStudent.js" ></script>
</body>
</html>

<!-- <?php include('./feedback.php') ?> -->
<footer class="footer">
         <small class="footer__content">Copyright &copy; 2022 || Designed By Vladyslav Potapov ||  <a href="#login" class="footer__link" data-toggle="modal" data-modal="admin-modal">Admin Login</a></small>
   </footer>
</div> <!-- End Page div -->


<!-- MODAL STUDENT LOGIN -->
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
<!-- REGISTRATION -->
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

<!-- MODAL Admin LOGIN -->
<div class="modal" id="admin-modal">
   <div class="modal__content modal__content--login">
      <h1 class="modal__title">Admin Login</h1>
      <form  class="form" id="adminLoginForm">
         <div class="form__group form__group--md">
            <input type="email" class="form__control" placeholder="Email" name="adminEmail" id="adminEmail">
            <span class="form__line"></span>
         </div>
         <div class="form__group form__group--md">
            <input type="password" class="form__control" placeholder="Password"  name="adminPassword" id="adminPassword" autocomplete="new-password" >
            <span class="form__line"></span>
         </div>
         <div class="form__footer form__footer--flex">
            <div class="form__group form__group--md">
               <button class="btn btn--blue btn--rounded btn--sm" type="button" id="adminLoginBtn" onclick="adminLogin()">Login</button>
               <a class="btn btn--red btn--rounded btn--sm ml-10" type="submit" href='index.php'>Cancel</a>
            </div>
            <span id="logMsg1"></span>
         </div>
         <span id="logMsgInvalid1"></span>
      </form>
      <button type="button" class="modal__close">
         <img class="close-modal__img" src="./assets/img/close.svg" alt="Close">
      </button>
   </div>
</div>
<!-- CONTACT FORM ТРЕБА ДОРОБЛЯТИ -->
<div class="modal" id="contact-modal">
       <div class="modal__content modal__content--contact">
          <form  class="form " method="POST" enctype="multipart/form-data">
          <div class="form__group form__group--md">
                <input type="hidden" class="form__control" name='student_id' id = 'student_id' value = "<?php if(isset($student_id)) {echo $student_id;} ?>">
                <span class="form__line"></span>
             </div>
             <div class="form__group form__group--md">
                <input type="text" class="form__control" placeholder="Imię" name='student_name' value = "<?php if(isset($student_name)) {echo $student_name;} ?>">
                <span class="form__line"></span>
             </div>
             <div class="form__group form__group--md">
                <input type="email" class="form__control" placeholder="Email" name ='student_email' value = "<?php if(isset($student_email)) {echo $student_email;} ?>" >
                <span class="form__line"></span>
             </div>
    
             <div class="form__group form__group--md">
                <textarea class="form__control form__control--textarea" placeholder="Tekst wiadomosci" name="feedback_content" id="feedback_content" data-autoresize></textarea>
                <span class="form__line"></span>
             </div>
             <div class="form__footer">
                <div class="form__group form__group--md">
                   <button class="btn btn--blue btn--rounded btn--sm" type="submit" name='feedbackBtn1' id ='feedbackBtn1'>Wyślij wiadomość</button>
                </div>
                <ul class="form__footer-list">
                   <li>
                      <a href="mailto:potapov@gmail.com">email:potapov@gmail.com</a>
                   </li>
                   <li>
                      <a href="tel:799343433">Tel: 799-343-212</a>
                   </li>
                </ul>
             </div>
    
          </form>
          <button type="button" class="modal__close">
             <img class="close-modal__img" src="./assets/img/close.svg" alt="Close">
          </button>
       </div>
    </div>  


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

<script src="./assets/js/mobileNav.js" ></script>
<script src="./assets/js/modal.js" ></script>
<script src="./assets/js/textarea.js" ></script>
<script src="./assets/js/filter.js" ></script>
<script src="./assets/js/ajaxAdmin.js" ></script>
<script src="./assets/js/ajaxStudent.js" ></script>

</body>
</html>
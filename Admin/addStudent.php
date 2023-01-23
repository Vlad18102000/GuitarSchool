<?php
if(!isset($_SESSION)){
   session_start();
}
include_once("includes/header.php");
include_once("../configDb.php");

if(isset($_SESSION['admin_has_logged'])){
   $adminEmail = $_SESSION['adminEmail'];
}else{
   echo "<script>location.href='../index.php';</script>";
}

if(isset($_REQUEST['addStudenttBtn'])){

   if(($_REQUEST['student_name'] == "") || ($_REQUEST['student_email'] == "") || ($_REQUEST['student_password'] == "") 
   || ($_REQUEST['student_occupation'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
      // ($_REQUEST['course_price'] == "") ||
   } else{
      $student_name = $_REQUEST['student_name'];
      $student_email = $_REQUEST['student_email'];
      $student_password =  hash("sha512",$_REQUEST['student_password']);
     
      $student_occupation = $_REQUEST['student_occupation'];
  

      $query = "INSERT INTO students (student_name, student_email, student_password, student_occupation)
      VALUES ('$student_name', '$student_email', '$student_password', '$student_occupation')";

      if($con->query($query) == TRUE){
         $message = "<div class='modal__span-success'>*Student Added Succesfully!</div>";
      }else{
         $message = "<div class='form__danger'>*Error Adding Student!</div>";
      }

   }

}

?>
<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Add Student</div>
         <form action method="POST" enctype="multipart/form-data" class="form">
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_name" name="student_name" placeholder="Student Name"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_email" name="student_email" placeholder="Student Email"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_password" name="student_password" placeholder="Student Password"  autocomplete="off">
               <span class="form__line"></span>
            </div>
          
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_occupation" name="student_occupation" placeholder="Student Occupation"  autocomplete="off">
               <span class="form__line"></span>
            </div>
          
            <?php
            if(isset($message)){
               echo $message;
            }
            ?>

            <div class="form__center">
               <button type="submit" class="btn btn--blue form__button" id="addStudenttBtn" name="addStudenttBtn">Sumbit</button>
               <a href="students.php" class="btn btn--red">Close</a>
            </div>

         </form>
      </div>
      </div>
      
      
   </div>
</div>
<?php
include_once("includes/footer.php");
?>
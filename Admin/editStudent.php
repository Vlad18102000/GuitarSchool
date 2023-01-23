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


if(isset($_REQUEST['updateStudentBtn'])){
   if(($_REQUEST['student_id'] == "") || ($_REQUEST['student_name'] == "") || ($_REQUEST['student_email'] == "") ||  ($_REQUEST['student_occupation'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   } else{
      $student_id = $_REQUEST['student_id'];
      $student_name = $_REQUEST['student_name'];
      $student_email = $_REQUEST['student_email'];
      $student_password =  hash("sha512",$_REQUEST['student_password']);
      $student_occupation = $_REQUEST['student_occupation'];

      $query = "UPDATE students SET student_id = '$student_id' , student_name = '$student_name', student_email = '$student_email',
      student_password = '$student_password', student_occupation = '$student_occupation' WHERE student_id = '$student_id'";

      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Student Updated Succesfully!</div>";
      }else{
         $message = "<div class='modal__span-unsuccess'>*Student update failed!</div>";
      }
   }
}


?>

<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Update Student Details</div>
         <?php

         if(isset($_REQUEST['view'])){
            $query = "SELECT * FROM students WHERE student_id = {$_REQUEST['id']}";
            $answer = $con->query($query);
            $row = $answer->fetch_assoc();
         }

         ?>
         <form action method="POST" enctype="multipart/form-data" class="form">
            <div class="form__group form__group--md">
               <input  type="hidden" class="form__control" id="student_id" name="student_id" value="<?php if(isset($row['student_id'])){ echo $row['student_id'];  } ?>" autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_name" name="student_name" placeholder="Student Name"  value="<?php if(isset($row['student_name'])){echo $row['student_name'];}  ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_email" name="student_email" placeholder="Student Email" value="<?php if(isset($row['student_email'])){echo $row['student_email'];}  ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_password" name="student_password" placeholder="Student Password"  autocomplete="off">
               <span class="form__line"></span>
            </div>
          
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="student_occupation" name="student_occupation" placeholder="Student Occupation" value="<?php if(isset($row['student_occupation'])){echo $row['student_occupation'];}  ?>"  autocomplete="off">
               <span class="form__line"></span>
            </div>
          
            <?php
            if(isset($message)){
               echo $message;
            }
            ?>

            <div class="form__center">
               <button type="submit" class="btn btn--blue form__button" id="updateStudentBtn" name="updateStudentBtn">Update</button>
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

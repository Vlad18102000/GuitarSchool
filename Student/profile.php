<?php
if(!isset($_SESSION)){
   session_start();
}
include_once("includes/header.php");
include_once("../configDb.php");

if(isset($_SESSION['student_has_logged'])){
   $student_email = $_SESSION['studentLoginEmail'];

}else{
   echo "<script> location.href = '../index.php';</script>";
}

$query = "SELECT * FROM students WHERE student_email = '$student_email'";
$answer = $con->query($query);
if($answer->num_rows == 1){
   $row = $answer->fetch_assoc();
   $student_id = $row['student_id'];
   $student_name = $row['student_name'];
   $student_email = $row['student_email'];
   $student_password = $row['student_password'];
   $student_occupation = $row['student_occupation'];
   $student_img = $row['student_img'];

}
if(isset($_REQUEST['updateStudentDetails'])){
   if(($_REQUEST['student_id']== "") || ($_REQUEST['student_name']== "") || ($_REQUEST['student_email'])== ""){
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   }else{
      $student_id = $_REQUEST['student_id'];
      $student_name = $_REQUEST['student_name'];
      $student_email = $_REQUEST['student_email'];
      $student_occupation = $_REQUEST['student_occupation'];
      $query = "UPDATE students SET student_name = '$student_name', student_email = '$student_email', student_occupation = '$student_occupation' WHERE student_id='$student_id'";

      if($con->query($query)){
         
         $_SESSION['studentLoginEmail'] = $student_email;
         $message = "<div class='modal__span-success'>*Student Updated Succesfully!</div>";

        
      }else{
         $message = "<div class='modal__span-success'>*Student Updated Unuccesfully!</div>";
      }
   }
}

if(isset($_REQUEST['updateStudentPassword'])){
   if(($_REQUEST['student_password'] == "") || ($_REQUEST['student_password2']== "")){
      $message1 = "<div class='form__danger'>*Fill All Fields!</div>";
   }else{
      $student_password = hash("sha512",$_REQUEST['student_password']);
      $student_password2 = hash("sha512",$_REQUEST['student_password2']);
      
      if($student_password = $student_password2){
         $query = "UPDATE students SET student_password = '$student_password' WHERE  student_email='$student_email'";
         if($con->query($query)){
         
            $_SESSION['studentLoginEmail'] = $student_email;
            $message2 = "<div class='modal__span-success'>*Password Updated Succesfully!</div>";
            
           
         }else{
            $message2 = "<div class='modal__span-success'>*Password Updated Unuccesfully!</div>";
         }
      }
    
   }
}

if(isset($_REQUEST['updateStudentImg'])){
   if(($_FILES['upload_file'] == "")){
      $passmsg2 = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
}else{
   $student_image = $_FILES["upload_file"]["name"];
   $stu_image_temp = $_FILES["upload_file"]["tmp_name"];
   $img_folder = '../assets/img/studentPhoto/'.$student_image;
   move_uploaded_file($stu_image_temp,$img_folder);
   $query = "UPDATE students SET student_img = '$img_folder' WHERE student_email='$student_email'";
   if($con->query($query)){
         
      $_SESSION['studentLoginEmail'] = $student_email;
      $message3 = "<div class='modal__span-success'>*Photo Updated Succesfully!</div>";
      echo '<meta http-equiv="refresh" content="0;URL=?updated" />';
     
   }else{
      $message3 = "<div class='modal__span-success'>*Photo Updated Unuccesfully!</div>";
   }
}
}



?>
<div class="cabinet_pos">
   <div class="container--courses">
   <h1 class="page__title">
      Profile
   </h1>
  

   <form class="form" method="POST" enctype="multipart/form-data">
      <div class="cabinet">
         <div class="cabinet__form">
         <div class="form__group form__group--md">
               <input type="hidden" class="form__control" id='student_id' name='student_id' value="<?php if(isset($student_id)){echo $student_id; }?>">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" placeholder="Imię" id='student_name' name='student_name' value="<?php if(isset($student_name)){echo $student_name; }?>">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="email" class="form__control" placeholder="Email" id='student_email' name='student_email' value="<?php if(isset($student_email)){echo $student_email; }?>"">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" placeholder="Occupation" id='student_occupation' name='student_occupation' value="<?php if(isset($student_occupation)){echo $student_occupation; }?>">
               <span class="form__line"></span>
            </div>
            <?php
            if(isset($message)){
               echo $message;
            }
            ?>
            <button class="btn btn--blue btn--rounded btn--sm" type="submit" id='updateStudentDetails' name="updateStudentDetails" style="margin-bottom:40px;">Save</button>
            <div class="form__group form__group--md">
               <input type="password" class="form__control" placeholder="New Password" id='student_password' name = 'student_password'>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="password" class="form__control" placeholder="Confirm Password" id='student_password2' name = 'student_password2'>
               <span class="form__line"></span>
            </div>
         
         </div>
         <div class="cabinet__avatar">
            <img src="<?php echo $student_img ?>" alt="">
            <label class="cabinet__file">
            <input type="file" class="" hidden="hidden" id="upload_file" name='upload_file'>
               <div class="form__upload">
                  <label id="upload_btn" class="cabinet__file">Change Photo</label>
                  <span class="upload__span " id="upload_text" style="display:none;">Nie wybrano pliku</span>
               </div>
               <button class="btn btn--blue btn--rounded btn--sm btn--img" type="submit" id='updateStudentImg' name="updateStudentImg" >Save Photo</button>
               <?php
                  if(isset($message2)){
                     echo $message2;
                  }
               ?>
            </label>
         </div>
       
      </div>
      <button class="btn btn--blue btn--rounded btn--sm" type="submit" id='updateStudentPassword' name="updateStudentPassword">Change Password</button> 
      <?php
         if(isset($message1)){
            echo $message1;
         }
      ?>
   </form>
</div>

</div>


<?php
include_once("includes/footer.php");
?>
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


if(isset($_REQUEST['lessonUpdateBtn'])){
   if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_description'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   } else{
      $lesson_id = $_REQUEST['lesson_id'];
      $lesson_name = $_REQUEST['lesson_name'];
      $course_name = $_REQUEST['course_name'];
      $course_id = $_REQUEST['course_id'];
      $lesson_description = $_REQUEST['lesson_description'];
      $lesson_link = '../assets/video/' .$_FILES['upload_file']['name'];

      $query = "UPDATE lessons SET lesson_id = '$lesson_id' , lesson_name = '$lesson_name', lesson_description = '$lesson_description',course_id = '$course_id',
      course_name = '$course_name',lesson_link = '$lesson_link'
       WHERE lesson_id = '$lesson_id'";

      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Lesson Updated Succesfully!</div>";
      }else{
         $message = "<div class='modal__span-success'>*Lesson Update Failed!</div>";
      }
   }
}


?>

<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Edit Lesson</div>

         <?php

         if(isset($_REQUEST['view'])){
            $query = "SELECT * FROM lessons WHERE lesson_id = {$_REQUEST['id']}";
            $answer = $con->query($query);
            $row = $answer->fetch_assoc();
         }

         ?>
         <form action method="POST" enctype="multipart/form-data" class="form">
            <div class="form__group form__group--md">
               <input  type="hidden" class="form__control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id'];  } ?>" autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input  type="hidden" class="form__control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];  } ?>" autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input  type="hidden" class="form__control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){ echo $row['course_name'];  } ?>" autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input  type="hidden" class="form__control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id'];  } ?>" autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="lesson_name" name="lesson_name" placeholder="Lesson Name" value="<?php if(isset($row['lesson_name'])){ echo $row['lesson_name'];  } ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <textarea type="text" class="form__control form__control--textarea" id="lesson_description" name="lesson_description" placeholder="Lesson Description" data-autoresize><?php if(isset($row['lesson_description'])){echo $row['lesson_description'];}?></textarea>
               <span class="form__line"></span>
            </div>

            <div class="form__group form__group--md">
               <label class="form__label">Select Lesson Video</label>
               <input type="file" class="" hidden="hidden" id="upload_file" name='upload_file'>
               <div class="form__upload">
                  <label id="upload_btn" class="btn btn--sm btn--blue">Add Video</label>
                  <span class="upload__span" id="upload_text">Nie wybrano pliku</span>
               </div>

            </div>
            <?php
            if(isset($message)){
               echo $message;
            }
            ?>

            <div class="form__center">
               <button type="submit" class="btn btn--blue form__button" id="lessonUpdateBtn" name="lessonUpdateBtn">Update</button>
               <a href="lessons.php" class="btn btn--red">Close</a>
            </div>

         </form>
      </div>
      </div>
      
      
   </div>
</div>

<?php
include_once("includes/footer.php");
?>

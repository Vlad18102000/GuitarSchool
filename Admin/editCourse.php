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


if(isset($_REQUEST['courseUpdateBtn'])){
   if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_description'] == "") || ($_REQUEST['course_author'] == "") 
   || ($_REQUEST['course_duration'] == "") ||  ($_REQUEST['course_original_price'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   } else{
      $course_id = $_REQUEST['course_id'];
      $course_name = $_REQUEST['course_name'];
      $course_description = $_REQUEST['course_description'];
      $course_author = $_REQUEST['course_author'];
      $course_duration = $_REQUEST['course_duration'];
      $course_category = $_REQUEST['course_category'];
      $course_new_price = $_REQUEST['course_new_price'];
      $course_original_price = $_REQUEST['course_original_price'];
      $course_images = '../assets/img/courseImg/'.$_FILES['course_img']['name'];

      $query = "UPDATE courses SET course_id = '$course_id' , course_name = '$course_name', course_description = '$course_description',
      course_author = '$course_author', course_duration = '$course_duration', course_category = '$course_category', course_price ='$course_new_price',
      course_original_price = '$course_original_price', course_img = '$course_images' WHERE course_id = '$course_id'";

      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Course Updated Succesfully!</div>";
      }else{
         $message = "<div class='modal__span-success'>*Course update failed!</div>";
      }
   }
}


?>

<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Edit Course</div>

         <?php

         if(isset($_REQUEST['view'])){
            $query = "SELECT * FROM courses WHERE course_id = {$_REQUEST['id']}";
            $answer = $con->query($query);
            $row = $answer->fetch_assoc();
         }

         ?>
         <form action method="POST" enctype="multipart/form-data" class="form">
         <div class="form__group form__group--md">
               <input  type="hidden" class="form__control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];  } ?>" autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_name" name="course_name" placeholder="Course Name" value="<?php if(isset($row['course_name'])){ echo $row['course_name'];  } ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <textarea type="text" class="form__control form__control--textarea" id="course_description" name="course_description" placeholder="Course Description" data-autoresize><?php if(isset($row['course_description'])){echo $row['course_description'];}?></textarea>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_author" name="course_author" placeholder="Course Author"  value="<?php if(isset($row['course_author'])){ echo $row['course_author'];  } ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_duration" name="course_duration" placeholder="Course Duration" value="<?php if(isset($row['course_duration'])){ echo $row['course_duration'];  } ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
          
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_original_price" name="course_original_price" placeholder="Course Price" value="<?php if(isset($row['course_original_price'])){ echo $row['course_original_price'];  } ?>" autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_new_price" name="course_new_price" placeholder="New Course Price" value="<?php if(isset($row['course_price'])){ echo $row['course_price'];  } ?>"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <label class="form__label" for="course_category">Course Category</label>
               <select type="text" class="form__control" id="course_category" name="course_category" >
               <?php
                     $query = "SELECT * FROM categories";
                     $answer = $con->query($query);
                     if($answer->num_rows > 0){ 
                        while($row = $answer->fetch_assoc()){
                        $category_id = $row['id'];
                        echo'
                        <option class="form__select" value="'.$row['categories_name'].'">'.$row['categories_name'].'</option>
                        ';
         
                        }
                     }
            ?>
               </select>
               <span class="form__line"></span>
            </div>
          
         
            <div class="form__group form__group--md">
               <label class="form__label">Select Course Image</label>
               <input type="file" class="" hidden="hidden" id="course_img" name='course_img'>
               <div class="form__upload">
                  <label id="upload_btn" class="btn btn--sm btn--blue">Add Image</label>
                  <span class="upload__span" id="upload_text">Nie wybrano pliku</span>
               </div>

            </div>
            <?php
            if(isset($message)){
               echo $message;
            }
            ?>

            <div class="form__center">
               <button type="submit" class="btn btn--blue form__button" id="courseUpdateBtn" name="courseUpdateBtn">Update</button>
               <a href="courses.php" class="btn btn--red">Close</a>
            </div>

         </form>
      </div>
      </div>
      
      
   </div>
</div>

<?php
include_once("includes/footer.php");
?>

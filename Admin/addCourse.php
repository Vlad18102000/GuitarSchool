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

function addCourse($con) {
   $course_name = $_REQUEST['course_name'];
   $course_description = $_REQUEST['course_description'];
   $course_author = $_REQUEST['course_author'];
   $course_duration = $_REQUEST['course_duration'];
   $course_category = $_REQUEST['course_category'];
   $course_new_price = $_REQUEST['course_new_price'];
   $course_original_price = $_REQUEST['course_original_price'];
   $course_img = $_FILES['upload_file']['name'];
   $course_img_temp = $_FILES['upload_file']['tmp_name'];
   $img_folder = '../assets/img/courseImg/'.$course_img;
   move_uploaded_file($course_img_temp, $img_folder);

   $query = "INSERT INTO courses (course_name, course_description, course_author, course_duration, course_img,course_price,course_original_price,course_category)
   VALUES ('$course_name', '$course_description', '$course_author', '$course_duration','$img_folder','$course_new_price','$course_original_price','$course_category')";

   if($con->query($query) == TRUE){
       return "<div class='modal__span-success'>*Course Added Successfully!</div>";
   }else{
       return "<div class='form__danger'>*Error Adding Course!</div>";
   }
}

if(isset($_REQUEST['courseSubmitBtn'])){

   if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_description'] == "") || ($_REQUEST['course_author'] == "") 
   || ($_REQUEST['course_duration'] == "") ||  ($_REQUEST['course_original_price'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   } else{
      $message = addCourse($con);
   }

}

?>
<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Add Course</div>
         <form action method="POST" enctype="multipart/form-data" class="form">
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_name" name="course_name" placeholder="Course Name"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <textarea type="text" class="form__control form__control--textarea" id="course_description" name="course_description" placeholder="Course Description"  data-autoresize></textarea>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_author" name="course_author" placeholder="Course Author"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_duration" name="course_duration" placeholder="Course Duration"  autocomplete="off">
               <span class="form__line"></span>
            </div>
          
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_original_price" name="course_original_price" placeholder="Course Price"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_new_price" name="course_new_price" placeholder="New Course Price"  autocomplete="off">
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
               <input type="file" class="" hidden="hidden" id="upload_file" name='upload_file'>
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
               <button type="submit" class="btn btn--blue form__button" id="courseSubmitBtn" name="courseSubmitBtn">Sumbit</button>
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
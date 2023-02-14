

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

if(isset($_REQUEST['lessonSubmitBtn'])){

   if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_description'] == "") || ($_REQUEST['course_name'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
      // ($_REQUEST['course_price'] == "") ||
   } else{
      $course_id = $_REQUEST['course_id'];
      $course_name = $_REQUEST['course_name'];
      $lesson_name = $_REQUEST['lesson_name'];
      $lesson_description = $_REQUEST['lesson_description'];
      $lesson_link = $_FILES['upload_file']['name'];
      $lesson_link_temp = $_FILES['upload_file']['tmp_name'];
      $link_folder = '../assets/video/'.$lesson_link;
      move_uploaded_file($lesson_link_temp, $link_folder);

      function getVideoDuration($filePath){
         $ffprobePath = realpath("ffmpeg/windows/ffprobe.exe");
         return (int)shell_exec("$ffprobePath -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $filePath");
         
      }
      $lesson_duration = getVideoDuration($link_folder);

      $hours = floor($lesson_duration / 3600);
      $mins = floor(($lesson_duration - ($hours*3600)) / 60);
      $secs = floor($lesson_duration % 60);
      
      $hours = ($hours < 1) ? "" : $hours . ":";
      $mins = ($mins < 10) ? "0" . $mins . ":" : $mins . ":";
      $secs = ($secs < 10) ? "0" . $secs : $secs;

      $lesson_duration = $hours.$mins.$secs;

      $query = "INSERT INTO lessons (lesson_name, lesson_description, lesson_link, course_id, course_name,lesson_duration)
      VALUES ('$lesson_name', '$lesson_description', '$link_folder','$course_id','$course_name','$lesson_duration')";

      if($con->query($query) == TRUE){
         $message = "<div class='modal__span-success'>*Lesson Added Succesfully!</div>";
      }else{
         $message = "<div class='form__danger'>*Error Adding Lesson!</div>";
      }

   }

}

?>
<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Add Lesson</div>
         <form action method="POST" enctype="multipart/form-data" class="form">
         <div class="form__group form__group--md">
               <input type="hidden" class="form__control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="course_name" name="course_name" placeholder="Course Name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>"  autocomplete="off" readonly>
               <span class="form__line"></span>
            </div>
            
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="lesson_name" name="lesson_name" placeholder="Lesson Name"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <textarea type="text" class="form__control form__control--textarea" id="lesson_description" name="lesson_description" placeholder="Lesson Description"  data-autoresize></textarea>
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
               <button type="submit" class="btn btn--blue form__button" id="lessonSubmitBtn" name="lessonSubmitBtn">Sumbit</button>
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
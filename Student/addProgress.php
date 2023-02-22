<?php
if(!isset($_SESSION)){
   session_start();
}
include_once('../configDb.php');

if(isset($_SESSION['student_has_logged'])){
   $student_email = $_SESSION['studentLoginEmail'];
}else{
   echo '<script> location.href="../index.php";</script>';
}

if(isset($_POST['lessonStatus']) && isset($_POST['lessonName']) && isset($_POST['course_id'])){
   
   
   $lesson_name = $_POST['lessonName'];
   $course_id = $_POST['course_id'];
   $status = "Finished";
   $query = "SELECT lesson_name FROM progress WHERE student_email = '$student_email' AND lesson_name = '$lesson_name' AND course_id = '$course_id'";

   $answer = $con->query($query);
   $row = $answer->num_rows;

   if($row == 0){
      $sql = "INSERT INTO progress(student_email,lesson_name,course_id,status) VALUES ('$student_email','$lesson_name','$course_id','$status')";

      if($con->query($sql) == true){
         echo json_encode("OK");
      }else{
         echo json_encode("Failed");
      }
   }else{
      echo json_encode("Reviewed");
   }

}
?>

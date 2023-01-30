<?php 
if(!isset($_SESSION)){
   session_start();
}
include_once('./includes/header.php');
include_once('../configDb.php');

if(isset($_SESSION['student_has_logged'])){
   $studentLoginEmail = $_SESSION['studentLoginEmail'];
}else{
   $studentLoginEmail = "";
}

$query = "SELECT * FROM students WHERE student_email = '$studentLoginEmail'";
$answer = $con->query($query);
if($answer->num_rows == 1){
   $row = $answer ->fetch_assoc();
   $student_id = $row['student_id'];
   $student_name = $row['student_name'];
   $student_email = $row['student_email'];
}

if(isset($_REQUEST['feedbackBtn']))
   if(($_REQUEST['feedback_content'] == "")){
      $message = "<div class='form__danger'>*Fill All Fields!</div>";

   }else{
      $feedback_content = $_REQUEST['feedback_content'];
      $query = "INSERT INTO feedback (feedback_content,student_name,student_id,student_email) VALUES ('$feedback_content', '$student_name','$student_id','$student_email')";
      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Student Updated Succesfully!</div>";
         
      }else{
         $message = "<div class='modal__span-success'>*Student Updated Unuccesfully!</div>";
      }
   }
?>

<?php
include_once('./includes/footer.php')
?>
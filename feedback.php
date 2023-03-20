<?php 
if(!isset($_SESSION)){
   session_start();
}
include_once('./includes/header.php');
include_once('./configDb.php');
include_once('./includes/footer.php');

if(isset($_SESSION['student_has_logged'])){
   $studentLoginEmail = $_SESSION['studentLoginEmail'];
}else{
   $studentLoginEmail = "";
}


function getStudentData($con, $studentLoginEmail){
   $query = "SELECT * FROM students WHERE student_email = '$studentLoginEmail'";
   $answer = $con->query($query);
   if($answer->num_rows == 1){
      $row = $answer ->fetch_assoc();
      $student_id = $row['student_id'];
      $student_name = $row['student_name'];
      $student_email = $row['student_email'];
   }else{
      $student_id = $_REQUEST['student_id'];
      $student_name = $_REQUEST['student_name'];
      $student_email = $_REQUEST['student_email'];
   }
   
   return array($student_id, $student_name, $student_email);
}

function addFeedback($con, $student_id, $student_name, $student_email, $feedback_content){
   if($feedback_content == ""){
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   }else{
      $query = "INSERT INTO feedback (feedback_content,student_name,student_id,student_email) VALUES ('$feedback_content', '$student_name','$student_id','$student_email')";
      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Succesfully!</div>";
      }else{
         $message = "<div class='modal__span-success'>*Unuccesfully!</div>";
      }
   }
   
   return $message;
}

list($student_id, $student_name, $student_email) = getStudentData($con, $studentLoginEmail);

if(isset($_REQUEST['feedbackBtn1'])){
   $message = addFeedback($con, $student_id, $student_name, $student_email, $_REQUEST['feedback_content']);
}

?>


<?php
if(!isset($_SESSION)){
   session_start();
}
include_once('../configDb.php');

if(isset($_POST['checkEmail']) && isset($_POST['studentEmail'])){
   $studentEmail = $_POST['studentEmail'];
   $query = "SELECT student_email FROM students WHERE student_email ='".$studentEmail."' ";
   $answer = $con->query($query);
   $row = $answer->num_rows;
   echo json_encode($row);
}

if(isset($_POST['studentSignUp']) && isset($_POST['studentName']) && isset($_POST['studentEmail']) && isset($_POST['studentPassword'])){
   
   $studentName = $_POST['studentName'];
   $studentEmail = $_POST['studentEmail'];
   $studentPassword = hash("sha512",$_POST['studentPassword']);
   $studentPassword2 = hash("sha512",$_POST['studentPassword2']);

   if($studentPassword == $studentPassword2){
      $query = "INSERT INTO students(student_name,student_email,student_password) VALUES ('$studentName','$studentEmail','$studentPassword')";
   }
   
   
   if($con->query($query) == true){
      echo json_encode("OK");
   }else{
      echo json_encode("Failed");
   }
}

if(!isset($_SESSION['student_has_logged'])){
   if(isset($_POST["checkStudentEmail"]) && isset($_POST["studentLoginEmail"]) && isset($_POST["studentLoginPassword"])){
      $studentLoginEmail = $_POST["studentLoginEmail"];
      $studentLoginPassword = hash("sha512",$_POST['studentLoginPassword']);
   
   
      $query = "SELECT student_email, student_password FROM students WHERE student_email = '".$studentLoginEmail."' AND student_password = '".$studentLoginPassword."'";
      $answer = $con->query($query);
   
      $row = $answer->num_rows;
   
      if($row === 1){
         $_SESSION['student_has_logged'] = true;
         $_SESSION['studentLoginEmail'] = $studentLoginEmail;
         echo json_encode($row);
      }else if($row === 0){
         echo json_encode($row);
      }
   
   }
}

?>



<?php
if(!isset($_SESSION)){
   session_start();
}
include_once('../configDb.php');


if(!isset($_SESSION['admin_has_logged'])){
   if(isset($_POST["checkAdminEmail"]) && isset($_POST["adminEmail"]) && isset($_POST["adminPassword"])){
      $adminEmail = $_POST["adminEmail"];
      $adminPassword = hash("sha512",$_POST['adminPassword']);
      
      // hash("sha512",$_POST['adminPassword']);
   
      $query = "SELECT admin_email, admin_password FROM admins WHERE admin_email = '".$adminEmail."' AND admin_password = '".$adminPassword."'";
      $answer = $con->query($query);
   
      $row = $answer->num_rows;
   
      if($row === 1){
         $_SESSION['admin_has_logged'] = true;
         $_SESSION['adminEmail'] = $adminEmail;
         echo json_encode($row);
      }else if($row === 0){
         echo json_encode($row);
      }
   
   }
}
?>
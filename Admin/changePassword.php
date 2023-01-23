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
 $adminEmail = $_SESSION['adminEmail'];
 if(isset($_REQUEST['changePasswordBtn'])){
   if(($_REQUEST['admin_password'] == "")){
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
      
   }else{
   $query = "SELECT * FROM admins WHERE admin_email = '$adminEmail'";
   $answer = $con->query($query);
   
   if($answer->num_rows == 1){
      $admin_password = hash("sha512",$_REQUEST['admin_password']);
      $query = "UPDATE admins SET admin_password = '$admin_password' WHERE admin_email = '$adminEmail'";
      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Password Updated Succesfully!</div>";
         
      }else{
         $message = "<div class='modal__span-unsuccess'>*Password Update Failed!</div>";
      }
   }
 }
}

?>

<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Update Password</div>

         <form class="form">
            <div class="form__group form__group--md">
               <input type="email" class="form__control" id="admin_email" name="admin_email" value="<?php  echo $adminEmail ?>" readonly>
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="admin_password" name="admin_password" placeholder="Password"  autocomplete="off">
               <span class="form__line"></span>
            </div>

            <?php
            if(isset($message)){
               echo $message;
            }
            ?>
            <div class="form__center">
               <button type="submit" class="btn btn--blue form__button" id="changePasswordBtn" name="changePasswordBtn">Update</button>
               <a href="dashboard.php" class="btn btn--red">Close</a>
            </div>

         </form>
         </div>
      </div>
      
   </div>
</div>


<?php
include_once("includes/footer.php");
?>
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


if(isset($_REQUEST['addPostBtn'])){

   if(($_REQUEST['post_title'] == "") || ($_REQUEST['post_content'] == "")) {
      $message = "<div class='form__danger'>*Fill All Fields!</div>";
   } else{
      $post_title = $_REQUEST['post_title'];
      $post_content = $_REQUEST['post_content'];
      $post_img = $_FILES['upload_file']['name'];
      $post_img_temp = $_FILES['upload_file']['tmp_name'];
      $img_folder = '../assets/img/'.$post_img;
      move_uploaded_file($post_img_temp, $img_folder);

      $query = "INSERT INTO posts (post_title, post_content, post_img) VALUES ('$post_title', '$post_content','$img_folder')";

      if($con->query($query) == true){
         $message = "<div class='modal__span-success'>*Course Added Succesfully!</div>";
      }else{
         $message = "<div class='form__danger'>*Error Adding Course!</div>";
      }

   }

}


?>
<div class="admin__area">
   <div class="container--courses">
      <div class="course__details">
      <div class="add__courseform">
         <div class="dashboard__table-title">Add Post</div>
         <form action method="POST" enctype="multipart/form-data" class="form">
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="post_title" name="post_title" placeholder="Post title"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__group form__group--md">
               <textarea type="text" class="form__control form__control--textarea" id="post_content" name="post_content" placeholder="Post Content"  data-autoresize></textarea>
               <span class="form__line"></span>
            </div>

            <div class="form__group form__group--md">
               <label class="form__label">Select Post Image</label>
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
               <button type="submit" class="btn btn--blue form__button" id="addPostBtn" name="addPostBtn">Sumbit</button>
               <a href="posts.php" class="btn btn--red">Close</a>
            </div>

         </form>
      </div>
      </div>
      
      
   </div>
</div>

<?php
include_once("includes/footer.php");
?>
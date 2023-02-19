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
?>
<div class="admin__area">
      <div class="container--courses">
         <div class="dashboard__table">
            <div class="dashboard__table-title">List of Posts</div>
            <?php 
               $query = "SELECT * FROM posts ";
               $answer = $con->query($query);
               if($answer->num_rows > 0){

               
            ?>
            <table class="table">
                  <thead>
                     <tr class="table__header">
                        <th scope="col" class="table__info">Post ID</th>
                        <th scope="col" class="table__info">Post Title</th>
                        <th scope="col" class="table__info">Post Content</th>
                        <th scope="col" class="table__info">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $answer->fetch_assoc()){

                  echo '<tr class="table__content">
                           <th scope="col" class="table__info">'.$row['id'].'</th>
                           <td  class="table__info">'.$row['post_title'].'</td>
                           <td  class="table__info">'.$row['post_content'].'</td>
                           <td  class="table__info">
                     
 
                              <form action="" method="POST" class="table__inline ml-10">
                                 <input type="hidden" name ="id" value='.$row["id"].'>
                                 <button class="btn btn--sm btn--red" name="delete" value="Delete" type="submit">
                                 <i class="fa-solid fa-trash"></i>
                                 </button>
                              </form>
                           </td>
                        </tr>';
                     } ?>
                  </tbody>
               </table>
               <?php }else{
                  echo "No Result";

               } 
               if(isset($_REQUEST['delete'])){
                  $query = "DELETE FROM posts WHERE id ={$_REQUEST['id']}";
                  if($con->query($query) == true){
                     echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                  }else{
                     echo 'deletion error';
                  }
               }
               
               ?>
               <div class="add__course">
                  <a href="addPost.php">
                     <button class="btn btn--sm btn--blue ">Add New Post</button>
                  </a>
                 
               </div>
      </div>
   </div>

<?php
include_once("includes/footer.php");
?>
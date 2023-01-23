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
            <div class="dashboard__table-title">List of Students</div>
            <?php 
               $query = "SELECT * FROM students ";
               $answer = $con->query($query);
               if($answer->num_rows > 0){

               
            ?>
            <table class="table">
                  <thead>
                     <tr class="table__header">
                        <th scope="col" class="table__info">Student ID</th>
                        <th scope="col" class="table__info">Name</th>
                        <th scope="col" class="table__info">Email</th>
                        <th scope="col" class="table__info">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $answer->fetch_assoc()){

                  echo '<tr class="table__content">
                           <th scope="col" class="table__info">'.$row['student_id'].'</th>
                           <td  class="table__info">'.$row['student_name'].'</td>
                           <td  class="table__info">'.$row['student_email'].'</td>
                           <td  class="table__info">
                              <form action="editStudent.php" method="POST" class="table__inline">
                                 <input type="hidden" name ="id" value='.$row["student_id"].'>
                                 <button class="btn btn--sm btn--blue" name="view" value="View" type="submit">
                                 <i class="fa-solid fa-pen"></i>
                                 </button>
                              </form>
 
                              <form action="" method="POST" class="table__inline ml-10">
                                 <input type="hidden" name ="id" value='.$row["student_id"].'>
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
                  $query = "DELETE FROM students WHERE student_id ={$_REQUEST['id']}";
                  if($con->query($query) == true){
                     echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                  }else{
                     echo 'deletion error';
                  }
               }
               
               ?>
               <div class="add__course">
                  <a href="addStudent.php">
                     <button class="btn btn--sm btn--blue ">Add Student</button>
                  </a>
                 
               </div>
      </div>
   </div>
   
<?php
include_once("includes/footer.php")
?>
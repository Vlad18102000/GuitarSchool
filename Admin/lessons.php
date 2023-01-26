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
      <div class="course__details">
      <div class="add__courseform">
         <div class="display__block">
         <div class="dashboard__table-title">Search Course Lessons</div>
         <form action method="POST" enctype="multipart/form-data" class="form">
            <div class="form__group form__group--md">
               <input type="text" class="form__control" id="checkId" name="checkId" placeholder="Enter Course ID"  autocomplete="off">
               <span class="form__line"></span>
            </div>
            <div class="form__center form__center--mt0">
               <button type="submit" class="btn btn--blue form__button" id="addStudenttBtn" name="addStudenttBtn">Search</button>
            </div>

         </form>
         </div>
  

         <?php
         
         $query = "SELECT course_id,course_name FROM courses";
         $answer = $con->query($query);
         while($row = $answer->fetch_assoc()){
            if(isset($_REQUEST['checkId']) && ($_REQUEST['checkId'] == $row['course_id'])){
               $query = "SELECT * FROM courses WHERE course_id = {$_REQUEST['checkId']}";

               $answer = $con->query($query);
               $row = $answer->fetch_assoc();
               if(($row['course_id'] == $_REQUEST['checkId'])){
                  $_SESSION['course_id'] = $row['course_id'];
                  $_SESSION['course_name'] = $row['course_name'];
                  ?>
                  <div class="dashboard__table-title mt">Course ID: <?php if(isset($row['course_id'])) { echo $row['course_id'];}?> <br> Course Name : <?php if(isset($row['course_name'])) { echo $row['course_name'];}?></div>
               <?php 

                  $query = "SELECT * FROM lessons WHERE course_id = {$_REQUEST['checkId']}";
                  $answer = $con->query($query);
                  
                  echo '
                  <table class="table">
                  <thead>
                     <tr class="table__header">
                        <th scope="col" class="table__info">Lesson ID</th>
                        <th scope="col" class="table__info">Lesson Name</th>
                        <th scope="col" class="table__info">Lesson Link</th>
                        <th scope="col" class="table__info">Action</th>
                     </tr>
                  </thead>
                  <tbody>';
                  while($row = $answer->fetch_assoc()){
                    

                     echo '
                     <tr class="table__content">
                           <th scope="col" class="table__info">'.$row['lesson_id'].'</th>
                           <td  class="table__info">'.$row['lesson_name'].'</td>
                           <td  class="table__info">'.$row['lesson_link'].'</td>
                           <td  class="table__info">
                              <form action="editLesson.php" method="POST" class="table__inline">
                                 <input type="hidden" name ="id" value='.$row["lesson_id"].'>
                                 <button class="btn btn--sm btn--blue" name="view" value="View" type="submit">
                                 <i class="fa-solid fa-pen"></i>
                                 </button>
                              </form>
 
                              <form  method="POST" class="table__inline ml-10">
                                 <input type="hidden" name ="id" value='.$row["lesson_id"].'>
                                 <button class="btn btn--sm btn--red" name="delete" value="Delete" type="submit">
                                 <i class="fa-solid fa-trash"></i>
                                 </button>
                              </form>
                           </td>
                        </tr>';
                  }
                  echo '
                  </tbody>
                  </table>
                  ';
               }else{
                  echo "<div class = 'dashboard__table-title mt'>No Result</div>";
               }
            }
               
               if(isset($_REQUEST['delete'])){
                  $query = "DELETE FROM lessons WHERE lesson_id ={$_REQUEST['id']}";
                  if($con->query($query) === true){
                     echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                  }else{
                     echo 'deletion error';
                  }
               }
            }
         
         
         ?>

       
      </div>
      </div>
      <?php 
            if(isset($_SESSION['course_id'])){
              echo '<div class="add__course">
                        <a href="addLesson.php">
                           <button class="btn btn--sm btn--blue ">Add New Lesson</button>
                        </a>
                     </div>' ;
            }
         ?>
    
   </div>
   
</div>


<?php
include_once("includes/footer.php")
?>
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
   $query = "SELECT * FROM courses";
   $answer = $con->query($query);
   $course = $answer->num_rows;

   $query = "SELECT * FROM students";
   $answer = $con->query($query);
   $students = $answer->num_rows;

   $query = "SELECT * FROM courseorder";
   $answer = $con->query($query);
   $sold = $answer->num_rows;


?>
      <div class="admin__area">
         <div class="container--courses">
            <div class="dashboard__info">
               <div class="dashboard-info__items">
                  <div class="dashboard-info__col">
                     <div class="dashboard-info__item">
                        <div class="dashboard-info__title">Courses</div>
                        <div class="dashboard-info__content">
                           <h4 class="dashboard-info__num">
                              <?php echo $course ?>
                           </h4>
                           <a href="courses.php" class="dashboard-info__link">View</a>
                        </div>
                     </div>
                  </div>

                  <div class="dashboard-info__col">
                     <div class="dashboard-info__item dashboard-info__item--stud">
                        <div class="dashboard-info__title">Students</div>
                        <div class="dashboard-info__content">
                           <h4 class="dashboard-info__num"><?php echo $students ?></h4>
                           <a href="students.php" class="dashboard-info__link">View</a>
                        </div>
                     </div>
                  </div>

                  <div class="dashboard-info__col">
                     <div class="dashboard-info__item dashboard-info__item--sold">
                        <div class="dashboard-info__title">Sold</div>
                        <div class="dashboard-info__content">
                           <h4 class="dashboard-info__num"><?php echo $sold ?></h4>
                           <a href="#" class="dashboard-info__link">View</a>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>

            <div class="dashboard__table">
               <div class="dashboard__table-title">Course Ordered</div>

               <?php

               $query = "SELECT * FROM courseorder";
               $answer = $con->query($query);
               if($answer->num_rows > 0){
                  echo '
                  <table class="table">
                  <thead>
                     <tr class="table__header">
                        <th scope="col" class="table__info">Order ID</th>
                        <th scope="col" class="table__info">Course ID</th>
                        <th scope="col" class="table__info">Student Email</th>
                        <th scope="col" class="table__info">Order Date</th>
                        <th scope="col" class="table__info">Amount</th>
                        <th scope="col" class="table__info">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  
                  ';
                  while ($row = $answer->fetch_assoc()){
                     echo '<tr class="table__content">';
                     echo '<th scope="col" class="table__info">'.$row["order_id"].'</th>';
                     echo '<td  class="table__info">'.$row["course_id"].'</td>';
                     echo '<td  class="table__info">'.$row["student_email"].'</td>';
                     echo '<td  class="table__info">'.$row["order_date"].'</td>';
                     echo ' <td  class="table__info">'.$row["amount"].'</td>';
                     echo ' <td  class="table__info">
                           <form action="" method="POST" class="table__inline ml-10">
                              <input type="hidden" name ="id" value='.$row["co_id"].'>
                              <button class="btn btn--sm btn--red" name="delete" value="Delete" type="submit">
                              <i class="fa-solid fa-trash"></i>
                              </button>
                           </form>
                           </td>';
                     echo ' </tr>';
                  

                  }
               }
               if(isset($_REQUEST['delete'])){
                  $query = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
                  if($con->query($query) === true){
                     echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                  }else{
                     echo 'Delete error';
                  }
               }

               ?>
                  
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      
<?php
include_once("includes/footer.php");
?>
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
   <div class="dashboard__table-title">Students Results</div>

   <?php 
      $query = "SELECT * FROM students";
      $answer = $con->query($query);
      
      if($answer->num_rows > 0){    
   ?>

   <table class="table">
      <thead>
         <tr class="table__header">
         <th scope="col" class="table__info">Student ID</th>
         <th scope="col" class="table__info">Name</th>
         <th scope="col" class="table__info">Course Name</th>
         <th scope="col" class="table__info">Progress</th>
         </tr>
      </thead>
      <tbody>

         <?php while($row = $answer->fetch_assoc()){
         $student_email = $row['student_email'];
         $student_name = $row['student_name'];
         $student_id = $row['student_id'];

         $sql_courses = "SELECT DISTINCT lessons.course_id, courses.course_name 
                           FROM lessons 
                           INNER JOIN progress ON progress.lesson_name = lessons.lesson_name
                           INNER JOIN courses ON courses.course_id = lessons.course_id 
                           WHERE progress.student_email = '$student_email'";
         $result_courses = $con->query($sql_courses);

         while($row_course = $result_courses->fetch_assoc()){
            $course_id = $row_course['course_id'];
            $course_name = $row_course['course_name'];

            $sql_progress = "SELECT COUNT(*) AS num_completed_lessons 
                              FROM progress 
                              WHERE student_email = '$student_email' 
                              AND course_id = '$course_id' 
                              AND status = 'Finished'";
            $result_progress = $con->query($sql_progress);
            $row_progress = $result_progress->fetch_assoc();
            $num_completed_lessons = $row_progress['num_completed_lessons'];

            $sql_total_lessons = "SELECT COUNT(*) AS num_lessons 
                                 FROM lessons 
                                 WHERE course_id = '$course_id'";
            $result_total_lessons = $con->query($sql_total_lessons);
            $row_total_lessons = $result_total_lessons->fetch_assoc();
            $num_lessons = $row_total_lessons['num_lessons'];

            if($num_lessons > 0){
               $progress = round(($num_completed_lessons / $num_lessons) * 100);
            }else{
               $progress = 0;
            }

            echo '<tr class="table__content">
                  <th scope="col" class="table__info">'.$student_id.'</th>
                  <td  class="table__info">'.$student_name.'</td>
                  <td  class="table__info">'.$course_name.'</td>
                  <td  class="table__info">
                  <div class="progress__container">
                  <progress class="course__progress course__progress--admin" id="progress" max="100" value="'.$progress.'"> % </progress>
                  <span class ="progress__span progress__span--admin">'.$progress.'% </span>
                  </div>
               
                  </td>
               </tr>';
            }
         } ?>
         </tbody>
</table>

<?php 
   }else{
   echo "<p>No results found.</p>";
   }
?>

</div>
</div>
</div>
<?php include_once("includes/footer.php"); ?>
<?php 
if(!isset($_SESSION)){
   session_start();
}

include_once('../configDb.php');
include_once('./includes/header.php');

if(isset($_SESSION['student_has_logged'])){
   $student_email = $_SESSION['studentLoginEmail'];
}else{
   echo '<script> location.href="../index.php";</script>';
}

?>
<div class="main">
<div class="container container--courses">
   <?php 
      if(isset($student_email)){
         $query = "SELECT orders.order_id, course.course_id, course.course_name, course.course_duration, course.course_description,
         course.course_author, course.course_img, course.course_category, course.course_data FROM courseorder AS orders JOIN courses AS course ON course.course_id = orders.course_id
         WHERE orders.student_email = '$student_email'";
         $answer = $con->query($query);
         
         if($answer->num_rows > 0){
            while($row = $answer->fetch_assoc()){
               $course_date_new = date('d.m.Y', strtotime($row['course_data']));
               
               echo '
               <article class="course__details">
               <div class="course__header">
                  <div class="course__details-title">
                     '.$row['course_name'].'
                  </div>
                  <ul class="course__data">
                        <li class="course-data__item">
                           <time datetime="2022-11-21"> '.$course_date_new.'</time>
                        </li>
                        <li class="course-data__item">
                           <a href="#">Category : '.$row['course_category'].'</a>
                        </li>
                     </ul>
                  <div class="course__details--content">
                     <div class="course__details-img">
                        <img class="course__photo" src="'.$row['course_img'].'" alt="">
                     </div>
                     <div class="course__details-info">
                        <h1 class ="course__details--title">Description :</h1>
                        <div class="course__details-desc">'.$row['course_description'].'</div>
                        <h1 class ="course__details--title">Duration : </h1>
                        <div class="course__details-duration">
                        '.$row['course_duration'].'
                        </div>
                        <h1 class ="course__details--title">Author :</h1>
                        <div class="course__details-author">
                           <div class="course__author">
                           '.$row['course_author'].'
                           </div>
                           <a class = "btn btn--blue btn--rounded" href="watchCourse.php?course_id='.$row['course_id'].'">Watch Course</a>
                        </div>
                      
                     </div>
                  </div>
               </div>
            </article>
               
               ';
            }
         }
      }
   ?>

</div>
</div>




<?php
include_once('./includes/footer.php');
?>
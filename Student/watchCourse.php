<?php
include_once('../configDb.php');
include_once('./includes/header.php');
if(!isset($_SESSION)){
   session_start();
}
if(isset($_SESSION['student_has_logged'])){
   $student_email = $_SESSION['studentLoginEmail'];
}else{
   echo "<script> location.href = '../index.php';</script>";
}
?>

<div class="main">
   <div class="container container--courses">
   <?php 
         if(isset($_GET['course_id'])){
            $course_id = $_GET['course_id'];
            $_SESSION['course_id'] = $course_id;
            $query = "SELECT * FROM courses WHERE course_id ='$course_id'";
            $answer = $con->query($query);
            $row = $answer->fetch_assoc();
            $course_date_new = date('d.m.Y', strtotime($row['course_data']));
         }
      ?>
      <article class="course__details">
         <div class="course__actions">
            <i class="fa-solid fa-hand-point-left"></i>
            <a href="courses.php">Back</a>
         </div>
         <div class="course__header ">
            <h2 class="course__details-title ">
               <?php echo $row['course_name']; ?>
            </h2>
            <ul class="course__data">
               <li class="course-data__item">
                  <time datetime="2022-11-21"><?php echo $course_date_new ?></time>
               </li>
               <li class="course-data__item">
                  <a href="#">Category : <?php echo $row['course_category']; ?></a>
               </li>
            </ul>
         </div>
         <div class="course__video">
            <video id="videoarea" class="video__area" src="" controls></video>
         </div>
         <div class="course__lessons">
            <div class="course__lessons-title">
               <h1>Lessons :</h1>
            </div>
          
            <div class="course__lessons-info">
            <?php 
               $query = "SELECT * FROM lessons WHERE course_id='$course_id'";
               $answer = $con->query($query);
               if($answer->num_rows > 0){
                  $num = 0;
                  while( $row = $answer->fetch_assoc()){
                     if($course_id == $row['course_id']){
                        $num++;
                        echo '<div class="course__lesson" id="playlist">
                                 <a  class="course__lesson-link" movieurl="'.$row['lesson_link'].'">'.$num.'. '.$row['lesson_name'].'</a>
                                 <a  class="course__lesson-duration">'.$row['lesson_duration'].'</a>
                              </div>';
                     }
                  
                  }
               }
              
            ?>
         </div>
      </article>
   </div>
</div>
<script type="text/javascript" src="../assets/js/custom.js"></script>
<?php
include_once('./includes/footer.php');
?>


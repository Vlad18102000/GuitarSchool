<?php
   include_once('configDb.php');
   include_once('./includes/header.php');
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
            //$course_date = $row['course_date'];
             $course_price = $row['course_price'];
             $course_original_price = $row['course_original_price'];
             $course_img  = substr( $row['course_img'], 1);
            $course_date_new = date('d.m.Y', strtotime($row['course_data']));
            if($course_price == 0){
               $course_price = $course_original_price;

               $div = ''.$course_price.' $';
            }else{
               $div = '<del>'.$row['course_original_price'].'$</del> '.$course_price.'$';
            }
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
         <div class="course__details--content">
            <div class="course__details-img">
               <img class="course__photo" src="<?php echo $course_img ?>" alt="">
            </div>
            <div class="course__details-info">
               <h1 class ="course__details--title">Description :</h1>
               <div class="course__details-desc"> <?php echo $row['course_description']; ?></div>
               <h1 class ="course__details--title">Duration :</h1>
               <div class="course__details-duration">
                  <?php echo $row['course_duration']; ?>
               </div>
               <h1 class ="course__details--title">Price :</h1>
               <form action="checkout.php" method="POST" class="course__details-price">
                  <div>
                     <?php echo $div  ?>
                  </div>
                  <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
                  <input type="hidden" name="id" value="<?php echo $course_price ?>">
                  <button class = "btn btn--blue  btn--rounded" type='submit' name='buy'>Buy</button>
               </form>
            </div>
         </div>
         <div class="course__lessons">
            <div class="course__lessons-title">
               <h1>Course content :</h1>
            </div>
          
            <div class="course__lessons-info">
            <?php 
               $query = "SELECT * FROM lessons";
               $answer = $con->query($query);
               if($answer->num_rows > 0){
                  $num = 0;
                  while( $row = $answer->fetch_assoc()){
                     if($course_id == $row['course_id']){
                        $num++;
                        echo '<div class="course__lesson">
                                 <a href="#" class="course__lesson-link">'.$num.'. '.$row['lesson_name'].'</a>
                                 <a href="#" class="course__lesson-duration">'.$row['lesson_duration'].'</a>
                              </div>';
                     }
                  
                  }
               }
              
            ?>
         </div>
      </article>
   </div>
</div>
<?php
include_once('./includes/footer.php');
?>
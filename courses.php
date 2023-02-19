<?php
   include('configDb.php');
   include('./includes/header.php');
?>

   <div class="courses">
      <div class="container container--courses">
      <div class="courses__nav">
            <a class="courses__nav-link" href="#" data-filter="all">All</a>
            <a class="courses__nav-link" href="#" data-filter="Beginner">Beginner</a>
            <a class="courses__nav-link" href="#" data-filter="Intermediate">Intermediate</a>
            <a class="courses__nav-link" href="#" data-filter="Advanced">Advanced</a>
         </div>
         <div class="course__items">
            <?php 
               $query = "SELECT * FROM courses";
               $answer = $con->query($query);
               if($answer->num_rows > 0){
                  while($row = $answer->fetch_assoc()){
                     $course_id = $row['course_id'];
                     $course_price = $row['course_price'];
                     $course_img  = substr( $row['course_img'], 1);
                     if($course_price == 0){
                        $course_price = "";

                        $div = 'Cena : '.$row['course_original_price'].' '.$course_price.' $';
                     }else{
                        $div = 'Cena : <del>'.$row['course_original_price'].'</del> '.$course_price.'$';
                     }
                     
                     echo '
                     <div class="course__col" data-cat = '.$row['course_category'].' >
                     <div class="course">
                        <a class="course__link" href="courseDetails.php?course_id='.$course_id.'">
                        <img class="course__img" src="'.$course_img.'" alt="">
                        <div class="course__content">
                           <div class="course__cat">
                              Category : '.$row['course_category'].'
                           </div>
                           <div class="course__title">
                              '.$row['course_name'].'
                        
                           </div>
                           <div class="course__desc">'.$row['course_description'].'</div>
                           <div class="course__info">
                              <div class="course__price">
                              '.$div.'
                              </div>
                           <a class = "btn btn--blue btn--sm  btn--rounded" href="courseDetails.php?course_id='.$course_id.'">Buy</a>
                           </div>
                        </div>
                     </div>
                     </a>
                  </div>
                     
                     ';
                  }
               }

            ?>

         </div>
      </div>
   </div>

<?php
   include('./includes/footer.php');
?>
 
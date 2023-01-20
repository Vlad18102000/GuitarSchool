<?php
   include_once('./includes/header.php');
?>
<div class="main">
   <div class="container container--courses">
      <article class="course__details">
         <div class="course__actions">
            <i class="fa-solid fa-hand-point-left"></i>
            <a href="courses.php">Back</a>
         </div>
         <div class="course__header ">
            <h2 class="course__details-title ">
               Course title
            </h2>
            <ul class="course__data">
               <li class="course-data__item">
                  <time datetime="2022-11-21">21.11.2022</time>
               </li>
               <li class="course-data__item">
                  <a href="#">Category : Beginner</a>
               </li>
            </ul>
         </div>
         <div class="course__details--content">
            <div class="course__details-img">
               <img class="course__photo" src="assets/img/sidebar-header.jpg" alt="">
            </div>
            <div class="course__details-info">
               <h1 class ="course__details--title">Description :</h1>
               <div class="course__details-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
               <h1 class ="course__details--title">Duration :</h1>
               <div class="course__details-duration">
                  10 Days
               </div>
               <h1 class ="course__details--title">Price :</h1>
               <div class="course__details-price">
                  <div>
                     <del>199$</del>  150$
                  </div>
                  <button class = "btn btn--blue  btn--rounded">Buy</button>
               </div>
            </div>
         </div>
         <div class="course__lessons">
            <div class="course__lessons-title">
               <h1>Course content :</h1>
            </div>
            <div class="course__lessons-info">
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">1. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">2. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">3. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">4. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">5. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">6. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">7. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
               <div class="course__lesson">
                  <a href="#" class="course__lesson-link">8. Choosing an Acoustic Guitar</a>
                  <a href="#" class="course__lesson-duration"> 20:21</a>
               </div>
            </div>
         </div>
      </article>
   </div>
</div>
<?php
include_once('./includes/footer.php');
?>
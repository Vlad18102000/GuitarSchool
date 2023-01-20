<?php
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
            <div class="course__col" data-cat = "Beginner" >
               <div class="course">
                  <a class="course__link" href="courseDetails.php">
                  <img class="course__img" src="assets/img/sidebar-header.jpg" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        Category : Beginner
                     </div>
                     <div class="course__title">
                        Course title
                  
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                        <div class="course__price">
                        Cena : <del>199$</del> 
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
               </a>
            </div>
            <div class="course__col" data-cat ="Intermediate" >
               <div class="course">
                  <img class="course__img" src="assets/img/ai.jpg" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        category : Intermediate
                     </div>
                     <div class="course__title">
                        Project title
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                     <div class="course__price">
                        Cena : <del>199$</del>  150$
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="course__col" data-cat ="Beginner" >
               <div class="course">
                  <img class="course__img" src="assets/img/Banner1.jpeg" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        category : Beginner
                     </div>
                     <div class="course__title">
                        Project title
                        <!-- <time class="course__date" datetime="2022-11-11">
                           2022
                        </time> -->
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                     <div class="course__price">
                        Cena : 99$
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="course__col" data-cat ="Advanced">
               <div class="course">
                  <img class="course__img" src="https://via.placeholder.com/370x300" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        category : Advanced
                     </div>
                     <div class="course__title">
                        Project title
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                     <div class="course__price">
                        Cena : <del>199$</del> 
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="course__col" data-cat ="Intermediate">
               <div class="course">
                  <img class="course__img" src="https://via.placeholder.com/370x300" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        category : Intermediate
                     </div>
                     <div class="course__title">
                        Project title
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                     <div class="course__price">
                        Cena : 199$
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="course__col" data-cat ="Beginner">
               <div class="course">
                  <img class="course__img" src="https://via.placeholder.com/370x300" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        category : Beginner
                     </div>
                     <div class="course__title">
                        Project title
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                     <div class="course__price">
                        Cena : <del>199$</del> 99$
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="course__col" data-cat ="Intermediate">
               <div class="course">
                  <img class="course__img" src="https://via.placeholder.com/370x300" alt="">
                  <div class="course__content">
                     <div class="course__cat">
                        category : Intermediate
                     </div>
                     <div class="course__title">
                        Project title
                     </div>
                     <div class="course__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate itaque facere eveniet cumque.</div>
                     <div class="course__info">
                     <div class="course__price">
                        Cena : <del>199$</del> 
                        </div>
                       <button class = "btn btn--blue btn--sm  btn--rounded">Buy</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php
   include('./includes/footer.php');
?>
 
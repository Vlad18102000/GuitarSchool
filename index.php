<?php
   include('configDb.php');
   include('./includes/header.php');
?>

<div class="main">
   <div class="container">
   <?php
         $query = "SELECT * FROM posts";
         $answer = $con->query($query);
         if($answer->num_rows > 0){
            while($row = $answer->fetch_assoc()){
               $post_title = $row['post_title'];
               $post_content = $row['post_content'];
               $post_img  = substr($row['post_img'], 1);
               $post_date_new = date('d.m.Y', strtotime($row['post_date']));

               if($post_img == "./assets/img/"){
                  echo '
                     <div class="post">
                        <div class="post__content">
                           <h2 class="post__title">
                              <a href="#">'.$post_title.'</a>
                           </h2>
                           <p class="post__description">
                              '.$post_content.'
                           </p>
                        </div>
                        <div class="post__footer">
                           <ul class="post__data">
                              <li class="post-data__item">
                                 <time datetime="2022-11-21">'.$post_date_new.'</time>
                              </li>
                           </ul>
                        </div>
                        </div>
                     
                  ';
               
               }else{
                  echo '
                  <article class="post">
                     <div class="post__header post__header--preview">
                        <a href="#">
                           <img class="post__photo" src="'.$post_img.'" alt="">
                        </a>

                     </div>
                     <div class="post__content">
                        <h2 class="post__title">
                           <a href="#">'.$post_title.'</a>
                        </h2>
                        <p class="post__description">
                        '.$post_content.'
                        </p>
                     </div>
                     <div class="post__footer">
                        <ul class="post__data">
                           <li class="post-data__item">
                              <time datetime="2022-11-21">'.$post_date_new.'</time>
                           </li>
                        </ul>
            
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
   include('./includes/footer.php');
?>
 
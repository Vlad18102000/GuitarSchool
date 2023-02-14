<?php
include_once("configDb.php");

// if(isset($_SESSION)){
//    session_start();
// }

if(isset($_SESSION['student_has_logged'])){
   $studentLoginEmail = $_SESSION['studentLoginEmail'];
}

if(isset($studentLoginEmail)){
   $query = "SELECT * FROM students WHERE student_email = '$studentLoginEmail'";
   $answer = $con->query($query);
   $row = $answer->fetch_assoc();
   $student_name = $row['student_name'];
   $student_img = $row['student_img'];
   $student_description = $row['student_occupation'];
   
   
}
?>


<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Useful meta tags -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    
    <title>GuitarSchool | Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
   <div class="page" id="page">
      <header class="header">
         <div class="header__left">
            <nav class="nav">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a class="nav__link" href="index.php">Strona główna</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="courses.php">Kursy</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="#">Payment Status</a>
                  </li>
               
                  <li class="nav__item">
                     <a class="nav__link" href="#">Feedback</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="#" data-modal="contact-modal">Contact</a>
                  </li>
               </ul>
            </nav>
            <button class="burger active" type="button" id="sidebarToggle">
               <span>Burger</span>
            </button>
         </div>
         <div class="header__right">
            <nav class="nav">
               <ul class="nav__list">
                  <?php
                     session_start();
                     if(isset($_SESSION['student_has_logged'])){
                        echo '
                        <li class="nav__item">
                           <a class="nav__link" href="./Student/profile.php">My Profile</a>
                        </li>
                        <li class="nav__item">
                           <a class="nav__link" href="logout.php">Logout</a>
                        </li>';
                     }else{
                        echo '    
                        <li class="nav__item">
                           <a class="nav__link" href="#" data-modal="login-modal">Login</a>
                        </li>
                        <li class="nav__item">
                           <a class="nav__link" href="#" data-modal="reg-modal">SignUp</a>
                        </li>';
                     }
                  ?>
                  
               </ul>
            </nav>
            <form class="search" action="/" method="post">
               <input class="search__input" type="text" placeholder="Szukaj w serwisie...">
            </form>
         </div>
      </header>

      <aside class="sidebar" id="sidebar">
         <div class="sidebar__header">
            <img src="./assets/img/sidebar-header.jpg" alt="">
         </div>
         <?php
         //session_start();
         if(!isset($_SESSION['student_has_logged'])){

            echo ' <div class="sidebar__content1">
                     <nav class="nav nav--logout">
                     <div class="profile__logoname">
                        <a href="index.php" class="logo__name">NiceGuitar</a>
                        <i class="fa-solid fa-guitar profile__logo"></i>
                     </div>
            
                     <div class="profile__text profile__text--logout">
                           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum obcaecati atque veritatis accusantium
                              corporis.
                              Amet saepe laudantium deserunt vero dolores explicabo natus
                              minima voluptatum!
                           </p>
                     </div>
                     <ul class="social">
                           <li class="social__item">
                              <a class="social__link" href="#" target="_blank">
                                 <img src="./assets/img/instagram.svg" alt="Vladyslav instagram">
                              </a>
                           </li>
                           <li class="social__item">
                              <a class="social__link" href="#" target="_blank">
                                 <img src="./assets/img/fb.svg" alt="Vladyslav instagram" class="socila__item-img">
                              </a>
                           </li>
                           <li class="social__item">
                              <a class="social__link" href="#" target="_blank">
                                 <img src="./assets/img/pinterest.svg" alt="Vladyslav instagram">
                              </a>
                           </li>
                        </ul>
                     </nav>

                     <div class="sidebar__footer">
                        <a class="btn btn--red" href="#" data-modal="login-modal">Login</a>
                        <button class="btn btn--blue" type="button" data-modal="reg-modal">Sign Up</button>
                     </div>
                  </div>';
         }else{
            $studentLoginEmail = $_SESSION['studentLoginEmail'];
            $query = "SELECT * FROM students WHERE student_email = '$studentLoginEmail'";
            $answer = $con->query($query);
            $row = $answer->fetch_assoc();
            $student_name = $row['student_name'];
            //$student_img = $row['student_img'];
            $student_img = substr($row['student_img'], 1);
            $student_description = $row['student_occupation'];
            echo '
            <div class="sidebar__content">
               <div class="profile">
         
                  <img class="profile__avatar" src="'.$student_img.'" alt="">
                  <div class="profile__header">
                     <div class=" profile__name">'.$student_name.'</div>
                     <div class="profile__prof">'.$student_description.'</div>
                  </div>

                  <div class="profile__text">
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum obcaecati atque veritatis accusantium
                        corporis.
                        Amet saepe laudantium deserunt vero dolores explicabo natus
                        minima voluptatum!</p>
                  </div>
               </div>
               
            </div>
          
            <div class="sidebar__footer" >
               <a class="btn btn--red" href="logout.php">Logout</a>
               <a class="btn btn--blue" href="./Student/myCourse.php">Moje Kursy</a>
            </div>';
         }
      
         
         ?> 

            <nav class="nav nav--mobile">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a class="nav__link" href="index.php">Strona główna</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="#">Payment Status</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="#">Feedback</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="#">Contact</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link" href="#">Profile</a>
                  </li>
                  <!-- <li class="nav__item">
                     <a class="nav__link" href="#">Profile</a>
                  </li> -->
               </ul>
               <!-- 
               <div class="sidebar__footer">
                  <a class="btn btn--red" href="works.html">Login</a>
                  <button class="btn btn--blue" type="button" data-modal="contact-modal">SignUp</button>
               </div> -->
            </nav>
         
     
         
      </aside>
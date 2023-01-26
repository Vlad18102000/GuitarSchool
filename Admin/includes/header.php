<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Useful meta tags -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    
    <title>GuitarSchool | AdminArea</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
   <div class="page" id="page">
      <header class="header">
         <div class="header__left">
            <button class="burger active" type="button" id="sidebarToggle">
               <span>Burger</span>
            </button>
         </div>
         <div class="header__right">
            <form class="search" action="/" method="post">
               <input class="search__input" type="text" placeholder="Szukaj w serwisie...">
            </form>
         </div>
      </header>

      <aside class="sidebar" id="sidebar">
         <div class="sidebar__content--admin">
            <div class="profile__logoname">
               <a href="dashboard.php" class="logo__name">Admin Area</a>
            </div>
         </div>
      
         <div class="sidebar__content">
            <nav class="nav nav--admin">
               <ul class="nav__list nav__list--admin">
                  <li class="nav__item nav__item--admin">
                     <a class="nav__link nav__link--admin" href="dashboard.php">
                        <i class="fa-solid fa-gauge"></i>Dashboard
                     </a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="courses.php">
                     <i class="fa-regular fa-compass"></i> Courses</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="lessons.php">
                     <i class="fa-solid fa-person-chalkboard"></i>Lessons</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="students.php">
                     <i class="fa-solid fa-people-group"></i>Students</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="#">
                     <i class="fa-solid fa-table"></i>Report</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="#">
                     <i class="fa-solid fa-credit-card"></i>Payment Status</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="#">
                     <i class="fa-solid fa-message"></i>Feedback</a>
                  </li>
                  <li class="nav__item">
                     <a class="nav__link nav__link--admin" href="changePassword.php">
                     <i class="fa-solid fa-lock"></i>Change Password</a>
                  </li>
                 
               </ul>
            </nav>
         </div>
          
      <div class="sidebar__footer sidebar__footer--admin" >
         <a class="btn btn--red" href="../logout.php">Logout</a>
      </div>
         

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
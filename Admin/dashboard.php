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
            <div class="dashboard__info">
               <div class="dashboard-info__items">
                  <div class="dashboard-info__col">
                     <div class="dashboard-info__item">
                        <div class="dashboard-info__title">Courses</div>
                        <div class="dashboard-info__content">
                           <h4 class="dashboard-info__num">5</h4>
                           <a href="#" class="dashboard-info__link">View</a>
                        </div>
                     </div>
                  </div>

                  <div class="dashboard-info__col">
                     <div class="dashboard-info__item dashboard-info__item--stud">
                        <div class="dashboard-info__title">Students</div>
                        <div class="dashboard-info__content">
                           <h4 class="dashboard-info__num">14</h4>
                           <a href="#" class="dashboard-info__link">View</a>
                        </div>
                     </div>
                  </div>

                  <div class="dashboard-info__col">
                     <div class="dashboard-info__item dashboard-info__item--sold">
                        <div class="dashboard-info__title">Sold</div>
                        <div class="dashboard-info__content">
                           <h4 class="dashboard-info__num">3</h4>
                           <a href="#" class="dashboard-info__link">View</a>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>

            <div class="dashboard__table">
               <div class="dashboard__table-title">Course Ordered</div>

               <table class="table">
                  <thead>
                     <tr class="table__header">
                        <th scope="col" class="table__info">Order ID</th>
                        <th scope="col" class="table__info">Course ID</th>
                        <th scope="col" class="table__info">Student Email</th>
                        <th scope="col" class="table__info">Order Date</th>
                        <th scope="col" class="table__info">Amount</th>
                        <th scope="col" class="table__info">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  <tr class="table__content">
                        <th scope="col" class="table__info">22</th>
                        <td  class="table__info">100</td>
                        <td  class="table__info">potapovpotapov@gmail.com</td>
                        <td  class="table__info">01.01.2023</td>
                        <td  class="table__info">300</td>
                        <td  class="table__info">
                           <button class="btn btn--sm btn--red" type="submit" name="delete" value="Delete">
                           <i class="fa-solid fa-trash"></i>
                           </button>
                        </td>
                  </tr>
                  
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      
<?php
include_once("includes/footer.php");
?>
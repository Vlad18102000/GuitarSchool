<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Report');
define('PAGE', 'report');
include('./includes/header.php'); 
include('../configDb.php');

 if(isset($_SESSION['admin_has_logged'])){
  $adminEmail = $_SESSION['adminEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>

<div class="admin__area">
      <div class="container--courses">
         <div class="course__details">
            <div class="display__block">
               <div class="dashboard__table-title">Search Order</div>
            </div>
            <form action method="POST" enctype="multipart/form-data" class="form form--date">
               <input type="date" class="form__date" id="first" name="first">
               <input type="date" class="form__date" id="last" name="last">

               <div class="form__center form__center--mt50">
                  <button  button type="submit" class="btn btn--blue form__button" id="searchBtn" name="searchBtn">Search</button>
               </div>
            </form>
            <?php 
            if(isset($_REQUEST['searchBtn'])){
               $firstDate = $_REQUEST['first'];
               $lastDate = $_REQUEST['last'];
               $query = "SELECT * FROM courseorder WHERE order_date BETWEEN '$firstDate' AND '$lastDate'";
               $answer = $con->query($query);
               if($answer->num_rows > 0){
                  echo '
                  <table class="table print">
                  <thead>
                     <tr class="table__header">
                        <th scope="col" class="table__info">Order ID</th>
                        <th scope="col" class="table__info">Course ID</th>
                        <th scope="col" class="table__info">Student Email</th>
                        <th scope="col" class="table__info">Payment Status</th>
                        <th scope="col" class="table__info">Order Date</th>
                        <th scope="col" class="table__info">Amount</th>
                     </tr>
                  </thead>
                  <tbody>
                  
                  ';
                  while ($row = $answer->fetch_assoc()){
                     echo '
                     <tr class="table__content">
                           <th scope="col" class="table__info">'.$row['order_id'].'</th>
                           <td  class="table__info">'.$row['course_id'].'</td>
                           <td  class="table__info">'.$row['student_email'].'</td>
                           <td  class="table__info">'.$row['status'].'</td>
                           <td  class="table__info">'.$row['order_date'].'</td>
                           <td  class="table__info">'.$row['amount'].'</td>
                           
                        </tr>
                     ';
                  }
                  echo '<tr class="tr__center">
                  <td><form class="form"><input class="btn btn--blue btn--print" type="submit" value="Print" onClick="printElement()"></form></td>
                </tr></tbody>
                </table>';
               }else{
                  echo "<div class='errorMg'> No Records Found ! </div>";
               }
            }
            ?>
         </div>
        
      </div>
</div>


<?php
include('./includes/footer.php'); 
?>
<?php
error_reporting(E_ALL);
if(!isset($_SESSION)){
   session_start();
}
include_once('../configDb.php');
header('Content-type: application/pdf');
require_once('../fpdf/fpdf.php');

if(isset($_SESSION['student_has_logged'])){
   $student_email = $_SESSION['studentLoginEmail'];
}else{
   echo '<script> location.href="../index.php";</script>';
}

$course_id = $_POST['course_id'];    
$sql = "SELECT DISTINCT course.course_id ,course.course_name ,course.course_author ,orders.course_id ,orders.student_name ,orders.student_email From courses As course JOIN courseorder AS orders ON orders.course_id = course.course_id
WHERE orders.student_email = '$student_email' AND orders.course_id = '$course_id'";

$result= $con->query($sql);
$row = $result->fetch_assoc();
$student_names = $row['student_name'];
$course_name = $row['course_name'];
$email = $student_email;
date_default_timezone_set('UTC');

$date = date("m.d.y"); 

$certificate = '../assets/img/certyficate1.jpg';
list($imageWidth, $imageHeight) = getimagesize($certificate);

$pdf = new FPDF('L','pt',[$imageWidth,$imageHeight]);
$pdf->AddFont('TheNightfall-ow3Vq','','TheNightfall-ow3Vq.php',true);

$pdf->AddPage();
$pdf->SetMargins(10, 10); 
$pdf->SetAutoPageBreak(true, 10);
$pdf->Image($certificate, 0, 0, $imageWidth, $imageHeight);

$pdf->SetFont('TheNightfall-ow3Vq', '', 25);
$pdf->SetTextColor(255,255,255);
$pdf->setY(145);
$pdf->Cell(0, 0, $student_names, 0, 1, 'C');

$pdf->SetFont('TheNightfall-ow3Vq', '', 18);
$pdf->setY(205);
$pdf->Cell(0, 0, $course_name, 0, 1, 'C');

$pdf->SetFont('Arial', '', 16);
$pdf->setY(359);
$pdf->Cell(110);
$pdf->Cell(0, 0, $date, 0, 1, 'L');

$pdf->Output('I', 'certificate_'. str_replace(' ', '_', $student_names) .'.pdf');

?>

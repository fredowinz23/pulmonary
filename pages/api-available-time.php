<?php
require_once '../config/database.php';
require_once '../config/Models.php';

$json = array();

$available_date = array();

$appointmentDate = $_GET["appointmentDate"];
$doctorId = $_GET["doctorId"];

$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='12:00PM'");
if ($checkTime==0) {
  array_push($available_date, "12:00PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='12:30PM'");
if ($checkTime==0) {
  array_push($available_date, "12:30PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='1:00PM'");
if ($checkTime==0) {
  array_push($available_date, "1:00PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='1:30PM'");
if ($checkTime==0) {
  array_push($available_date, "1:30PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='2:00PM'");
if ($checkTime==0) {
  array_push($available_date, "2:00PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='2:30PM'");
if ($checkTime==0) {
  array_push($available_date, "2:30PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='3:00PM'");
if ($checkTime==0) {
  array_push($available_date, "3:00PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='3:30PM'");
if ($checkTime==0) {
  array_push($available_date, "3:30PM");
}

$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='4:00PM'");
if ($checkTime==0) {
  array_push($available_date, "4:00PM");
}
$checkTime = appointment()->count("doctorId=$doctorId and status='Approved' and appointmentDate='$appointmentDate' and appointmentTime='4:30PM'");
if ($checkTime==0) {
  array_push($available_date, "4:30PM");
}

$json["available_date"] = $available_date;

echo json_encode($json);
?>

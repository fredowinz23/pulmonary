<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$type = get_query_string("type","");
$collegeId = get_query_string("collegeId","");
$doctorId = get_query_string("doctorId","");

$appointment_list = appointment()->list();
if ($type=="teacher") {
  $appointment_list = appointment()->list("role='Teacher'");
}
if ($type=="student") {
  $appointment_list = appointment()->list("role='Student'");
}
if ($type=="college") {
  $appointment_list = appointment()->list("collegeId='$collegeId'");
}
if ($type=="doctor") {
  $appointment_list = appointment()->list("doctorId='$doctorId'");
}

function get_doctor($Id){
  $doctor = doctor()->get("Id=$Id");
  return "Dr. " . $doctor->firstName . " " . $doctor->lastName;
}

?>

<table class="table">
  <tr>
    <th>#</th>
    <th>Date</th>
    <th>Time</th>
    <th>Doctor</th>
    <th>Student</th>
    <th width="100">Action</th>
  </tr>

  <?php
  $count = 0;
   foreach ($appointment_list as $row):
     $student = user()->get("Id=$row->studentId");
     $count += 1;
     ?>
    <tr>
      <td><?=$count;?></td>
      <td><?=$row->appointmentDate;?></td>
      <td><?=$row->appointmentTime;?></td>
      <td><?=get_doctor($row->doctorId);?></td>
      <td><?=$student->firstName;?> <?=$student->lastName;?></td>
      <td><a href="appointment-detail.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">View</a></td>
    </tr>
  <?php endforeach; ?>
</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

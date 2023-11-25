<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$appointment_list = appointment()->list();
$role = $_SESSION["user_session"]["role"];
$Id = $_SESSION["user_session"]["Id"];

if ($role=="Doctor") {
  $appointment_list = appointment()->list("doctorId=$Id");
}
if ($role=="Patient") {
  $appointment_list = appointment()->list("patientId=$Id");
}

function get_doctor($Id){
  $doctor = user()->get("Id=$Id");
  return "Dr. " . $doctor->firstName . " " . $doctor->lastName;
}

?>

<h2>History</h2>
<hr>

<table class="table">
  <tr>
    <th>#</th>
    <th>Date</th>
    <th>Time</th>
    <th>Doctor</th>
    <th>Patient</th>
    <th width="100">Action</th>
  </tr>

  <?php
  $count = 0;
   foreach ($appointment_list as $row):
     $patient = user()->get("Id=$row->patientId");
     $count += 1;
     ?>
    <tr>
      <td><?=$count;?></td>
      <td><?=$row->appointmentDate;?></td>
      <td><?=$row->appointmentTime;?></td>
      <td><?=get_doctor($row->doctorId);?></td>
      <td><?=$patient->firstName;?> <?=$patient->lastName;?></td>
      <td><a href="appointment-detail.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">View</a></td>
    </tr>
  <?php endforeach; ?>
</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

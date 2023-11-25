<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$status = get_query_string("status", "Pending");
$appointment_list = appointment()->list("status='$status'");

function get_doctor($Id){
  $doctor = user()->get("Id=$Id");
  return "Dr. " . $doctor->firstName . " " . $doctor->lastName;
}

$pendingActive = "";
$approvedActive = "";
$doneActive = "";
$noShowActive = "";
$deniedActive = "";
if ($status=="Pending") {
  $pendingActive = "active";
}
if ($status=="Approved") {
  $approvedActive = "active";
}
if ($status=="Done") {
  $doneActive = "active";
}
if ($status=="No Show") {
  $noShowActive = "active";
}
if ($status=="Denied") {
  $deniedActive = "active";
}
?>

<ul class="nav nav-tabs">
<li class="nav-item">
  <a class="nav-link <?=$pendingActive?>" href="?status=Pending">Pending</a>
</li>
<li class="nav-item">
  <a class="nav-link <?=$approvedActive?>" href="?status=Approved">Approved</a>
</li>
<li class="nav-item">
  <a class="nav-link <?=$doneActive?>" href="?status=Done">Done</a>
</li>
<li class="nav-item">
  <a class="nav-link <?=$noShowActive?>" href="?status=No Show">No Show</a>
</li>
<li class="nav-item">
  <a class="nav-link <?=$deniedActive?>" href="?status=Denied">Denied</a>
</li>
</ul>

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

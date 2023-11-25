<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$patientId = $userSession["Id"];
$appointment_list = appointment()->list("patientId=$patientId");

function get_doctor($Id){
  $doctor = user()->get("Id=$Id");
  return "Dr. " . $doctor->firstName . " " . $doctor->lastName;
}

$view = $_GET["view"];

$role = $userSession["role"];
?>

<table class="table">
  <tr>
    <th>#</th>
    <th>Date</th>
    <th>Time</th>
    <th>Doctor</th>
    <th>Patient</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  $count = 0;
   foreach ($appointment_list as $row):
     $patient = user()->get("Id=$row->patientId");
     $count += 1;

     $ptCheck = physical_test()->count("appointmentId=$row->Id");
     $cuCheck = check_up()->count("appointmentId=$row->Id");
     $ltCheck = lab_test()->count("appointmentId=$row->Id");
     ?>
    <tr>
      <td><?=$count;?></td>
      <td><?=$row->appointmentDate;?></td>
      <td><?=$row->appointmentTime;?></td>
      <td><?=get_doctor($row->doctorId);?></td>
      <td><?=$patient->firstName;?> <?=$patient->lastName;?></td>
      <td><?=$row->status;?></td>
      <?php if ($view=="lab-test"): ?>
        <?php if ($ltCheck>0): ?>
          <td><a href="lab-test-detail.php?Id=<?=$row->Id;?>" class="btn btn-warning btn-sm">View Lab Test Detail</a></td>
          <?php else: ?>
          <td><a href="" class="btn btn-secondary btn-sm">Not Yet</a></td>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($view=="history"): ?>
          <td><a href="appointment-detail.php?Id=<?=$row->Id;?>" class="btn btn-warning btn-sm">View Appointment</a></td>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

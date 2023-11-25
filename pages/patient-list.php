<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$appointment_list = appointment()->list("status='Approved' or status='Done'");

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
      <?php if ($view=="physical-test"): ?>
        <?php if ($ptCheck>0): ?>
          <td><a href="physical-test-detail.php?Id=<?=$row->Id;?>" class="btn btn-warning btn-sm">View Pysical Test</a></td>
          <?php else: ?>
            <?php if ($role=="Clinic Staff"): ?>
              <td><a href="physical-test-form.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">Pysical Test Form</a></td>
              <?php else: ?>
              <td><a href="" class="btn btn-secondary btn-sm">Not Yet</a></td>
            <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($view=="check-up"): ?>
        <?php if ($cuCheck>0): ?>
          <td><a href="check-up-detail.php?Id=<?=$row->Id;?>" class="btn btn-warning btn-sm">View Check Up Detail</a></td>
          <?php else: ?>
          <td><a href="check-up-form.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">New Check Up Form</a></td>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($view=="lab-test"): ?>
        <?php if ($ltCheck>0): ?>
          <td><a href="lab-test-detail.php?Id=<?=$row->Id;?>" class="btn btn-warning btn-sm">View Lab Test Detail</a></td>
          <?php else: ?>

              <?php if ($role=="Lab"): ?>
          <td><a href="lab-test-form.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">New Lab Test Form</a></td>
                <?php else: ?>
                <td><a href="" class="btn btn-secondary btn-sm">Not Yet</a></td>
              <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

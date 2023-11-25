<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$checkup_list = check_up()->list("needLab='Yes'");

function get_doctor($Id){
  $doctor = user()->get("Id=$Id");
  return "Dr. " . $doctor->firstName . " " . $doctor->lastName;
}

$role = $userSession["role"];
?>

<table class="table">
  <tr>
    <th>#</th>
    <th>Date</th>
    <th>Time</th>
    <th>Doctor</th>
    <th>Patient</th>
    <th>Action</th>
  </tr>

  <?php
  $count = 0;
   foreach ($checkup_list as $cu):
     $row = appointment()->get("Id=$cu->appointmentId");
     $patient = user()->get("Id=$row->patientId");
     $ltCheck = lab_test()->count("appointmentId=$row->Id");
     $count += 1;
     ?>
    <tr>
      <td><?=$count;?></td>
      <td><?=$row->appointmentDate;?></td>
      <td><?=$row->appointmentTime;?></td>
      <td><?=get_doctor($row->doctorId);?></td>
      <td><?=$patient->firstName;?> <?=$patient->lastName;?></td>

      <?php if ($ltCheck>0): ?>
        <td><a href="lab-test-detail.php?Id=<?=$row->Id;?>" class="btn btn-warning btn-sm">View Lab Test Detail</a></td>
        <?php else: ?>

            <?php if ($role=="Lab"): ?>
        <td><a href="lab-test-form.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">New Lab Test Form</a></td>
              <?php else: ?>
              <td><a href="" class="btn btn-secondary btn-sm">Not Yet</a></td>
            <?php endif; ?>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

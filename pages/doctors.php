<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$doctor_list = user()->list("role='Doctor'");

?>

<table class="table">
  <tr>
    <th>#</th>
    <th>Doctor</th>
    <th width="200">Action</th>
  </tr>
  <?php
  $count = 0;
   foreach ($doctor_list as $row):
     $count += 1;
     ?>
    <tr>
      <td><?=$count;?></td>
      <td>Dr. <?=$row->firstName;?> <?=$row->lastName;?></td>
      <td><a href="appointment-add.php?doctorId=<?=$row->Id;?>" class="btn btn-primary btn-sm">Make an apointment</a></td>
    </tr>
  <?php endforeach; ?>

</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$role = get_query_string("role", "Admin");
$user_list = user()->list("role='$role'");

$adminActive = "";
$staffActive = "";
$doctorActive = "";
$labActive = "";
$patientActive = "";

if ($role=="Admin") {
  $adminActive = "active";
}
if ($role=="Staff") {
  $staffActive = "active";
}
if ($role=="Doctor") {
  $doctorActive = "active";
}
if ($role=="Lab") {
  $labActive = "active";
}
if ($role=="Patient") {
  $patientActive = "active";
}

?>

<?php if ($role!="Patient"): ?>

  <div class="row">
    <div class="col-12 text-left">
      <a href="user-add.php?role=<?=$role;?>" class="btn btn-primary mt-3">Add New <?=$role;?></a>
    </div>
  </div>
<br>

<?php endif; ?>

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?=$adminActive?>" href="?role=Admin">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$doctorActive?>" href="?role=Doctor">Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$staffActive?>" href="?role=Staff">Staffs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$labActive?>" href="?role=Lab">Lab Staffs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$patientActive?>" href="?role=Patient">Patients</a>
  </li>
</ul>

<table class="table">
  <tr>
    <th>#</th>
    <th>Role</th>
    <th>Username</th>
    <th>Password</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Status</th>
    <th>Date Added</th>
    <?php if ($role=="Collector"): ?>
      <th>Contract Date</th>
    <?php endif ?>
    <th width="100">Action</th>
  </tr>

  <?php
  $count = 0;
   foreach ($user_list as $row):
     $count += 1;
     ?>
    <tr>
      <td><?=$count;?></td>
      <td><?=$row->role;?></td>
      <td><?=$row->username;?></td>
      <?php if ($row->status=="Inactive" && $role!="Household"): ?>
      <td>TEMP: <span style="color:red;font-style:italic;"><?=$row->password;?></span></td>
        <?php else: ?>
        <td><span style="color:gray;font-style:italic;">Not Shown for Security</span></td>
      <?php endif; ?>
      <td><?=$row->firstName;?></td>
      <td><?=$row->lastName;?></td>
      <td><?=$row->status;?></td>
      <td><?=$row->dateAdded;?></td>
      <?php if ($role=="Collector"): ?>
        <td><?=$row->dateStarted;?> - <?=$row->dateEnded;?></td>
      <?php endif ?>
      <td><a href="user-detail.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">View</a></td>

    </tr>
  <?php endforeach; ?>

</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

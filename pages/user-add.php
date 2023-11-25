<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$role = $_GET["role"];

$temp_password = rand(100000, 999999);

$doctor_list = user()->list("role='Doctor'");

?>

<form action="process.php?action=user-add" enctype="multipart/form-data" method="post">
<div class="card">
  <div class="card-header">
    <b>New <?=$role;?> Form</b>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <b>Username</b> <span style="color:red;"><?=$error;?></span>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="col-lg-6">
        <b>Temporary Password</b>
        <input type="hidden" name="password" value="<?=$temp_password;?>">
        <input type="text" class="form-control" value="<?=$temp_password;?>" disabled>
      </div>
      <div class="col-lg-4">
        <b>First Name</b>
        <input type="text" name="firstName" class="form-control" required>
      </div>

      <div class="col-lg-4">
        <b>Last Name</b>
        <input type="text" name="lastName" class="form-control" required>
      </div>

      <div class="col-lg-4">
        <b>Phone Number</b>
        <input type="number" name="phone" value="09" class="form-control" required>
        <input type="hidden" name="role" class="form-control" value="<?=$role;?>" required>
      </div>
      <div class="col-lg-4">
        <b>Email</b>
        <input type="text" name="email" class="form-control" required>
      </div>

      <?php if ($role=="Staff"): ?>
        <div class="col-lg-4">
          <b>Assigned Doctor</b>
          <select class="form-control" name="doctorId" required>
            <option value="">-- Select --</option>
            <?php foreach ($doctor_list as $row): ?>
                <option value="<?=$row->Id?>"><?=$row->firstName;?> <?=$row->lastName;?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php else: ?>
        <input type="hidden" name="doctorId" class="form-control">
      <?php endif; ?>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</div>

</form>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

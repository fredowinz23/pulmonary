<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$doctorId = get_query_string("doctorId", "");
$doctor_list = user()->list("role='Doctor'");
if ($doctorId) {
  $doctor = user()->get("Id=$doctorId");
}
?>

<form action="process.php?action=appointment-add" enctype="multipart/form-data" method="post">
<div class="card mt-3">
  <div class="card-header">
    <b>Create New Appointment</b>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <b class="form-label">Doctor</b>
        <select class="form-control" name="doctorId" required>
          <?php if ($doctorId): ?>
            <option value="<?=$doctorId?>">Dr. <?=$doctor->firstName?> <?=$doctor->lastName?></option>
            <?php else: ?>
              <option value="">--Select--</option>
          <?php endif; ?>
          <?php foreach ($doctor_list as $row): ?>
            <option value="<?=$row->Id?>">Dr. <?=$row->firstName?> <?=$row->lastName?></option>
          <?php endforeach; ?>

        </select>
      </div>
        <div class="col-lg-6">
          <b class="form-label">Appointment Date</b>
          <input type="date" name="appointmentDate" class="form-control" required>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Appointment Time</b>
          <select class="form-control" name="appointmentTime" required>
            <option value="">--Select--</option>
            <option>12:00PM</option>
            <option>12:30PM</option>
            <option>1:00PM</option>
            <option>1:30PM</option>
            <option>2:00PM</option>
            <option>2:30PM</option>
            <option>3:00PM</option>
            <option>3:30PM</option>
            <option>4:00PM</option>
            <option>4:30PM</option>
          </select>
        </div>

      <div class="col-lg-12">
        <b class="form-label">Purpose</b>
        <input type="text" name="purpose" class="form-control" required>
      </div>
  </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</div>
</form>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

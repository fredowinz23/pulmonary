<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");

?>

<form action="process.php?action=physical-test-add" enctype="multipart/form-data" method="post">
<div class="card mt-3">
  <div class="card-header">
    <b>Phyicsl Test Form</b>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-lg-6">
          <b class="form-label">Temperature</b>
          <input type="hidden" name="appointmentId" value="<?=$Id;?>">
          <input type="text" name="temperature" class="form-control" required>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Blood Pressure</b>
          <input type="text" name="bloodPressure" class="form-control" required>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Resperatory Rate</b>
          <input type="text" name="resperatoryRate" class="form-control" required>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Oxygen</b>
          <input type="text" name="oxygen" class="form-control" required>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Cardiac Rate</b>
          <input type="text" name="cardiacRate" class="form-control" required>
        </div>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</div>
</form>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

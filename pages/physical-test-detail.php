<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");
$pt = physical_test()->get("appointmentId=$Id");

?>

<div class="card mt-3">
  <div class="card-header">
    <b>Phyicsl Test Detail</b>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-lg-6">
          <b class="form-label">Temperature</b>
          <input type="text" name="temperature" value="<?=$pt->temperature?>" class="form-control" disabled>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Blood Pressure</b>
          <input type="text" name="bloodPressure" value="<?=$pt->bloodPressure?>" class="form-control" disabled>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Resperatory Rate</b>
          <input type="text" name="resperatoryRate" value="<?=$pt->resperatoryRate?>" class="form-control" disabled>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Oxygen</b>
          <input type="text" name="oxygen" value="<?=$pt->oxygen?>" class="form-control" disabled>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Cardiac Rate</b>
          <input type="text" name="cardiacRate" value="<?=$pt->cardiacRate?>" class="form-control" disabled>
        </div>
    </div>
  </div>
  <div class="card-footer">
    <a href="patient-list.php?view=physical-test" class="btn btn-primary">Back</a>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

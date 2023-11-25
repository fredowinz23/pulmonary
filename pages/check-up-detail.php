<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");
$cu = check_up()->get("appointmentId=$Id");

?>

<div class="card mt-3">
  <div class="card-header">
    <b>Check Up Detail</b>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-lg-12">
          <b class="form-label">Temperature</b>
          <input type="hidden" name="appointmentId" value="">
          <textarea name="allergies" class="form-control" disabled><?=$cu->allergies;?></textarea>
        </div>
        <div class="col-lg-12 mt-3">
          <b class="form-label">Medication</b>
          <textarea name="medication" class="form-control" disabled><?=$cu->medication;?></textarea>
        </div>
        <div class="col-lg-12 mt-3">
          <b class="form-label">Findings</b>
          <textarea name="findings" class="form-control" disabled><?=$cu->findings;?></textarea>
        </div>
        <div class="col-lg-4 mt-3">
          <b class="form-label">Need Lab?</b>
          <input type="text" name="" class="form-control" value="<?=$cu->needLab?>" disabled>
        </div>
        <div class="col-lg-12 mt-3">
          <b class="form-label">Lab Detail</b>
          <textarea name="findings" class="form-control" disabled><?=$cu->labtestDetail?></textarea>
        </div>
    </div>
  </div>
  <div class="card-footer">
    <a href="patient-list.php?view=check-up" class="btn btn-primary">Back</a>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

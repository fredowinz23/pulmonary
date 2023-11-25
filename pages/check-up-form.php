<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");
$app = appointment()->get("Id=$Id");

?>

<form action="process.php?action=check-up-add" enctype="multipart/form-data" method="post">
  <input type="hidden" name="appointmentId" value="<?=$app->Id?>">
<div class="card mt-3">
  <div class="card-header">
    <b>Check Up Form</b>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-lg-12 mt-3">
          <b class="form-label">Medication</b>
          <textarea name="medication" class="form-control" required></textarea>
        </div>
        <div class="col-lg-12 mt-3">
          <b class="form-label">Findings</b>
          <textarea name="findings" class="form-control" required></textarea>
        </div>
        <div class="col-lg-4 mt-3">
          <b class="form-label">Need Lab Result</b>
          <select class="form-control" name="needLab" required>
            <option value="">--Select--</option>
            <option>Yes</option>
            <option>No</option>
          </select>
        </div>
        <div class="col-lg-12 mt-3">
          <i>(If Yes)</i> <b class="form-label">Lab Test Detail</b>
          <textarea name="labTestDetail" class="form-control"></textarea>
        </div>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</div>
</form>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

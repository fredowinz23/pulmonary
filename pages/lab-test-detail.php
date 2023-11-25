<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");
$lt = lab_test()->get("appointmentId=$Id");

?>

<div class="card mt-3">
  <div class="card-header">
    <b>Lab Test Form</b>
  </div>
  <div class="card-body">
    <div class="row">
          <div class="col-lg-12">
            <input type="hidden" name="appointmentId" value="<?=$Id?>">
            <textarea name="description" class="form-control" placeholder="Enter lab test result..." rows="8" cols="80" disabled><?=$lt->description;?></textarea>
          </div>
    </div>
  </div>
  <div class="card-footer">
    <a href="patient-list.php?view=lab-test" class="btn btn-primary">Back</a>
  </div>
</div>
</form>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

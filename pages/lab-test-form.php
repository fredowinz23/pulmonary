<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");
$checkUp = check_up()->get("appointmentId=$Id");

?>

<form action="process.php?action=lab-test-add" enctype="multipart/form-data" method="post">
<div class="card mt-3">
  <div class="card-header">
    <b>Lab Test Form</b>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-lg-12">
          <input type="hidden" name="appointmentId" value="<?=$Id?>">
          <textarea name="description" class="form-control" placeholder="Enter lab test result..." rows="8" cols="80" required><?=$checkUp->labtestDetail?></textarea>
        </div>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</div>
</form>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

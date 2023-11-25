<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", "");
$cu = check_up()->get("appointmentId=$Id");
$Id = $userSession["Id"];
$doc = user()->get("Id=$Id");

?>

<div class="card mt-3">
  <div class="card-header">
    <b>My Profile</b>
  </div>
  <div class="card-body">
    <?php if ($doc->image): ?>

      <img src="../media/<?=$doc->image?>" alt="">
      <?php else: ?>

        <img src="../templates/img/profile.jpg" alt="">

    <?php endif; ?>
    <h3>Dr. <?=$doc->firstName;?> <?=$doc->lastName;?></h3>
    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Change Picture</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="process.php?action=upload-picture" enctype="multipart/form-data" method="post">
      <div class="modal-body">
          <input type="file" name="image" required class="form-control">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
  </div>
  <div class="card-footer">
    <a href="patient-list.php?view=check-up" class="btn btn-primary">Back</a>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

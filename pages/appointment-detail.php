<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";
  $Id = get_query_string("Id", "");
  $app = appointment()->get("Id=$Id");
  $patient = user()->get("Id=$app->patientId");
  $doctor = user()->get("Id=$app->doctorId");
?>

<style media="screen">
  .form-label{
    font-weight: bold;
    color: blue;
  }
  .form-value{
    font-size: 27px;
    margin-left:20px;
  }
</style>


<div class="card" style="min-height:300px;">
  <div class="card-body">
    <div class="row">
      <div class="col-6">
        <div class="form-label">PATIENT NAME:</div>
        <div class="form-value"><?=$patient->firstName;?> <?=$patient->lastName;?></div>
          <br>
        <div class="form-label">APPOINTMENT DATE:</div>
        <div class="form-value"><?=$app->appointmentDate;?></div>
          <br>
        <div class="form-label">APPOINTMENT TIME:</div>
        <div class="form-value"><?=$app->appointmentTime;?></div>
      </div>
      <div class="col-6">

        <div class="form-label">DOCTOR:</div>
        <div class="form-value">Dr. <?=$doctor->firstName;?> <?=$doctor->lastName;?></div>
        <br>
        <div class="form-label">STATUS:</div>
        <div class="form-value"><?=$app->status;?></div>
        <?php if ($app->status=="Denied"): ?>
          <b>Reason for denying:</b> <?=$app->denyReason;?>
          <br>
        <?php endif; ?>
        <br>
          <div class="form-label">PURPOSE:</div>
          <div class="form-value"><?=$app->purpose;?></div>
      </div>
      <div class="col-12 mt-3">
        <hr>

        <?php if ($role=="Admin" || $role=="Staff" || $role=="Doctor"): ?>

        <?php if ($app->status=="Pending"): ?>
          <a href="process.php?action=change-app-status&status=Approved&Id=<?=$Id;?>" class="btn btn-primary">Approve</a>
          <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">Deny</a>
        <?php else: ?>
          <?php if ($app->status=="Approved"): ?>
            <a href="process.php?action=change-app-status&status=Done&Id=<?=$Id;?>" class="btn btn-primary">Done</a>
            <a href="process.php?action=change-app-status&status=No Show&Id=<?=$Id;?>" class="btn btn-danger">No Show</a>
            <a href="process.php?action=change-app-status&status=Pending&Id=<?=$Id;?>" class="btn btn-warning">Change?</a>
            <?php else: ?>
              <a href="process.php?action=change-app-status&status=Pending&Id=<?=$Id;?>" class="btn btn-warning">Change?</a>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>


      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="process.php?action=appointment-deny" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reason for disapproval</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="Id" value="<?=$Id;?>">
          <textarea name="denyReason" class="form-control" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

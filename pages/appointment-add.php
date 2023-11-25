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
        <select class="form-control"  id="doctor-id" name="doctorId" required>
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
          <input type="date" id="appointment-date" name="appointmentDate" class="form-control"  onchange="check_available_time()" required>
        </div>
        <div class="col-lg-6">
          <b class="form-label">Available Time</b>
          <select class="form-control"  id="time-select" name="appointmentTime" required>
            <option value="">--Please Select Doctor and Date first--</option>
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


<script type="text/javascript">
function check_available_time(){
  var brgySelect = document.getElementById("time-select");
  var appointmentDate = document.getElementById("appointment-date");
  var doctorId = document.getElementById("doctor-id");
  $.ajax({
      type: "GET",
      url: "api-available-time.php?doctorId=" + doctorId.value + "&appointmentDate=" + appointmentDate.value,
      success: function(data){
        const obj = JSON.parse(data);
        var txt = "<option value=''>-- Select --</option>";
        for (x in obj.available_date) {
          txt += "<option>" + obj.available_date[x] + "</option>";
        }
        $('#time-select').html(txt);
      }
    });
}

</script>

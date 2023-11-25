<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header-blank.php";

$Id = get_query_string("Id", "");
$lt = lab_test()->get("appointmentId=$Id");
$app = appointment()->get("Id=$Id");
$patient = user()->get("Id=$app->patientId");

?>
<style media="screen">
  .card-company{
    cursor: pointer;
    height: 100px;
  }
  .card-company:hover{
    background: #f0f2f0;
  }
</style>
<style type="text/css" media="print">
  @page {
    size: portrait;
    margin: 5mm;
 }
</style>

<script>
  window.print();
  window.onafterprint = function() {
      window.history.back();
    };
</script>


<div class="card mt-3">
  <div class="card-header">
    <b>Lab Test Result</b>
  </div>
  <div class="card-body">
    <div class="row">
          <div class="col-lg-12">
            <b>Patient:</b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$patient->firstName;?> <?=$patient->lastName;?> <br>
              <b>Date:</b> <br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$lt->dateAdded;?> <br>
            <b>Result:</b>
            <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$lt->description;?>
        </div>
    </div>
  </div>
</div>
</form>

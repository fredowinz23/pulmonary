<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $total_students = appointment()->count("role='Student'");
  $total_teachers = appointment()->count("role='Teacher'");

  $college_list = college()->list();

  function total_per_college($Id){
    return appointment()->count("collegeId=$Id");
  }

  $doctor_list = doctor()->list();

  function total_per_doctor($Id){
    return appointment()->count("doctorId=$Id");
  }

?>

<style media="screen">
  .clickable{
    cursor:pointer;
  }
  .clickable:hover{
    background:gray;
  }
</style>

<h2>Reports</h2>
<hr>
<b>TOTAL STUDENTS AND TEACHERS</b>

<div class="row">
  <div class="col-3">
    <div class="card clickable" onclick="location.href='report-list.php?type=student'">
      <div class="card-body">
        <h1>Students: <?=$total_students?></h1>
      </div>
    </div>
  </div>
    <div class="col-3">
      <div class="card clickable" onclick="location.href='report-list.php?type=teacher'">
        <div class="card-body">
          <h1>Teachers: <?=$total_teachers?></h1>
        </div>
      </div>
    </div>
</div>

<hr>
<b>TOTAL PER COLLEGE</b>
<div class="row">

<?php foreach ($college_list as $row): ?>
  <div class="col-3">
    <div class="card clickable" onclick="location.href='report-list.php?type=college&collegeId=<?=$row->Id?>'">
      <div class="card-body">
        <h1><?=$row->code?>: <?=total_per_college($row->Id);?></h1>
      </div>
    </div>
  </div>


<?php endforeach; ?>

</div>
<hr>
<b>TOTAL PER DOCTOR</b>
<div class="row">

<?php foreach ($doctor_list as $row): ?>
  <div class="col-3">
    <div class="card clickable" onclick="location.href='report-list.php?type=doctor&doctorId=<?=$row->Id?>'">
      <div class="card-body">
        <h1>Dr. <?=$row->firstName?> <?=$row->lastName?>: <?=total_per_doctor($row->Id);?></h1>
      </div>
    </div>
  </div>


<?php endforeach; ?>

</div>

<br><br><br>
<?php include $ROOT_DIR . "templates/footer.php"; ?>

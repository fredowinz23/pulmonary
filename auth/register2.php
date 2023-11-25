<?php
$ROOT_DIR="../";
$pageName = "Register cont...";
include $ROOT_DIR . "templates/header-blank.php";

?>
<br><br><br>
<div class="container">
  <center>
  <div class="card">
    <div class="card-header">
      <b>Enter User Information</b>
    </div>
      <form method="post" action="process.php?action=register-step-2">
      <div class="card-body">
        <div class="row text-left">
          <div class="col-lg-6">
            <b>First Name:</b>
            <input type="text" class="form-control" name="firstName" required>
          </div>
          <div class="col-lg-6">
            <b>Last Name:</b>
            <input type="text" class="form-control" name="lastName" required>
          </div>

          <div class="col-lg-4">
            <b>Birthday</b>
            <input type="date" name="birthday" class="form-control" required>
          </div>

          <div class="col-lg-4">
            <b>Phone Number</b>
            <input type="number" name="phone" value="09" class="form-control" required>
          </div>

          <div class="col-lg-4">
            <b>Email</b>
            <input type="email" name="email" class="form-control">
          </div>

        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary">Register</button>
      </div>
    </form>
  </div>
</center>
</div>

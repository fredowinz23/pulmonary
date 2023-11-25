<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';
$ROOT_DIR = "../";

if (isset($_SESSION["user_session"])) {
  $userSession = $_SESSION["user_session"];
  $role = $_SESSION["user_session"]["role"];
}
else{
  header("Location: ../auth/login.php");
}
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pulmonary Clinic Management System of Mob
</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/plugins/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/plugins/owl.carousel.css">
    <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/plugins/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/plugins/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/plugins/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=$ROOT_DIR;?>templates/img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top" style="background:#fa2a8f;">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <?php if (isset($_SESSION["user_session"]["username"])): ?>
                  <li class="list-inline-item"><a href="#"><?=$_SESSION["user_session"]["firstName"]?> <?=$_SESSION["user_session"]["lastName"]?> (<?=$_SESSION["user_session"]["role"]?>)</li>
                  <li class="list-inline-item"> &nbsp;&nbsp; <a href="../auth/process.php?action=user-logout"><b>LOGOUT</b></a></li>
                  <?php else: ?>
                  <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <li class="list-inline-item"><a href="../auth/register.php">Register</a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="../auth/process.php?action=user-login" method="post">
                  <div class="form-group">
                    <input id="email-modal" name="username" type="text" placeholder="username" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password-modal" name="password" type="password" placeholder="password" class="form-control">
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="../auth/register.php"><strong>Register now</strong></a>! It is easy and done in 1 minute!</p>
              </div>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->

      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="../pages" class="navbar-brand home"><img src="<?=$ROOT_DIR;?>templates/img/logo.png"  class="d-none d-md-inline-block"><img src="<?=$ROOT_DIR;?>templates/img/logo-small.png" alt="ABN logo" class="d-inline-block d-md-none"><span class="sr-only">ABN - go to homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="../pages" class="nav-link">Home</a></li>
              <?php if ($userSession["role"]=="Admin"): ?>
                <li class="nav-item"><a href="accounts.php" class="nav-link">Accounts</a></li>
              <?php endif; ?>
              <?php if ($userSession["role"]=="Patient"): ?>
                <li class="nav-item"><a href="doctors.php" class="nav-link">Doctors</a></li>
                <li class="nav-item"><a href="appointment-add.php" class="nav-link">Make an appointment</a></li>
                <li class="nav-item"><a href="patient-appointment-list.php?view=history" class="nav-link">Appointment History</a></li>
                <li class="nav-item"><a href="patient-appointment-list.php?view=lab-test" class="nav-link">Lab Test Result</a></li>
              <?php endif; ?>
              <?php if ($userSession["role"]=="Doctor"): ?>
                <li class="nav-item"><a href="appointments.php" class="nav-link">Appointment</a></li>
              <li class="nav-item"><a href="patient-list.php?view=physical-test" class="nav-link">Patient Physical Test</a></li>
                <li class="nav-item"><a href="patient-list.php?view=check-up" class="nav-link">Patient Check Up Records</a></li>
                  <li class="nav-item"><a href="patient-test-list.php" class="nav-link">Lab Test</a></li>
              <?php endif; ?>
              <?php if ($userSession["role"]=="Clinic Staff"): ?>
                <li class="nav-item"><a href="appointments.php" class="nav-link">Appointment</a></li>
                <li class="nav-item"><a href="patient-list.php?view=physical-test" class="nav-link">Patient Physical Test</a></li>
              <?php endif; ?>
              <?php if ($userSession["role"]=="Lab"): ?>
                <li class="nav-item"><a href="lab-test-list.php" class="nav-link">Lab Test</a></li>
              <?php endif; ?>

            </ul>
          </div>
        </div>
      </nav>
    </header>

<div class="container">
  <div class="row">
    <div class="col-lg-12" style="min-height:500px">

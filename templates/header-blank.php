<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';
$ROOT_DIR = "../";

?>

<style media="screen">
  .nav-link{
    color:white !important;
  }
</style>

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
    <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/plugins/font-awesome.min.css">
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
    <!-- <link rel="shortcut icon" href="<?=$ROOT_DIR;?>templates/favicon.png"> -->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->

    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="col-lg-12" style="min-height:400px">

<?php
include "CRUD.php";
include "functions.php";

function user() {
	$crud = new CRUD;
	$crud->table = "user";
	return $crud;
}

function appointment() {
	$crud = new CRUD;
	$crud->table = "appointment";
	return $crud;
}

function physical_test() {
	$crud = new CRUD;
	$crud->table = "physical_test";
	return $crud;
}

function check_up() {
	$crud = new CRUD;
	$crud->table = "check_up";
	return $crud;
}

function lab_test() {
	$crud = new CRUD;
	$crud->table = "lab_test";
	return $crud;
}
?>

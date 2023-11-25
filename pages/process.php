<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'user-add' :
		user_add();
		break;

	case 'check-up-add' :
		check_up_add();
		break;

	case 'appointment-add' :
		appointment_add();
		break;

	case 'appointment-deny' :
		appointment_deny();
		break;

	case 'physical-test-add' :
		physical_test_add();
		break;

	case 'lab-test-add' :
		lab_test_add();
		break;

	case 'change-app-status' :
		change_app_status();
		break;

	case 'upload-picture' :
		upload_picture();
		break;

	default :
}

function upload_picture(){

	$doctorId = $_SESSION["user_session"]["Id"];

	$model = user();
	$model->obj["image"] = uploadFile($_FILES["image"]);
	$model->update("Id=$doctorId");

	header('Location: my-profile.php');
}


function physical_test_add(){

	$model = physical_test();
	$model->obj["appointmentId"] = $_POST["appointmentId"];
	$model->obj["temperature"] = $_POST["temperature"];
	$model->obj["bloodPressure"] = $_POST["bloodPressure"];
	$model->obj["resperatoryRate"] = $_POST["resperatoryRate"];
	$model->obj["oxygen"] = $_POST["oxygen"];
	$model->obj["cardiacRate"] = $_POST["cardiacRate"];
	$model->create();

		header('Location: patient-list.php?view=physical-test');
}

function lab_test_add(){

	$model = lab_test();
	$model->obj["appointmentId"] = $_POST["appointmentId"];
	$model->obj["description"] = $_POST["description"];
	$model->obj["dateAdded"] = "NOW()";
	$model->create();

	$appId = $_POST["appointmentId"];
	$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/Pulmonary/pages/lab-test-pdf.php?Id=". $appId;

	$app = appointment()->get("Id=$appId");
	$patient = user()->get("Id=$app->patientId");
	$subject = 'NO REPLY: Lab Test Result';
	$html = 'Good day '. $patient->firstName .',<br><br> Click here to view your lab test result --> <a href="'.$actual_link.'">View</a>';

	smtp_mailer($patient->email, $subject, $html);

	header('Location: lab-test-list.php');
}

function check_up_add(){

	$model = check_up();
	$model->obj["appointmentId"] = $_POST["appointmentId"];
	$model->obj["medication"] = $_POST["medication"];
	$model->obj["findings"] = $_POST["findings"];
	$model->obj["needLab"] = $_POST["needLab"];
	$model->obj["labTestDetail"] = $_POST["labTestDetail"];
	$model->create();

	header('Location: patient-list.php?view=check-up');
}

function appointment_add(){

	$model = appointment();
	$model->obj["appointmentDate"] = $_POST["appointmentDate"];
	$model->obj["appointmentTime"] = $_POST["appointmentTime"];
	$model->obj["purpose"] = $_POST["purpose"];
	$model->obj["doctorId"] = $_POST["doctorId"];
	$model->obj["patientId"] = $_SESSION["user_session"]["Id"];
	$model->obj["dateAdded"] = "NOW()";
	$model->create();

	$userId = $_SESSION["user_session"]["Id"];
	$patient = user()->get("Id=$userId");
  $subject = 'NO REPLY: Appointment confirmation message';
  $html = 'Good day '. $patient->firstName .',<br><br> You have successfully booked an appointment. You will receive another confirmation email once your appointment request is reviewed.<br><br>Thank you.';

  smtp_mailer($patient->email, $subject, $html);

	header('Location: index.php?success=You have successfully booked an appointment.');
}


function doctor_add(){

	$model = doctor();
	$model->obj["firstName"] = $_POST["firstName"];
	$model->obj["lastName"] = $_POST["lastName"];
	$model->obj["specialization"] = $_POST["specialization"];
	$model->create();

	header('Location: doctors.php');
}

function doctor_delete(){

	$Id= $_GET["Id"];
	doctor()->delete("Id=$Id");

	header('Location: doctors.php');
}

function user_add(){
	$username = $_POST["username"];
	$checkUser = user()->count("username='$username'");

	if ($checkUser>=1) {
		header('Location: user-add.php?role='.$_POST["role"].'&error=Username Already Exists');
	}
	else{
			$model = user();
			$model->obj["username"] = $_POST["username"];
			$model->obj["firstName"] = $_POST["firstName"];
			$model->obj["role"] = $_POST["role"];
			$model->obj["phone"] = $_POST["phone"];
			$model->obj["email"] = $_POST["email"];
			$model->obj["lastName"] = $_POST["lastName"];
			$model->obj["password"] = $_POST["password"];
			$model->obj["doctorId"] = $_POST["doctorId"];
			$model->obj["dateAdded"] = "NOW()";
			$model->create();
			header('Location: accounts.php?role=' . $_POST["role"]);
	}
}

function change_app_status(){

	$Id = $_GET["Id"];
	$model = appointment();
	$model->obj["status"] = $_GET["status"];
	$model->update("Id=$Id");

	$app = appointment()->get("Id=$Id");
	$patient = user()->get("Id=$app->patientId");
	$subject = 'NO REPLY: Appointment confirmation message';
	$html = 'Good day '. $patient->firstName .',<br><br> Your booking has already been reviewed. The result is '.$_GET["status"].'.<br><br>Thank you.';

	smtp_mailer($patient->email, $subject, $html);

	header('Location: appointment-detail.php?Id=' . $Id);
}

function appointment_deny(){

	$Id = $_POST["Id"];
	$model = appointment();
	$model->obj["status"] = "Denied";
	$model->obj["denyReason"] = $_POST["denyReason"];
	$model->update("Id=$Id");

	$app = appointment()->get("Id=$Id");
	$patient = user()->get("Id=$app->patientId");
	$subject = 'NO REPLY: Application request DENIED';
	$html = 'Good day '. $patient->firstName .',<br><br> Your booking has been denied. Reason: '.$_POST["denyReason"].'.<br><br>Thank you.';

	smtp_mailer($patient->email, $subject, $html);

	header('Location: appointment-detail.php?Id=' . $Id);
}

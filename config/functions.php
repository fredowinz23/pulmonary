<?php
include "../phpmailer/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$success = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';

function get_query_string($keyword, $default){
	return (isset($_GET[$keyword]) && $_GET[$keyword] != '') ? $_GET[$keyword] : $default;
}

function format_money($value){
	return number_format($value, 2, '.', ',');
}

function format_time_to_12($time){
	return date('h:i a', strtotime($time));
}
/* =====================================Functions===================================== */
function send_message($number,$message){
		$ch = curl_init();
		$itexmo = array('1' => $number, '2' => $message, '3' => 'TR-FREDG563327_4I6RV', 'passwd' => '$]najkmlh!');
		curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($itexmo));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		return curl_exec ($ch);
		curl_close ($ch);
}
/* =====================================Functions===================================== */

/* Send email */
function smtp_mailer($to, $subject, $html){

	$mail = new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com;';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'pulmonaryclinicmanagement@gmail.com';
	$mail->Password   = 'wuiftgcfzmgpopcn';
	$mail->SMTPSecure = 'tls';
	$mail->Port       = 587;

	$mail->setFrom('pulmonaryclinicmanagement@gmail.com', 'Pulmonary Clinic');
	$mail->addAddress($to);

	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $html;
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();


}
/* =====================================Functions===================================== */

/* Retrieve one record */
function uploadFile($uploadedFile){
	// Where the file is going to be placed
	$target_path = "../media/";
	/* Add the original filename to our target path.
	Result is "uploads/filename.extension" */
	// $target_path = $target_path . basename( $uploadedFile['name']);
	$temp = explode(".", $uploadedFile["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	if(move_uploaded_file($uploadedFile['tmp_name'], $target_path . $newfilename)) {
			return $newfilename;
		}
		else{
			return 0;
		}
}
/* Retrieve one record */
function uploadMultipleFile($uploadedFile){
	$filenameList = array();
	$countfiles = count($uploadedFile['name']);
	if ($countfiles>0){
		for($i=0;$i<$countfiles;$i++){
			// File name
		   	$filename = $uploadedFile['name'][$i];
		   	// Get extension
	  		 $ext = explode(".", $filename);
			 	 $newfilename = round(microtime(true)*($i+1)) . '.' . end($ext);
			   if(move_uploaded_file($uploadedFile['tmp_name'][$i],'../../media/'.$newfilename)){
			   		$filenameList[] = $newfilename;
				}
				else{
			   		$filenameList['error'] = true;
				}
		}
			return $filenameList;
	}
	else{
			return false;
	}
}
?>

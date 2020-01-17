<?php 

	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
if( isset($_POST['otpravka_sms'])) {

	$sql = "INSERT INTO message (text, to_user_id, from_user_id  )
			 VALUES ('". $_POST["text"]. "', '" . $_POST["to_user_id"] . "', '". $_POST["from_user_id"]. "' )";
	if (mysqli_query($connect, $sql)) {
	} else {
		echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
	}	
	
} 

$otpravleno_user_id = $_POST["to_user_id"];
 include "modules/message.php";
 ?>
<?php 
include "configs/db.php";

$sql = " DELETE FROM friends WHERE friends. user_1 =". $_COOKIE["user_id"]." 
AND friends. user_2 =" . $_GET["user_id"];
	if(mysqli_query($connect, $sql)) {
		header("Location: /modules/friend_list.php");
	} else{
		echo "<h2>Ошибка</h2>" . mysqli_error($connect);
	}


 ?>
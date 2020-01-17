 <?php 

include "configs/db.php";


if (isset($_GET["user_id"]) && isset($_COOKIE["user_id"])) {
	
	$sql = "INSERT INTO friends (user_1, user_2) 
	VALUES ('". $_COOKIE["user_id"]."','". $_GET["user_id"]."')";
	if(mysqli_query($connect, $sql)){
		
		header("Location: /modules/friend_list.php");
		
	} else {
		echo "<h2>Ошибка</h2>" . mysqli_error($connect);
	}

}
 ?>
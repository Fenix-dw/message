<?php 
include "configs/db.php";

if(
	isset($_POST["email"]) && isset($_POST["password"])
	&& $_POST["email"] != "" && $_POST["password"] != ""
) {
	$sql = "SELECT * FROM polzovateli 
		WHERE email LIKE '". $_POST["email"]."' 
		AND password LIKE '". $_POST["password"]."'";

	$result = mysqli_query($connect, $sql);

	$col_polzovateley = mysqli_num_rows($result);

	if($col_polzovateley == 1) {
		$polzovatel = mysqli_fetch_assoc($result);
		// Создаем куки для хранения данных пользователя
		setcookie("user_id", $polzovatel["id"], time() + 60*60*24);
		header("Location: /");

	} else {
		echo "<h2>Логин или пароль введены не верно!</h2>";
	}
}

 ?>

<!-- id="open_log_out" -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<?php include "chasty_site/shapka.php" ?>

	<div class="modal" id="log-out-modal" style="display: block;">
		<h2>Авторицация</h2>
		<a href="register.php" id="open_registration">Регестрация</a>
		<form action="login.php" method="POST">
			<p>
				Введите свой email:<br/>
				<input type="text" name="email"><br/>
			</p>

			<p>
				Введите свой пароль:<br/>
				<input type="password" name="password">
			</p>
			<p>
				<button type="submit">Войти</button>
			</p>
		</form>
	</div>



</body>
</html>
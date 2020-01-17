<?php 
include "configs/db.php";

if(
	isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) 
	&& $_POST["name"] != "" && $_POST["email"] != "" && $_POST["password"] != ""
) {
	// Вставить в таблицу "название таблицы" ()
	$sql =	"INSERT INTO polzovateli (name ,email,foto,password ) VALUES ('". $_POST["name"] . "','" . $_POST["email"] . "','imges/user.png','". $_POST["password"] . "')";

	if (mysqli_query($connect, $sql)) {
		echo "Пользователь добавлен";
	} else {
		echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);

	}
}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регестрация</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<?php 
		include "chasty_site/shapka.php"; 
	?>

	<div class ="modal" id="registration-modal" style="display: block;">
		<a href="login.php" id="open_login">Авторицация</a>	
		<h2>Регестрация</h2><br/>
		<form action="register.php" method="POST">
			<p>
				Введите свое имя:<br/>
				<input type="text" name="name">
			</p>
			<p>
				Введите свой email:<br/>
				<input type="text" name="email">
			</p>
			<p>
				Введите свой пароль:<br/>
				<input type="password" name="password">
			</p>	
			<p>
				<button type="submit">Зарегестрироваться</button>
			</p>
		</form>
	</div>
</body>
</html>
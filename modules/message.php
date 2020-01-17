<ul>
	<?php 
		include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	// Есле в запросе есть выбраный пользователь
		if(isset($_GET["user"]) || isset($otpravleno_user_id)) {
			$to_user_id = null;

			if(isset($_GET["user"])) {
				$user_id = $_GET["user"];
			} else {
				$user_id = $otpravleno_user_id;
			}
			// Получить все сообщение котоые были отбравлены пользователе
			$sql = "SELECT * FROM message " . // Выбираем все сообщения
					" WHERE (to_user_id=". $user_id .  // ГДЕ id отправляемому пользователю = $_GET["user"]
						" AND from_user_id = " . $_COOKIE["user_id"].") " . // И отправлено от пользователя с id = $_COOKIE["user_id"]
						" OR (to_user_id=" . $_COOKIE["user_id"]. // ИЛИ отправлено рользователю с id = $_COOKIE["user_id"]
						" AND from_user_id=". $user_id . ")";  // И от рользователя с id = $_GET["user"]
			// выполняем sql запрос
			$resultat = mysqli_query($connect, $sql);
			
			$col_message = mysqli_num_rows($resultat);

			$i = 0;			
			while($i < $col_message) {
					
				// mysqli_fetch_assoc - преобразовать полученые данные рользователя в массив
				$message = mysqli_fetch_assoc($resultat);			
				?>
					<li>
						<?php  
							// Вывести имя конкретног пользователя
							$sql = "SELECT * FROM polzovateli WHERE id=". $message["from_user_id"];
							// выполняем запрос
							$polzovatel = mysqli_query($connect,$sql);
							// записываем в переменную масив с данными пользователя
							$polzovatel = mysqli_fetch_assoc($polzovatel);
						?>							
						<div class="avatar">
								<img src=<?php echo $polzovatel["foto"]; ?>>
						</div>										
						<h2><?php echo $polzovatel["name"]; ?></h2>
						<p><?php echo $message["text"]; ?></p>
						<div class="time"><?php echo $message["time"]; ?></div>
					</li>	
				<?php
					
				$i++;
			}
		} else {
			echo "<h2>Пользователь не вибран!</h2>";
		}
	 ?>
</ul> 
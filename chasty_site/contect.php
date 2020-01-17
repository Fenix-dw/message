<?php 
	if(isset($_COOKIE["user_id"])) {
		include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
		?>
	<div id="contect">
		
			
			<div id="users">
			
				
				<form action="http://dingo.net/modules/spisok.php" method="GET" id="poisk">
					<input type="text" name="poisk-text">

					<button>
						<img src="imges/icon-search.png">
					</button>
				</form>

				<div id="spisok">
					<?php 
					/*==================
					Список пользователей
					======================*/
					// include подключить файл
					include "modules/spisok.php";
					 ?>
				</div>
			</div>
			
			<div id="soobsheniya">
				<div id="spisok-soobsheniya">
				<?php  
					// Подключаем блок сообщений
					include "modules/message.php";	
				?>
				</div>
				<?php  
					if (isset($_GET["user"])){
						$sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE['user_id'];
						$result = mysqli_query($connect, $sql); 						
						
						$polzovatel = mysqli_fetch_assoc($result);

				?>
					<form action="http://dingo.net/send_messadge.php" id="form"  method="POST">
						
						<div>
							<img src="<?php echo $polzovatel['foto'] ?>">
						</div>
						<input type="hidden" name="to_user_id" value=<?php		
									echo $_GET["user"]; ?>>
						<input type="hidden" name="from_user_id" value= <?php 
									echo $_COOKIE["user_id"];  ?>>
						<textarea name="text"></textarea>
						
						<button type="submit" id="send">
							<img src="imges/send.png" >
						</button>
						
						<div class="dop">
							<img src="imges/photo.png" >
						</div class="dop">

						<div class="dop">
							<img src="imges/attach.png" >
						</div>

						<div class="dop">
							<img src="imges/emoji.png" >
						</div>
						
					</form>
				<?php 
				} ?>
			</div>	
	
			</div>
<?php 
	} else {
		header("Location: /login.php");
	}
?>
		
	

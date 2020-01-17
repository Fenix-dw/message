<div id="shapka">
		
		<form id="logo" href="/">
			<button type="submit">
				<img src="imges/logo.png"> 
			</button>
			<span>
				<b>Dingo</b><i>Web</i>
			</span>
		</form>

		<div id="menu">
		<?php 
			if(isset($_COOKIE["user_id"])) {
				$sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE["user_id"];
				$result = mysqli_query($connect, $sql);
				$polzovatel = mysqli_fetch_assoc($result);
			?>			
					<a href="#" id="open_contact">Контакты</a>
					<a href="#">Настройки</a>
					<a href="exit.php"><?php echo $polzovatel["name"]; ?> &#187;</a> 
				<?php
			} else {
				?>
				<a href="login.php" id="open_log_out">Войти</a>
				<?php  
			}
			?>
		</div>
	</div>
	<!--  -->
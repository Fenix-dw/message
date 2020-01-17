<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if (isset($_GET["poisk-text"])){
	$sql = "SELECT	* FROM 	polzovateli 
	WHERE id !=". $_COOKIE["user_id"] ." 
	AND name LIKE '%". $_GET["poisk-text"]."%'";
} else {
	$sql = "SELECT	* FROM 	polzovateli 
	WHERE id !=". $_COOKIE["user_id"];
}
// Выполнить sql к базе данных
$result = mysqli_query($connect, $sql);

// mysqli_num_rows - получить количество результатов
$col_polzovateley = mysqli_num_rows($result);

 ?>



				
	<ul>
		<?php  
			// $i - счетчик для подсчета количества пользователей
			$i = 0;
			
			//  пока в переменной i хранится значение менше чем количество пользователей
			while($i < $col_polzovateley) {
				// mysqli_fetch_assoc - преобразовать полученые данные рользователя в массив
				$polzovatel = mysqli_fetch_assoc($result);

					?>
					
					<li>
						<a href='/index.php?user="<?php echo $polzovatel["id"]; ?>"'>
							<div class="avatar">
								 <img src='<?php echo $polzovatel["foto"]; ?>'>
							</div>
							<h2><?php echo $polzovatel["name"]; ?></h2>
							<p>HI</p>
							<div class="time">09:10</div>
						</a>			
					</li>	

					<?php 	
						
				//  Увеличевание счечика
				$i++;
			}
		?>
	</ul>



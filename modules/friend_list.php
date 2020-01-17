<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
// Возращает HTML с пользователями 
$sql = "SELECT	* FROM 	polzovateli WHERE id !=". $_COOKIE["user_id"];
// Выполнить sql к базе данных
$result = mysqli_query($connect, $sql);

// mysqli_num_rows - получить количество результатов
$col_polzovateley = mysqli_num_rows($result);
  
	// $i - счетчик для подсчета количества пользователей
	$i = 0;
	
	//  пока в переменной i хранится значение менше чем количество пользователей
	while($i < $col_polzovateley) {
		// mysqli_fetch_assoc - преобразовать полученые данные рользователя в массив
		$polzovatel = mysqli_fetch_assoc($result);
			?>
			
			<li >
				<a href='/index.php?user="<?php echo $polzovatel["id"]; ?>"'>
					<div class="avatar">
						 <img src='<?php echo $polzovatel["foto"]; ?>'>
					</div>
					<h2><?php echo $polzovatel["name"]; ?></h2>
				</a>
				<?php 
					$sql = "SELECT * FROM friends 
					WHERE user_1=" . $polzovatel["id"]. " 
					AND user_2=" . $_COOKIE["user_id"]. " 
					OR user_2=" . $polzovatel["id"]. "
					AND user_1=" . $_COOKIE["user_id"];

					$friendsResult = mysqli_query($connect, $sql);
					$col_friends = mysqli_num_rows($friendsResult);

					if($col_friends > 0){
						?>
						<a data-link="http://dingo.net/delete_friend.php?user_id=<?php  echo $polzovatel["id"]?>" onclick="addFriend(this)">Удалить из друзей -</a>
						<?php 
					} else{
						?>
						<a data-link="http://dingo.net/add_friend.php?user_id=<?php  echo $polzovatel["id"]?>" onclick="addFriend(this)" >Добавить в друзья +</a>
						<?php 
					}
				 ?>
			</li>	
<?php 	
		//  Увеличевание счечика
		$i++;
	}
?>

<?php 
require "config.php";

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?php echo $config['title']; ?></title>
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<body>

	<div class="wrapper">
		<?php 
if (isset($_SESSION['logged_user']) ) {
?> 
<span class="non-login">Вы авторизованы!</span>
		<!--Привет, <?php echo $_SESSION['logged_user']->login; ?>-->
		<a class="link" href="/logout.php">Выйти</a>
		<div class="contant">
			<iframe name='chatWindow' id='chatWindow' src='iframe.php'>Чатик</iframe>
			<form class="form" action='iframe.php' method='post' target='chatWindow'>
			<input class="input" type='text' name='message' placeholder="Введите текст сообщения">
			<button class="button" type='submit' name="do_iframe">Отправить</button>
		<?php 
}else{
?> <div class="wrapper-link">
			<a class="link" href="/login.php">Авторизация</a>
			<a class="link" href="/signup.php">Регистрация</a>
			<!-- <a class="link" href="/logout.php">Выйти</a> -->
</div>
<?php
}
?>
	</form>	
  </div>	
</div>


</body>
</html>

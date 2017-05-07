<?php 
require "includes/config.php";
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
		<a class="link" href="/logout.php">Выйти</a>
		<div class="contant">
			<iframe name='chatWindow' id='chatWindow' src='iframe.php'>Чатик</iframe>
			<form id="form" name="form" class="form" action='iframe.php' method='post' target='chatWindow'>
			<input id="input" class="input" type='text' name='message' placeholder="Введите текст сообщения" value=" ">
			<button class="button" type='submit' name="do_iframe">Отправить</button>
			</form>	
	<div class="tmp"></div>
  </div>	
		<?php 
}else{
?> 
<div class="wrapper-link">
			<a class="link" href="/login.php">Авторизация</a>
			<a class="link" href="/signup.php">Регистрация</a>
			
</div>
<?php
}
?>
	
</div>
</body>
</html>

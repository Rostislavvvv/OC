<?php 

require "config.php"; 

	$data = $_POST;
	if ( isset($data['do_login']) )
	{	
		$errors = array();
		$user =  R::findOne('users', 'login = ?', array($data['login']));
		if ( $user) 
		{	
			
			//логин существует
			if ($data['password'] == '') 
			{
				$errors[] = 'Введите пароль!';
			}
			if (  password_verify($data['password'], $user->password))
			{
				//пароль совпадает
				$_SESSION['logged_user'] = $user;
				//echo '<div style="color: green;">Вы авторизованы!<br>Можете перейти на<a href="/"> главную страницу!</a></div><hr>';
				header('Location: chat.php');
			}else
			{
				$errors[] = 'Невернно введен пароль!';
			}
		} else
			{
				$errors[] = 'Пользователя с таким лоинм не существует!';
			}
			if ( ! empty($errors) )
			{
				echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
			}
	}
	
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/user.css">
</head>
<body>
<form class="form" action="login.php" method="POST">
	
	
<div class="login">
	<p><strong>Логин:</strong></p>
	<input class="input-login" type="text" name="login" value="<?php echo @$data['login']; ?>">
</div>

<div class="login">
	<p><strong>Ваш пароль:</strong></p>
	<input class="input-login" type="password" name="password">
</div>

<div class="login">
	<button class="button" type="submit" name="do_login">Войти</button>
</div>
</form>

</body>
</html>
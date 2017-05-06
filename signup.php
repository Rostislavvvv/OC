<?php 

require "config.php"; 




	$data = $_POST;
	if ( isset($data['do_signup']) )
	{
		$errors = array();
		if ( trim($data['login']) == '') 
		{
			$errors[] = 'Введите логин!';
		}
		if ( trim($data['email']) == '')
		{
			$errors[] = 'Введите Email!';
		}
		if ( $data['password'] == '') 
		{
			$errors[] = 'Введите пароль!';
		}
		if ( $data['password_2'] != $data['password']) 
		{
			$errors[] = 'Повторный пароль введен не верно!';
		} 
		if (R::count('users', "login = ?", array($data['login'] )) > 0 )
		 {
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
		if (R::count('users', "email = ?", array($data['email'] )) > 0 )
		 {
			$errors[] = 'Такой email  уже существует!';
		}
		if ( empty($errors) ) 
		{
			// все хорошо, регистрируем;

			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'],PASSWORD_DEFAULT);
			
			//echo '<div style="color: green;">Вы успешно зарегестрированы!<br>Можете перейти на<a href="/"> главную страницу!</a></div><hr>';
			header('Location: chat.php');
		} else
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
<form class="form" action="/signup.php" method="POST">
	
<div>
	<p><strong>Ваш логин:</strong></p>
	<input class="input" type="text" name="login" value="<?php echo @$data['login']; ?>">
</div>

<div>
	<p><strong>Ваш Email:</strong></p>
	<input class="input" type="email" name="email"  value="<?php echo @$data['email']; ?>">
</div>

<div>
	<p><strong>Ваш пароль</strong>:</p>
	<input class="input" type="password" name="password">
</div>

<div>
	<p><strong>Ваш ваш пароль еще раз</strong>:</p>
	<input class="input" type="password" name="password_2">
</div>

<div>
	<button class="button" type="submit" name="do_signup">Зарегистрироваться</button>
</div>

</form>

</body>
</html>
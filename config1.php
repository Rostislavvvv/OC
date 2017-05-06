<?php



$config = array(
	'title' => 'Slider',
	
	'db' => array(
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'name' => 'chat_test'
		)
);

$connection = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['name']
); 

if ( $connection == false)
{
	echo 'Не удалось подключиться к базе данных!<br>';
	echo mysqli_connect_error();
	exit();
}
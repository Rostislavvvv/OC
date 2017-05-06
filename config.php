<?php
require "libs/rb.php";
R::setup('mysql:host=localhost;dbname=chat_test','root','');
/*require "db.php";
$config = array(
	'title' => 'Chat',
	
	'db' => array(
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'name' => 'chat_test'
		)
);

*/

session_start();
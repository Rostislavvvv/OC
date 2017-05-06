<?php 

include "config.php";
require "config1.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/user.css">
</head>
<!--<script type="text/javascript">
setTimeout("window.location.reload()",5000);//Iaiiaeaiea ?ac a 5 naeoia
</script>-->
<?php

$data = $_POST;
if(isset($_POST['do_iframe'])){
  //$sql = "insert into `messages` (`message`) values ('".$_POST['message']."')";
 $sql = R::dispense( 'message' );
 $sql->message=$data['message'];
 $sql->login = $_SESSION['logged_user']['login'];
 
R::store($sql); /*mysqli_query($connection,"INSERT INTO `message` (`message`) VALUES ('".$_POST['message']."')");*/
echo $sql;
}
//$sql = "select `message` from `messages` where 1 order by id desc";

$res = mysqli_query($connection,"SELECT * FROM `message` WHERE 1 ORDER BY id");
//$res = R::load('message', $sql);
$cat = mysqli_fetch_array($res);
var_dump($cat);
echo '<hr>';
$res = R::getRow("SELECT * FROM `message`  WHERE 1 ORDER BY id");
$ms = mysqli_fetch_array($res);
var_dump($ms);	







//("<div>%s</div>",$cat->login);
//echo $cat['message'];

// if (   $cat['login'] == $tmp ) 
// {
// 	echo "TEXT";
// }
// else{
// 	echo"NO MESSAGE";
// }
// echo '<div class="chat-text-position-right">' . '<span class="message-right">' . $cat['message']  . ':' . '</span>'  . '<span>' . $cat['login'] . '</span>' . '<br>' . '</div>';
//$res = R::getAll("SELECT * FROM `message` WHERE 1 ORDER BY id");
//printf($res);
//while($res){
 ?>

<!-- <div class="overview-commit"> 
<div class="commit-autor"> 
<span class="commit-autor-name"><?php echo $cat['login']; /*$res->login*/ /*$cat['login']*/?></span> 
<span class="commit-autor-date">13 октября 2011</span> 
</div> 
<div class="overview-commit-background"> 
<div class="overview-commit-triangle"></div> 
<span class="overview-commit-text"><?php echo $cat['message'];/*$res->message;*/ /*$cat['message']*/?></span> 
</div> 
</div>
 -->
<!-- <?php 

?> 
 -->

<body>
<script type="text/javascript"> 
// function ready(){ 
// window.scrollTo(99999,99999) 
// } 
// document.addEventListener("DOMContentLoaded", ready);
</script>
</body>
</html>
<?php 

require "includes/config.php";
//require "includes/config1.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/user.css">
</head>

<?php
$data = $_POST;
if(isset($_POST['do_iframe'])){
 $sql = R::dispense( 'message' );
 $sql->message=$data['message'];
 $sql->login = $_SESSION['logged_user']['login'];
 R::store($sql); 
}

$id_count = R::exec("SELECT * FROM `message`");// $res = mysqli_query($connection,"SELECT * FROM `message` ORDER BY id");
$tmp = R::getAll("SELECT * FROM `message`");

for ($i=0; $i < $id_count ; $i++) { // while($cat = mysqli_fetch_array($res)){
 ?>

<div class="overview-commit"> 
<div class="commit-autor"> 
<span class="commit-autor-name"><?php echo $tmp[$i]['login'];//$cat['login']?></span> 
<span class="commit-autor-date"><?php echo $tmp[$i]['puddate'];?></span> 
</div> 
<div class="overview-commit-background"> 
<div class="overview-commit-triangle"></div> 
<span class="overview-commit-text"><?php echo $tmp[$i]['message'];//$cat['message']?></span> 
</div> 
</div>

<?php 
}
?> 

<body>

<script type="text/javascript"> 
 function ready(){ 
 window.scrollTo(99999,99999) 
 } 
 document.addEventListener("DOMContentLoaded", ready);
</script>

</body>
</html>
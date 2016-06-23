<?php
if(isset($_POST['postar'])){
	//extract($_POST);
	require_once('socket.class.php');
	$class = new socket();
	$class->postar($_POST['msg'], $_POST['usuario']); 
}
?>


<form method="post">
	<input type="text" name="usuario" value="Firefox" readondy="true"/><br>
	<textarea name="msg"></textarea><br>
	<input type="submit" name="postar" /><br>
</form>

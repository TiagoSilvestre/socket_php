<?php
require_once('socket.class.php');

$class = new socket();

//$logar = $class->conn();
$iniciar = $class->iniciar();
$cliente = $class->cliente();


for($b = 0; $b < 8192; $b++){
	socket_write($cliente, ' ');
	$lastid = 0;
}

while(TRUE){
	sleep(1);
	$sql = "SELECT `id`, `msg`, `hora`, `usuario` FROM `msg` WHERE `id` > ? ORDER BY `id` ASC";
	$query = $class->conn()->prepare($sql);
	$query->execute(array($lastid));

	if($query->rowCount() > 0){
		echo "Mensagem lida com sucesso".PHP_EOL;
		while($i = $query->fetch()){
			socket_write($cliente, PHP_EOL.$i['hora'].' - '.$i['usuario'].' disse: '.$i['msg'] );
			$lastid = $i['id'];
		}
	}
}

$class->fechar();
?>

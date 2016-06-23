<?php
require_once('conexao.class.php');

class socket extends conexao{


	function iniciar(){
		self::$sok = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); //cria o socket
		socket_set_option(self::$sok, SOL_SOCKET, SO_REUSEADDR, 1);
		socket_bind(self::$sok, "172.16.10.119" , 9000); //Vincula a o ip e a porta ao socket
		socket_listen(self::$sok);	
		echo "Servidor foi iniciado com sucesso".PHP_EOL;
	}
	
	function cliente(){
		$cliente = socket_accept(self::$sok);// essa funçao aceita entradas de conexao 
		echo "Cliente se conectou".PHP_EOL;
		return $cliente;
	}

	function postar($msg, $usuario){
		//$msg = addslashes(strip_tags(trim($msg)));
		$sql = "INSERT INTO `msg` SET `msg`=?, `usuario`=?, `hora`=NOW()";
		$query = self::conn()->prepare($sql);
		self::$pdo->query("SET NAMES `utf8`");
		$query->execute(array($msg, $usuario));
	}

	function fechar(){
		socket_close(self::cliente());
		socket_close(self::$sok);	
	}

}

?>

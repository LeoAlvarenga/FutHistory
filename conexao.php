<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "futhistory";
	
	//criar conexão
	$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
	
	//checar a conexão
	if(!$conn) {
		die("falha na conexão:" . mysqli_connect_error());
	} else {
		echo "conexão realizada com sucesso";
	}

?>
<?php

	include 'db.php';
	$nome = $_POST['nome_cliente'];
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];
	$senha = $_POST['senha'];
	date_default_timezone_set('America/Fortaleza');
	$data = time();
	$data = date('Y-m-d');
	
	$query_email = "SELECT email_cliente from cliente where email_cliente = '$email'";
	$consulta_email = mysqli_query($conexao,$query_email);
	if(mysqli_num_rows($consulta_email)==0){
		$query = "INSERT INTO cliente (nome_cliente, endereco_cliente, data_cadastro_cliente,  email_cliente,senha_cliente) VALUES ('$nome','$endereco','$data', '$email',$senha)";
		mysqli_query($conexao,$query);
		header('location:index.php');
 	}
 	else {
 		header('location:index.php?cadastro&falha');
 	}

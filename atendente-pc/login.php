<?php


include 'db.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuarios WHERE login_usuario = '$usuario' and senha_usuario = $senha";

$consulta = mysqli_query($conexao,$query);


if (mysqli_num_rows($consulta) == 1){
	session_start();
	$_SESSION['usuario'] = $usuario;
	$_SESSION['login'] = true;	
	header('location:index.php');
} else {
	echo "falha";
}
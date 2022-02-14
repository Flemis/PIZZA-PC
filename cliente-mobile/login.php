<?php


include 'db.php';

$cliente = $_POST['email_cliente'];
$senha = $_POST['senha_cliente'];

$query = "SELECT * FROM cliente WHERE email_cliente = '$cliente' and senha_cliente = $senha";
$consulta = mysqli_query($conexao,$query);
$linha = mysqli_fetch_Array($consulta);
$linha = $linha['id_cliente'];

if (mysqli_num_rows($consulta) == 1){
	session_start();
	$_SESSION['cliente'] = $cliente;
	$_SESSION['id_cliente'] = $linha;
	$_SESSION['login_cliente'] = true;	
	header('location:index.php');
} else {
	echo "falha";
}
<?php


include 'db.php';

$usuario = $_POST['usuario_garcom'];
$senha = $_POST['senha_garcom'];

$query = "SELECT * FROM garcom WHERE usuario_garcom = '$usuario' and senha_garcom = $senha";
$consulta = mysqli_query($conexao,$query);
$linha = mysqli_fetch_Array($consulta);
$linha = $linha['id_garcom'];

if (mysqli_num_rows($consulta) == 1){
	session_start();
	$_SESSION['garcom'] = $usuario;
	$_SESSION['id_garcom'] = $linha;
	$_SESSION['login_garcom'] = true;	
	header('location:index.php');
} else {
	echo "falha";
}
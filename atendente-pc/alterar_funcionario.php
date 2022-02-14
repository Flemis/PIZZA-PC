<?php

include 'db.php';

$id_funcionario = $_POST['id_funcionario'];
$nome_funcionario = $_POST['nome_funcionario'];
$idade = $_POST['idade_funcionario'];
$cargo = $_POST['cargo_funcionario'];
$salario = $_POST['salario'];
			
$query_funcionario = "UPDATE funcionario SET nome_funcionario = '$nome_funcionario', idade_funcionario = $idade, cargo_funcionario = '$cargo', salario = $salario WHERE id_funcionario = $id_funcionario ";


mysqli_query($conexao,$query_funcionario);

header('location:index.php?pagina=quadro_funcionarios');


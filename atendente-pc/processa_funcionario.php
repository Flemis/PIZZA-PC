<?php

include 'db.php';

$nome_funcionario = $_POST['nome_funcionario'];
$idade = $_POST['idade_funcionario'];
$cargo = $_POST['cargo_funcionario'];
$salario = $_POST['salario'];
			
$query_funcionario = "INSERT INTO funcionario (nome_funcionario, idade_funcionario, cargo_funcionario, salario) VALUES ('$nome_funcionario', $idade, '$cargo', $salario)";

mysqli_query($conexao,$query_funcionario);

header('location:index.php?pagina=quadro_funcionarios');

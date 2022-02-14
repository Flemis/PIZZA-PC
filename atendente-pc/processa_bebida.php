<?php

include 'db.php';
$nome_bebida = $_POST['nome_bebida'];
$preco = $_POST['preco_bebida'];

if (!$preco) {
	$preco = 0.0;
}

$query = "INSERT INTO bebida(nome_bebida, preco_bebida) VALUES ('$nome_bebida',$preco)";

mysqli_query($conexao,$query);


header('location:index.php?pagina=cardapio_bebida');
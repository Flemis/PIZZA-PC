<?php

include 'db.php';
$nome_sobremesa = $_POST['nome_sobremesa'];
$preco = $_POST['preco_sobremesa'];

if (!$preco) {
	$preco_P = 0.0;
}

$query = "INSERT INTO sobremesa(nome_sobremesa, preco_sobremesa) VALUES ('$nome_sobremesa',$preco)";

mysqli_query($conexao,$query);


header('location:index.php?pagina=cardapio_sobremesa');
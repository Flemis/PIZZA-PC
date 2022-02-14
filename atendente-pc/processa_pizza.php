<?php

include 'db.php';
$nome_pizza = 'Pizza '.$_POST['nome_pizza'];
$preco_P = $_POST['PRECO_P'];
$preco_M = $_POST['PRECO_M'];
$preco_G = $_POST['PRECO_G'];


$query = "INSERT INTO pizza(nome_pizza, preco_P,preco_M,preco_G) VALUES ('$nome_pizza',$preco_P,$preco_M,$preco_G)";

mysqli_query($conexao,$query);


header('location:index.php?pagina=cardapio');
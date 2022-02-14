<?php


include 'db.php';
$id_produto = $_POST['id_pizza'];
$nome_produto = $_POST['nome_pizza'];
$preco_P = $_POST['PRECO_P'];
$preco_M = $_POST['PRECO_M'];
$preco_G = $_POST['PRECO_G'];


$query = "UPDATE pizza SET nome_pizza = '$nome_produto', preco_P = $preco_P, preco_M = $preco_M, preco_G = $preco_G WHERE id_pizza = $id_produto ";

mysqli_query($conexao, $query);

header('location:index.php?pagina=cardapio');



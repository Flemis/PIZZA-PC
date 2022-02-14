<?php


include 'db.php';
$id_sobremesa = $_POST['id_sobremesa'];
$nome_sobremesa = $_POST['nome_sobremesa'];
$preco = $_POST['preco_sobremesa'];


$query = "UPDATE sobremesa SET nome_sobremesa = '$nome_sobremesa', preco_sobremesa = '$preco'  WHERE id_sobremesa = $id_sobremesa ";

mysqli_query($conexao, $query);

header('location:index.php?pagina=cardapio_sobremesa');



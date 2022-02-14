<?php


include 'db.php';
$id_bebida = $_POST['id_bebida'];
$nome_bebida = $_POST['nome_bebida'];
$preco = $_POST['preco_bebida'];


$query = "UPDATE bebida SET nome_bebida = '$nome_bebida', preco_bebida = '$preco'  WHERE id_bebida = $id_bebida ";

mysqli_query($conexao, $query);

header('location:index.php?pagina=cardapio_bebida');



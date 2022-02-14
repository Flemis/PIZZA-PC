<?php


include 'db.php';

$id_bebida = $_GET['id_bebida'];

$query = "DELETE FROM bebida WHERE id_bebida = $id_bebida ";

mysqli_query($conexao, $query);

header('location:index.php?pagina=cardapio_bebida');


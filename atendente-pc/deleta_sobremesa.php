<?php


include 'db.php';

$id_sobremesa = $_GET['id_sobremesa'];

$query = "DELETE FROM sobremesa WHERE id_sobremesa = $id_sobremesa ";

mysqli_query($conexao, $query);

header('location:index.php?pagina=cardapio_sobremesa');


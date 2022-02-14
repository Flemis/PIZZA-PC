<?php


include 'db.php';

$id_pizza = $_GET['id_pizza'];

$query = "DELETE FROM pizza WHERE id_pizza = $id_pizza ";

mysqli_query($conexao, $query);

header('location:index.php?pagina=cardapio');


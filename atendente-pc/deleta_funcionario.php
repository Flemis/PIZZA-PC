<?php

include 'db.php';

$id_funcionario = $_GET['id_funcionario'];

$query_funcionario = "DELETE FROM FUNCIONARIO WHERE id_funcionario = $id_funcionario";

mysqli_query($conexao, $query_funcionario);

header('location:index.php?pagina=quadro_funcionarios');
<?php

include 'db.php';

$recibo = $_POST['id_recibo'];
$data = $_POST['data_recibo'];

$date = str_replace('/', '-', $data);
$data = date('Y-m-d', strtotime($date));

$query_total = "UPDATE recibo SET data_recibo = '$data' WHERE id_recibo = $recibo";
mysqli_query($conexao, $query_total);



<?php
	include 'db.php';

	$metodo = $_POST['metodo'];
	$preco = $_POST['total'];
	$mesa = $_POST['mesa'];
	$current_mesa = '';


	while ($linha_mesa = mysqli_fetch_array($consulta_mesa)) {
		if ($linha_mesa['id_mesa'] == $mesa) {
			$current_mesa = $linha_mesa;
		}
	}

	if ($metodo == "CARTÃO CRÉDITO") {
		$metodo = "cartao credito";
	}
	if ($metodo == "CARTÃO DÉBITO") {
		$metodo = "cartao dedito";
	}

	$query = "INSERT INTO recibo (mesa_recibo, total, metodo_pagamento) 
	VALUES ($current_mesa[0],$preco,'$metodo')";

	mysqli_query($conexao,$query);

	$exclude_query = " DELETE FROM pedido WHERE id_mesa = $current_mesa[0]";

	mysqli_query($conexao,$exclude_query);

	$update_query = "UPDATE mesa SET estado_mesa = 1 WHERE id_mesa = $current_mesa[0]";

	mysqli_query($conexao,$update_query);

	$update_query = "UPDATE mesa SET nome_cliente = null WHERE id_mesa = $current_mesa[0]";

	mysqli_query($conexao,$update_query);

	$update_query = "UPDATE mesa SET id_garcom = null WHERE id_mesa = $current_mesa[0]";

	mysqli_query($conexao,$update_query);

	header('location:index.php?pagina=pedidos');




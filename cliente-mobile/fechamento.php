<?php

	include 'db.php';

	$pagamento = $_POST['pagamento'];
	$cliente = $_POST['cliente'];
	$conjunto = 0;
	$query = "SELECT * FROM pedido_online_cesta WHERE id_cliente = $cliente";
	mysqli_query($conexao,$query);
	$consulta = mysqli_query($conexao,$query);

	$query2 = "SELECT * FROM pedido_online WHERE id_cliente = $cliente";
	mysqli_query($conexao,$query2);
	$consulta2 = mysqli_query($conexao,$query2);

	if (mysqli_num_rows($consulta2) == 0)
		$conjunto = 1;
	else{
		while($linha = mysqli_fetch_array($consulta2)){
			if ($linha['conjunto'] >= $conjunto) {
				$conjunto = $linha['conjunto'];
				$conjunto++;
			}
		}
	}
	

	mysqli_data_seek($consulta, 0);

	while($linha = mysqli_fetch_array($consulta)){
		$id_cliente = $linha['id_cliente'];
		$id_pizza = $linha['id_pizza'];
		$id_bebida = $linha['id_bebida'];
		$id_sobremesa = $linha['id_sobremesa'];

		if ($id_pizza == null and $id_bebida == null) {

			$insert_query = "INSERT INTO pedido_online (id_cliente,conjunto,id_pizza,id_bebida,id_sobremesa,metodo_pagamento) VALUES ($id_cliente, $conjunto, null, null, $id_sobremesa,'$pagamento')";

			mysqli_query($conexao,$insert_query);
		}
		elseif ($id_sobremesa == null and $id_bebida == null) {

			$tam = $linha['pizza_tam'];
			$insert_query = "INSERT INTO pedido_online (id_cliente,conjunto,id_pizza,pizza_tam,id_bebida,id_sobremesa,metodo_pagamento) VALUES ($id_cliente,$conjunto, $id_pizza,$tam, null, null,'$pagamento')";

			mysqli_query($conexao,$insert_query);
		}
		elseif ($id_pizza == null and $id_sobremesa == null) {

			$insert_query = "INSERT INTO pedido_online (id_cliente,conjunto,id_pizza,id_bebida,id_sobremesa,metodo_pagamento) VALUES ($id_cliente,$conjunto, null, $id_bebida, null,'$pagamento')";

			mysqli_query($conexao,$insert_query);
		}

	}
	$query_exclude = "DELETE FROM pedido_online_cesta WHERE id_cliente = $cliente";

	mysqli_query($conexao,$query_exclude);

	header('location:index.php?pagina=cesta');	

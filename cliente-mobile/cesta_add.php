<?php
	
	include 'db.php';
	
	$cliente = $_POST['cliente'];
	$produto = $_POST['product'];
	$id = $_POST['id_produto'];

	echo $cliente;
	echo $produto;
	echo $id;

	if ($produto == 'pizza'){

		$tam = $_POST['tamanho'];
		$query_pizza = "SELECT * FROM pizza WHERE id_pizza = $id";

		$consulta_pizza = mysqli_query($conexao,$query_pizza);

		$linha = mysqli_fetch_array($consulta_pizza);

		if ($tam == $linha['preco_P']){
			$tam = 1;
		} elseif ($tam == $linha['preco_M']) {
			$tam = 2;
		} elseif ($tam == $linha['preco_G']) {
			$tam = 3;
		}

		$query = "INSERT INTO pedido_online_cesta (id_cliente, id_pizza,pizza_tam) VALUES ($cliente,$id,$tam)";

		mysqli_query($conexao,$query);
	}

	if ($produto == 'bebida') {

		$query = "INSERT INTO pedido_online_cesta (id_cliente, id_bebida) VALUES ($cliente,$id)";

		mysqli_query($conexao,$query);
	}

	if ($produto == 'sobremesa') {

		$query = "INSERT INTO pedido_online_cesta (id_cliente, id_sobremesa) VALUES ($cliente,$id)";

		mysqli_query($conexao,$query);
	}

	header('location:index.php?pagina=cardapio');


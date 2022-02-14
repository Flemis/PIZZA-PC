<?php
	
	include 'db.php';
	session_start();
	$mesa = $_SESSION['mesa'];
	$produto = $_POST['product'];
	$id = $_POST['id_produto'];
	$garcom = $_SESSION['id_garcom'];

	echo $mesa;
	echo $garcom;
	echo $id;
	echo $produto;
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

		$query = "INSERT INTO pedido_mesa_cesta (id_mesa, id_pizza,pizza_tam,id_garcom) VALUES ($mesa,$id,$tam,$garcom)";

		mysqli_query($conexao,$query);
	}

	if ($produto == 'bebida') {

		$query = "INSERT INTO pedido_mesa_cesta (id_mesa, id_bebida,id_garcom) VALUES ($mesa,$id,$garcom)";

		mysqli_query($conexao,$query);
	}

	if ($produto == 'sobremesa') {

		$query = "INSERT INTO pedido_mesa_cesta (id_mesa, id_sobremesa,id_garcom) VALUES ($mesa,$id,$garcom)";

		mysqli_query($conexao,$query);
	}

	header('location:index.php?pagina=cardapio');


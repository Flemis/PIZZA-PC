<?php 
	$id_garcom = $_SESSION['id_garcom'];
	$id_mesa = $_SESSION['mesa'];
	$cliente = $_SESSION['client'];
	
	$query = "SELECT * FROM pedido_mesa_cesta WHERE id_mesa = $id_mesa";
	$consulta = mysqli_query($conexao,$query);	

	while($linha = mysqli_fetch_array($consulta)){
		$id_pizza = $linha['id_pizza'];
		$id_bebida = $linha['id_bebida'];
		$id_sobremesa = $linha['id_sobremesa'];


		if ($id_pizza == null and $id_bebida == null) {
			$insert_query = "INSERT INTO pedido (id_pizza,id_bebida,id_sobremesa,id_mesa,garcom) VALUES (null, null,$id_sobremesa,$id_mesa,$id_garcom)";

			mysqli_query($conexao,$insert_query);
		}
		elseif ($id_sobremesa == null and $id_bebida == null) {
			$tam = $linha['pizza_tam'];
			$insert_query = "INSERT INTO pedido(id_pizza,pedido_pizza_tam,id_bebida,id_sobremesa,id_mesa,garcom) VALUES ($id_pizza,$tam, null, null,$id_mesa,$id_garcom)";

			mysqli_query($conexao,$insert_query);
		}
		elseif ($id_pizza == null and $id_sobremesa == null) {

			$insert_query = "INSERT INTO pedido (id_pizza,id_bebida,id_sobremesa,id_mesa,garcom) VALUES (null, $id_bebida, null,$id_mesa,$id_garcom)";
 
			mysqli_query($conexao,$insert_query);
		}

	}
	$query_exclude = "DELETE FROM pedido_mesa_cesta WHERE id_mesa = $id_mesa";

	mysqli_query($conexao,$query_exclude);	

	$query = "UPDATE mesa SET estado_mesa = 0 WHERE id_mesa = $id_mesa";
	$query2 = "UPDATE mesa SET nome_cliente = '$cliente' WHERE id_mesa = $id_mesa";
	$query3 = "UPDATE mesa SET id_garcom = $id_garcom WHERE id_mesa = $id_mesa";

	mysqli_query($conexao,$query);
	mysqli_query($conexao,$query2);
	mysqli_query($conexao,$query3);

	unset($_SESSION['mesa']);
	unset($_SESSION['client']);

	header('location:index.php?pagina=cardapio');
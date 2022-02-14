<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	
	include 'db.php';

	session_start();
	
	if (isset($_GET['id_pizza'])) {
		$id_pizza = $_GET['id_pizza'];
		$id_pom = $_GET['id_pom'];
		$id_mesa = $_SESSION['mesa'];
		echo $id_mesa;

		$query = "DELETE FROM pedido_mesa_cesta where id_pizza = $id_pizza and id_pom = $id_pom and id_mesa = $id_mesa";

		mysqli_query($conexao,$query);
	}
	elseif (isset($_GET['id_bebida'])) {
		$id_bebida = $_GET['id_bebida'];
		$id_pom = $_GET['id_pom'];
		$id_mesa = $_SESSION['mesa'];

		$query = "DELETE FROM pedido_mesa_cesta where id_bebida = $id_bebida and id_pom = $id_pom and id_mesa = $id_mesa";

		mysqli_query($conexao,$query);
	}
	elseif (isset($_GET['id_sobremesa'])) {
		$id_sobremesa = $_GET['id_sobremesa'];
		$id_pom = $_GET['id_pom'];
		$id_mesa = $_SESSION['mesa'];

		$query = "DELETE FROM pedido_mesa_cesta where id_sobremesa = $id_sobremesa and id_pom = $id_pom and id_mesa = $id_mesa";

		mysqli_query($conexao,$query);
	}

	header('location:index.php?pagina=cesta');

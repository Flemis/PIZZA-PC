<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	
	include 'db.php';

	session_start();
	
	if (isset($_GET['id_pizza'])) {
		$id_pizza = $_GET['id_pizza'];
		$id_poc = $_GET['id_poc'];
		$id_cliente = $_SESSION['id_cliente'];

		$query = "DELETE FROM pedido_online_cesta where id_pizza = $id_pizza and id_poc = $id_poc and id_cliente = $id_cliente";

		mysqli_query($conexao,$query);
	}
	elseif (isset($_GET['id_bebida'])) {
		$id_bebida = $_GET['id_bebida'];
		$id_poc = $_GET['id_poc'];
		$id_cliente = $_SESSION['id_cliente'];

		$query = "DELETE FROM pedido_online_cesta where id_bebida = $id_bebida and id_poc = $id_poc and id_cliente = $id_cliente";

		mysqli_query($conexao,$query);
	}
	elseif (isset($_GET['id_sobremesa'])) {
		$id_sobremesa = $_GET['id_sobremesa'];
		$id_poc = $_GET['id_poc'];
		$id_cliente = $_SESSION['id_cliente'];

		$query = "DELETE FROM pedido_online_cesta where id_sobremesa = $id_sobremesa and id_poc = $id_poc and id_cliente = $id_cliente";

		mysqli_query($conexao,$query);
	}

	header('location:index.php?pagina=cesta');

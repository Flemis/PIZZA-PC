<?php 
	include 'db.php';
	
	session_start();
	
	include 'header.php';



	if(isset($_SESSION['login_garcom'])){
		if(isset($_GET['pagina'])){
			$pagina = $_GET['pagina'];
		}
			else{
			$pagina = 'cardapio';
		}

	} else {
		$pagina = 'home'; 
	}

	switch ($pagina) {
		case 'login': include 'views/login.php';
			break;
		case 'cardapio': include 'views/cardapio_pizza.php';
			break;
		case 'cardapio_sobremesa': include 'views/cardapio_sobremesa.php';
			break;
		case 'cardapio_bebida': include 'views/cardapio_bebida.php';
			break;	
		case 'add_pizza': include 'views/add_pizza.php';
			break;
		case 'cesta': include 'views/cesta.php';
			break;
		case 'add_bebida': include 'views/add_prep_bebida.php';
			break;
		case 'add_sobremesa': include 'views/add_prep_sobremesa.php';
			break;
		case 'fecha_cesta': include 'views/fecha_cesta.php';
			break;
		case 'mesas': include 'views/mesas.php';
			break;
		case 'mesa': include 'views/mesa.php';
			break;
		case 'abre_mesa': include 'views/abre_mesa.php';
			break;
		default: include 'home.php'; 
			break;
	}

	include 'footer.php';

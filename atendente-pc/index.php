<?php 
	include 'db.php';
	
	session_start();
	
	include 'header.php';

	if(isset($_SESSION['login'])){
		if(isset($_GET['pagina'])){
			$pagina = $_GET['pagina'];
		}
			else{
			$pagina = 'menu';
		}

	} else {
		$pagina = 'home'; 
	}
	

	switch ($pagina) {
		case 'login': include 'views/login.php';
			break;
		case 'cardapio': include 'views/cardapio_pizza.php';
			break;
		case 'inserir_pizza': include 'views/inserir_pizza.php';
			break;
		case 'inserir_bebida': include 'views/inserir_bebida.php';
			break;	
		case 'inserir_sobremesa': include 'views/inserir_sobremesa.php';
			break;
		case 'menu': include 'views/menu.php'; 
			break;
		case 'faturamento': include 'views/menu_faturamento.php';
			break;
		case 'manutencao': include 'views/menu_manutencao.php';
			break;
		case 'quadro_funcionarios': include 'views/quadro_funcionarios.php';
			break;
		case 'inserir_funcionario': include 'views/inserir_funcionario.php';
			break;
		case 'faturamento_historico': include 'views/historico_recibos.php';
			break;
		case 'inserir_recibo': include 'views/processa_total.php';
			break;
		case 'recibo': include 'views/processa_total.php';
			break;
		case 'faturamento_periodo': include 'views/historico_periodo.php';
			break;
		case 'cliente': include 'views/quadro_clientes.php';
			break;
		case 'pedidos': include 'views/main_pedidos_mesa.php';
			break;
		case 'pedidos_online': include 'views/main_pedidos_online.php';
			break;
		case 'cardapio_sobremesa': include 'views/cardapio_sobremesa.php';
			break;
		case 'cardapio_bebida': include 'views/cardapio_bebida.php';
			break;
		case 'pedido_mesa': include 'views/pedido_mesa.php';
			break;
		case 'pagamento_mesa': include 'views/pagamento_mesa.php';
			break;	
		case 'pedido_online': include 'views/pedido_online.php';
			break;
		case 'recibo_online': include 'views/historico_recibos_online.php';
			break;
		default: include 'home.php'; 
		break;
	}


	include 'footer.php';

		/*
	@$pagina = $_GET['pagina'];
	if ($pagina == 'login') {
		include 'views/login.php';
	}
	elseif ($pagina == 'cardapio') {
		include 'views/cardapio.php';
	}
	elseif ($pagina == 'inserir_pizza') {
		include 'views/inserir_pizza.php';
	}
	elseif($pagina == 'menu') {
		include 'views/menu.php';
	}
	elseif($pagina == 'faturamento') {
		include 'views/menu_faturamento.php';
	}
	*/
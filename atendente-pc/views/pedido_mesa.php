<br>
<div style="width: 250px;margin: 0 auto">
	<label style="font-size: 30px;font-family: cursive;color: white">PEDIDO MESA <?php echo $_GET['id_mesa'] ?></label>
</div>
<br>
	<?php
	$id_mesa = $_GET['id_mesa'];
	$current_mesa = '';
	$current_pizza = '';
	$current_bebida = ' ';
	$current_sobremesa = '';
	$current_tam = '';
	$pedido_horario = '';
	$current_preco = 0.00;
	$total = 0.0;
	$count = 1;
	$garcom = "";

	while ($linha_mesa = mysqli_fetch_array($consulta_mesa)) {
		if ($linha_mesa['id_mesa'] == $id_mesa) {
			$current_mesa = $linha_mesa;
			$nome_cliente = $linha_mesa['nome_cliente'];
			$garcom = $linha_mesa['id_garcom'];
		}
	}

	while ($linhaC = mysqli_fetch_array($consulta_garcom)) {
		if($garcom == $linhaC['id_garcom'])
			$garcom = $linhaC['nome_garcom'];
	}

	if ($current_mesa[1] == 0){



			mysqli_data_seek($consulta_pedidos_mesa, 0);

			?>
			<table style="border: 1px solid black; width: 70%;margin: 0 auto;background-color: #ccc;text-align: center">  
			<thead>
			<tr>
				<th>#</th>
				<th>produto</th>
				<th>Preco</th>

			</tr>
			</thead>
			<tbody>
			<?php 		
				
					while ($linha_pedidos = mysqli_fetch_array($consulta_pedidos_mesa)) {
						if ($linha_pedidos['id_mesa'] == $id_mesa){
							while ($linha_pizza = mysqli_fetch_array($consulta_produto_pizza)) {
								if($linha_pedidos['id_pizza'] == $linha_pizza['id_pizza']){
									echo '<tr><td>'.$count.'</td>';
									$count++;
									echo '<td>'.$linha_pizza['nome_pizza'].'</td>';
									if ($linha_pedidos['pedido_pizza_tam'] == 1) {
										echo '<td>'.$linha_pizza['preco_P'].'</td></tr>';
										$total += $linha_pizza['preco_P'];	
									}
									if ($linha_pedidos['pedido_pizza_tam'] == 2) {
										echo '<td>'.$linha_pizza['preco_M'].'</td></tr>';
										$total += $linha_pizza['preco_M'];		
									}
									if ($linha_pedidos['pedido_pizza_tam'] == 3) {
										echo '<td>'.$linha_pizza['preco_G'].'</td></tr>';
										$total += $linha_pizza['preco_G'];		
									}
								}
							}
							mysqli_data_seek($consulta_produto_pizza, 0);
							while ($linha_bebida = mysqli_fetch_array($consulta_produto_bebida)) {
								if($linha_pedidos['id_bebida'] == $linha_bebida['id_bebida']){
									echo '<tr><td>'.$count.'</td>';
									$count++;
									echo '<td>'.$linha_bebida['nome_bebida'].'</td>';
									echo '<td>'.$linha_bebida['preco_bebida'].'</td></tr>';
									$total += $linha_bebida['preco_bebida'];	
								}
							}
							mysqli_data_seek($consulta_produto_bebida, 0);
							while ($linha_sobremesa = mysqli_fetch_array($consulta_produto_sobremesa)) {
								if($linha_pedidos['id_sobremesa'] == $linha_sobremesa['id_sobremesa']){
									echo '<tr><td>'.$count.'</td>';
									$count++;
									echo '<td>'.$linha_sobremesa['nome_sobremesa'].'</td>';
									echo '<td>'.$linha_sobremesa['preco_sobremesa'].'</td></tr>';
									$total += $linha_sobremesa['preco_sobremesa'];	
								}
							}
							mysqli_data_seek($consulta_produto_sobremesa, 0);
						}
					}
					mysqli_data_seek($consulta_pedidos_mesa, 0);
			?>
			</tbody>
		</table>
		<?php 

			while($linha_pedidos = mysqli_fetch_array($consulta_pedidos_mesa)){
				if ($linha_pedidos['id_mesa'] == $current_mesa[0]){
					$pedido_horario = $linha_pedidos['horario_pedido'];
					$pedado = explode(" ", $pedido_horario);
					if($pedado)
						break;
				}
			}

		?>
		<br>
		<form method="post" action="?pagina=pagamento_mesa" style="margin: 0 auto;background-color: #ccc;height: 100px;width: 70%;">
			<label style="padding-left: 10px">NOME DO CLIENTE : </label>
			<input type="text" name="garcom" value="<?php echo $nome_cliente ?>"><br>
			<label style="padding-left: 10px">GARÇOM RES. : </label>
			<input type="text" name="garcom" value="<?php echo $garcom ?>"><br>
			<input type="hidden" name="id_mesa" value="<?php echo $id_mesa ?>">
			<input type="hidden" name="preco" value="<?php echo $total ?>">
			<label style="padding-left: 10px">HORARIO DE ABERTURA DA MESA: </label>
			<input type="text" name="horario" value="<?php echo $pedado[1] ?>" style="width: 60px"><br>
			<label style="padding-left: 10px">TOTAL</label>
			<input type="text" name="total" readonly="true" value="
			<?php
				echo 'R$'.number_format($total, 2); 
			?>">
		<div style="margin: 10px auto;width: 250px; text-align: center;">
				<br><button type="submit" style="color: white;background-color: red; font-size: 15px;padding: 0 5px;margin: 10px 5px;">FECHAR MESA</button>
			<a href="?pagina=pedidos">
				<button type="button" style="color: white;background-color: gray; font-size: 15px;padding: 0 5px;margin: 0 5px;">VOLTAR</button>
			</a>
		</div>
		</form>
		<br><br>
		<?php
	} 

	else 

		header('location:index.php?pagina=pedidos'); ?>





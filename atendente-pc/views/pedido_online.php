<br>
<div style="width: 250px;margin: 0 auto">
	<label style="font-size: 30px;font-family: cursive;color: white">PEDIDO ONLINE <?php echo $_GET['pedido'] ?></label>
</div>
<br>
	<?php
	include 'db.php';
	$id_cliente = $_GET['id_cliente'];
	$conjunto = $_GET['conjunto'];
	$total = 0.0;
	$count = 1;
	$endereco = "";
	$nomeCliente = "";
	$linhaCliente = "";
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
					#algoritmo padrão feito por mim de todos os produtos listados.		
					while ($linha_pedidos = mysqli_fetch_array($consulta_pedidos_online)) {
						if ($linha_pedidos['id_cliente'] == $id_cliente){
							if($linha_pedidos['conjunto'] == $conjunto) {
								$pagamento = $linha_pedidos['metodo_pagamento'];
							while ($linha_pizza = mysqli_fetch_array($consulta_produto_pizza)) {
								if($linha_pedidos['id_pizza'] == $linha_pizza['id_pizza']){
									echo '<tr><td>'.$count.'</td>';
									$count++;
									echo '<td>'.$linha_pizza['nome_pizza'].'</td>';
									if ($linha_pedidos['pizza_tam'] == 1) {
										echo '<td>'.$linha_pizza['preco_P'].'</td></tr>';
										$total += $linha_pizza['preco_P'];	
									}
									if ($linha_pedidos['pizza_tam'] == 2) {
										echo '<td>'.$linha_pizza['preco_M'].'</td></tr>';
										$total += $linha_pizza['preco_M'];		
									}
									if ($linha_pedidos['pizza_tam'] == 3) {
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
					}
					mysqli_data_seek($consulta_pedidos_mesa, 0);
					mysqli_data_seek($consulta_pedidos_online, 0);


			?>
			</tbody>
		</table>
		<?php 
			#pegando horario correspondente do pedido.
			$horario = "";
			while($linha_pedidos = mysqli_fetch_array($consulta_pedidos_online)){
				if ($linha_pedidos['id_cliente'] == $id_cliente){
				if ($linha_pedidos['conjunto'] == $conjunto){
					$horario = $linha_pedidos['horario_pedido'];
					$pedido_horario = $linha_pedidos['horario_pedido'];
					$pedado = explode(" ", $pedido_horario);
				}
			}
		}

			$query = "SELECT * FROM cliente where id_cliente = $id_cliente";
			$consulta_query = mysqli_query($conexao,$query);
			$linha = mysqli_fetch_array($consulta_query);

		?>
		<br>
		<form method="post" action="fecha_pedido_online.php" style="margin: 0 auto;background-color: #ccc;height: 120px;width: 70%;">
			<label style="padding-left: 10px">NOME CLIENTE: : </label>
			<input type="text" name="nome_cliente" style="width: 200px"value="<?php echo $linha['nome_cliente'] ?>"><br>
			<label style="padding-left: 10px">ENDEREÇO: : </label>
			<input type="text" name="endereco" value="<?php echo $linha['endereco_cliente']; ?>"><br>
			<input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
			<input type="hidden" name="preco" value="<?php echo $total; ?>">
			<input type="hidden" name="conjunto" value="<?php echo $conjunto; ?>">
			<input type="hidden" name="horario_entrada" value="<?php echo $horario; ?>">
			<label style="padding-left: 10px">HORARIO DO PEDIDO: </label>
			<input type="text" name="hora" value="<?php echo $pedado[1]; ?>" style="width: 60px"><br>
			<label style="padding-left: 10px">PAGAMENTO</label>
			<input type="text" name="metodo" readonly="true" value="<?php echo $pagamento; ?>"><br>
			<label style="padding-left: 10px">TOTAL</label>
			<input type="text" name="total" readonly="true" value="
			<?php
				echo 'R$'.number_format($total, 2); 
			?>">
		<div style="margin: 20px auto;width: 450px;text-align: center;">
				<button type="submit" style="color: white;background-color: blue; font-size: 15px;padding: 0 5px;">IMPRIMIR</button>
				<button type="submit" style="color: white;background-color: red; font-size: 15px;padding: 0 5px;">FECHAR PEDIDO</button>
				<a href="?pagina=pedidos_online">
				<button type="button" style="color: white;background-color: gray; font-size: 15px;padding: 0 5px;">VOLTAR</button>
			</a>
		</div>
		</form>





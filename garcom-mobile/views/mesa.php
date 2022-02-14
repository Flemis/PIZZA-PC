<?php
	include 'db.php'; 
	$mesa = $_POST['mesas'];
	$query = "SELECT * FROM mesa where id_mesa = $mesa";
	$consulta = mysqli_query($conexao,$query);

		$linha = mysqli_fetch_array($consulta);
		if($linha['estado_mesa'] == 1){ ?>
		<div style="text-align: center;margin: 10px">
			<form method="post" action="?pagina=abre_mesa">
				<label>MESA <?php echo $linha['id_mesa']; ?> ESTÁ FECHADA</label><br><br>
				<label>NOME CLIENTE: </label>
				<input type="hidden" name="mesa" value="<?php echo $linha['id_mesa']; ?>">
				<input type="text" name="nome_cliente"><br><br>
				<input type="submit" name="botao" style="color: white;background-color: green" value="ABRIR MESA">
			</form>
		</div>
	<?php
	}
		if($linha['estado_mesa'] == 0){ 

			$id_mesa = $_POST['mesas'];
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
			echo $id_mesa;

			while ($linha_mesa = mysqli_fetch_array($consulta_mesa)) {
				if ($linha_mesa['id_mesa'] == $id_mesa) {
					$current_mesa = $linha_mesa;
					$nome_cliente = $linha_mesa['nome_cliente'];
					$garcom = $linha_mesa['id_garcom'];
				}
			}

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
			<form method="post" action="?pagina=abre_mesa" style="margin: 0 auto;background-color: #ccc;height: 80px;width: 400px;">
			<label style="padding-left: 10px">NOME DO CLIENTE : </label>
			<input type="text" name="nome_cliente" value="<?php echo $nome_cliente ?>"><br>
			<label style="padding-left: 10px">TOTAL</label>
			<input type="text" name="total" readonly="true" value="
			<?php
				echo 'R$'.number_format($total, 2); 
			?>"><br>
			<div style="text-align: center;">
			<input type="hidden" name="mesa" value="<?php echo $linha['id_mesa']; ?>">	
			<input type="submit" name="botao" value="ADICIONAR PRODUTO" style="color: white;background-color: green">
			</div>
		</div>
		</form>




		<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div style="text-align: center">
	<label>CESTA</label>
</div>
			<table style="border: 1px solid black; width: 70%;margin: 0 auto;background-color: #ccc;text-align: center">  
				<thead>
				<tr>
					<th>#</th>
					<th>produto</th>
					<th>Preco</th>
					<th>Excluir</th>
				</tr>
				</thead>
				<tbody>
				<?php 	
						$total = 0.0;	
						$count = 1;
						while ($linha_pedidos = mysqli_fetch_array($consulta_cesta_mesa)) {
							if ($linha_pedidos['id_mesa'] == $_SESSION['mesa']){
								while ($linha_pizza = mysqli_fetch_array($consulta_produto_pizza)) {
									if($linha_pedidos['id_pizza'] == $linha_pizza['id_pizza']){
										echo '<tr><td>'.$count.'</td>';
										$count++;
										echo '<td>'.$linha_pizza['nome_pizza'].'</td>';
										if ($linha_pedidos['pizza_tam'] == 1) {
											echo '<td>'.$linha_pizza['preco_P'].'</td>';
											$total += $linha_pizza['preco_P'];	
										}
										if ($linha_pedidos['pizza_tam'] == 2) {
											echo '<td>'.$linha_pizza['preco_M'].'</td>';
											$total += $linha_pizza['preco_M'];		
										}
										if ($linha_pedidos['pizza_tam'] == 3) {
											echo '<td>'.$linha_pizza['preco_G'].'</td>';
											$total += $linha_pizza['preco_G'];		
										}
										echo '<td>'?> <a href="deleta_produto.php?id_pizza=<?php echo $linha_pizza['id_pizza'];?>&id_pom=<?php echo $linha_pedidos['id_pom'];?>">X</a> <?php '</td></tr>';

									}
								}
								mysqli_data_seek($consulta_produto_pizza, 0);
								while ($linha_bebida = mysqli_fetch_array($consulta_produto_bebida)) {
									if($linha_pedidos['id_bebida'] == $linha_bebida['id_bebida']){
										echo '<tr><td>'.$count.'</td>';
										$count++;
										echo '<td>'.$linha_bebida['nome_bebida'].'</td>';
										echo '<td>'.$linha_bebida['preco_bebida'].'</td>';
										$total += $linha_bebida['preco_bebida'];	
										echo '<td>'?> <a href="deleta_produto.php?id_bebida=<?php echo $linha_bebida['id_bebida'];?>&id_pom=<?php echo $linha_pedidos['id_pom'];?>">X</a> <?php '</td></tr>';

									}
								}
								mysqli_data_seek($consulta_produto_bebida, 0);
								while ($linha_sobremesa = mysqli_fetch_array($consulta_produto_sobremesa)) {
									if($linha_pedidos['id_sobremesa'] == $linha_sobremesa['id_sobremesa']){
										echo '<tr><td>'.$count.'</td>';
										$count++;
										echo '<td>'.$linha_sobremesa['nome_sobremesa'].'</td>';
										echo '<td>'.$linha_sobremesa['preco_sobremesa'].'</td>';
										$total += $linha_sobremesa['preco_sobremesa'];
										echo '<td>'?> <a href="deleta_produto.php?id_sobremesa=<?php echo $linha_sobremesa['id_sobremesa'];?>&id_pom=<?php echo $linha_pedidos['id_pom'];?>">X</a> <?php '</td></tr>';	
									}
								}
								mysqli_data_seek($consulta_produto_sobremesa, 0);
							}
						}
						mysqli_data_seek($consulta_pedidos_mesa, 0);
				?>
				</tbody>
		</table>
		<div style="text-align: center;">
			<label>total</label><br>
			<input type="text" readonly="true" name="valor" value="<?php echo 'R$'.number_format($total, 2);  ?>"><br><br>
		<a href="?pagina=fecha_cesta">
			<input type="button" name="confirmar" value="adicionar à mesa" style="margin-bottom: 10px">
		</a>
		</div>

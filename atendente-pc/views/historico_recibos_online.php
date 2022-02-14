<div style="text-align: center;">
	<label style="font-size: 30px;font-family: cursive;color: white;">RECIBOS</label>
</div>
<a href="?pagina=faturamento_historico" style="float: right;">
		<input type="button" name="botao" value="VENDA LOJA" style="background-color: blue;color: white">
	</a>
<div>	
<table id="tabela_pizza" style="border: 2px solid black; width: 100%;background-color: #ccc;text-align: center">  
	<thead>
	<tr>
		<th>id_recibo</th>
		<th>data</th>
		<th>hora entrada</th>
		<th>hora saída</th>
		<th>total</th>
		<th>método</th>
		<th>cliente</th>
	</tr>
	</thead>
	<tbody>
	<?php 	
			include 'db.php';
			
			while($linha = mysqli_fetch_array($consulta_total_online)){
				echo '<tr><td >'.$linha['id_recibo_online'].'</td>';
				$var = $linha['horario_entrada'];
				echo '<td>'.date('d/m/Y', strtotime($var)).'</td>';
				echo '<td>'.date('H:i:s', strtotime($var)).'</td>';
				$var = $linha['horario_saida'];
				echo '<td>'.date('H:i:s', strtotime($var)).'</td>';
				echo '<td>'.$linha['total'].'</td>';					
				echo '<td>'.$linha['metodo_pagamento'].'</td>';
				$cliente = $linha['id_cliente'];
				$query = "SELECT nome_cliente from cliente where id_cliente = $cliente";
				$consulta = mysqli_query($conexao,$query);
				$nome = mysqli_fetch_array($consulta);
				echo '<td>'.$nome['nome_cliente'].'</td></tr>';
			}
				mysqli_data_seek($consulta_total_online, 0);
				mysqli_data_seek($consulta, 0);
	?>
	</tbody>
</table>

<div id="containermenu" style="text-align: center;background-color: #ccc;height: 270px">
	<br>
	<label style="">PIX</label><br>
	<input type="text" name="total" readonly="true" value="
	<?php $total_pix = '0.00';
	while($linha = mysqli_fetch_array($consulta_total_online)){
		if($linha['metodo_pagamento'] == 'PIX') {
			$total_pix += $linha['total'];
		}
	}
	mysqli_data_seek($consulta_total_online, 0);
	echo 'R$ '.number_format((float)$total_pix, 2, '.', '');
	?>
"><br>
	<label style="">DINHEIRO</label><br>
	<input type="text" name="total" readonly="true" value="
	<?php $total_dinheiro = '0.00'; $total_cartao_debito = '0.0'; $total_cartao_credito = '0.0';
	while($linha = mysqli_fetch_array($consulta_total_online)){
		if($linha['metodo_pagamento'] == 'DINHEIRO') {
			$total_dinheiro += $linha['total'];
		}
	}
	mysqli_data_seek($consulta_total_online, 0);
	echo 'R$ '.number_format((float)$total_dinheiro, 2, '.', '');
	?>
"><br>
<label style="">DEBITO</label><br>
	<input type="text" name="total" readonly="true" value="
	<?php $total_cartao_debito = '0.00';
	while($linha = mysqli_fetch_array($consulta_total_online)){
		if($linha['metodo_pagamento'] == 'DEBITO') {
			$total_cartao_debito += $linha['total'];
		}
	}
	mysqli_data_seek($consulta_total_online, 0);
	echo 'R$ '.number_format((float)$total_cartao_debito, 2, '.', '');
	?>
"><br>
<label style="">CREDITO</label><br>
	<input type="text" name="total" readonly="true" value="
	<?php $total_cartao_credito = '0.00';
	while($linha = mysqli_fetch_array($consulta_total_online)){
		if($linha['metodo_pagamento'] == 'CREDITO') {
			$total_cartao_credito += $linha['total'];
		}
	}
	mysqli_data_seek($consulta_total_online, 0);
	echo 'R$ '.number_format((float)$total_cartao_credito, 2, '.', '');

	?>
"><br>	
<label style="">TOTAL</label><br>
	<input type="text" name="total" readonly="true" value="
	<?php $s = $total_dinheiro + $total_pix + $total_cartao_credito + $total_cartao_debito;
	echo 'R$ '.number_format((float)$s, 2, '.', '');

	?>

">		
</div>
</div>

<br></br>
<div class="container" style="text-align: center;color: white">
	<label style="font-size: 25px">CLIENTES</label>
</div>
<table id="tabela_pizza" style="border: 1px solid black; width: 100%;background-color: #ccc;text-align: center;">  
	<thead>
	<tr>
		<th>nome</th>
		<th>endereço</th>
		<th>cadastro</th>
	</tr>
	</thead>
	<tbody>
	<?php 
			while($linha = mysqli_fetch_array($consulta_cliente)){
				echo '<tr><td >'.$linha['nome_cliente'].'</td>';
				echo '<td>'.$linha['endereco_cliente'].'</td>';
				$var = $linha['data_cadastro_cliente'];
				echo '<td>'.date('d/m/Y', strtotime($var)).'</td>';
	?>
	<?php
				}
	?>
	</tbody>
</table>
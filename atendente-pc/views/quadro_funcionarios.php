<br></br>
<div class="container" style="text-align: center; color: white">
	<label style="font-size: 25px">Funcionários</label>
</div>
<table id="tabela_pizza" style="border: 1px solid black; width: 100%;background-color: #ccc;text-align: center;">  
	<thead>
	<tr>
		<th>nome</th>
		<th>idade</th>
		<th>cargo</th>
		<th>salario</th>
		<th>EDITAR</th>
		<TH>DELETAR</TH>
	</tr>
	</thead>
	<tbody>
	<?php 
			while($linha = mysqli_fetch_array($consulta_funcionario)){
				echo '<tr><td >'.$linha['nome_funcionario'].'</td>';
				echo '<td>'.$linha['idade_funcionario'].'</td>';
				echo '<td>'.$linha['cargo_funcionario'].'</td>';
				echo '<td>'.$linha['salario'].'</td>';
	?>
		<td><a style="text-decoration: none;" href="?pagina=inserir_funcionario&editar=<?php echo $linha['id_funcionario']; ?>">EDITAR</a></td>
		<td><a style="text-decoration: none;" href="deleta_funcionario.php?id_funcionario=<?php echo $linha['id_funcionario']; ?>">X</a></td></tr>
	<?php
				}
	?>
	</tbody>
</table>
<a href="?pagina=inserir_funcionario">
	<button type="button" style="margin:20px;color: white;background-color: red">inserir novo funcionário</button>
</a>
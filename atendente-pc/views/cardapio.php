<a href="?pagina=inserir_pizza">
	<button type="button" style="margin:20px;color: white;background-color: red">inserir novo produto</button>
</a>
<table id="tabela_pizza" style="border: 1px solid black; width: 100%;background-color: #ccc;text-align: center">  
	<thead>
	<tr>
		<th>nome produto</th>
		<th>Preco(P)</th>
		<th>Preco(M)</th>
		<th>Preco(G)</th>
		<th>EDITAR</th>
		<th>DELETAR</th>
	</tr>
	</thead>
	<tbody>
	<?php 
			while($linha = mysqli_fetch_array($consulta_produto)){
				echo '<tr><td >'.$linha['nome_produto'].'</td>';
				echo '<td>'.$linha['preco_P'].'</td>';
				echo '<td>'.$linha['preco_M'].'</td>';
				echo '<td>'.$linha['preco_G'].'</td>';
	?>
		<td><a href="?pagina=inserir_pizza&editar=<?php echo $linha['id_produto']; ?>">Editar</a></td>
		<td><a href="deleta_pizza.php?id_produto=<?php echo $linha['id_produto']; ?>">X</a></td></tr>
	<?php
				}
	?>
	</tbody>
</table>
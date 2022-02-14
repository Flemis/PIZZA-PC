<div class="container" style="text-align: center;">
	<label style="font-size: 25px;color:white">PIZZAS</label>
</div>
<table id="tabela_pizza" style="border: 1px solid black; width: 100%;background-color: #ccc;text-align: center">  
	<thead>
	<tr>
		<th>PIZZA</th>
		<th>PRECO(P)</th>
		<th>PRECO(M)</th>
		<th>PRECO(G)</th>
		<th>EDITAR</th>
		<th>DELETAR</th>
	</tr>
	</thead>
	<tbody>
	<?php 
			while($linha = mysqli_fetch_array($consulta_produto_pizza)){
				echo '<tr><td >'.$linha['nome_pizza'].'</td>';
				echo '<td>'.$linha['preco_P'].'</td>';
				echo '<td>'.$linha['preco_M'].'</td>';
				echo '<td>'.$linha['preco_G'].'</td>';
	?>
		<td><a href="?pagina=inserir_pizza&editar=<?php echo $linha['id_pizza']; ?>">Editar</a></td>
		<td><a href="deleta_pizza.php?id_pizza=<?php echo $linha['id_pizza']; ?>">X</a></td></tr>
	<?php
				}
	?>
	</tbody>
</table>
<a href="?pagina=inserir_pizza">
	<button type="button" style="margin:20px;color: white;background-color: red; font-size: 15px">INSERIR</button>
</a>
<a href="?pagina=cardapio_bebida">
	<button type="button" style="margin:20px;color: white;background-color: blue; font-size: 15px">BEBIDAS</button>
</a>
<a href="?pagina=cardapio_sobremesa">
	<button type="button" style="margin:20px;color: white;background-color: orange; font-size: 15px">SOBREMESAS</button>
</a><br>
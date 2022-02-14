<div class="container" style="text-align: center;">
	<label style="font-size: 25px">SOBREMESAS</label>
</div>
<table id="tabela_pizza" style="border: 1px solid black; width: 100%;background-color: #ccc;text-align: center">  
	<thead>
	<tr>
		<th>PRODUTO</th>
		<th>PRECO</th>
		<th>EDITAR</th>
		<th>DELETAR</th>
	</tr>
	</thead>
	<tbody>
	<?php 
			while($linha = mysqli_fetch_array($consulta_produto_sobremesa)){
				echo '<tr><td >'.$linha['nome_sobremesa'].'</td>';
				echo '<td>'.$linha['preco_sobremesa'].'</td>';
	?>
		<td><a href="?pagina=inserir_sobremesa&editar=<?php echo $linha['id_sobremesa']; ?>">Editar</a></td>
		<td><a href="deleta_sobremesa.php?id_sobremesa=<?php echo $linha['id_sobremesa']; ?>">X</a></td></tr>
	<?php
				}
	?>
	</tbody>
</table>
<a href="?pagina=inserir_sobremesa">
	<button type="button" style="margin:20px;color: white;background-color: red; font-size: 15px">INSERIR</button>
</a>
<a href="?pagina=cardapio">
	<button type="button" style="margin:20px;color: white;background-color: blue; font-size: 15px">PIZZAS</button>
</a>
<a href="?pagina=cardapio_bebida">
	<button type="button" style="margin:20px;color: white;background-color: orange; font-size: 15px">BEBIDAS</button>
</a>

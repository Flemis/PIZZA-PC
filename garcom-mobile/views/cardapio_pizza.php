<meta name="viewport" content="width=device-width, initial-scale=1.0">
<br><br>
<div style="text-align: center;margin-bottom: ">
	<label style="font-size: 25px">PIZZAS</label>
</div>
<table id="tabela_pizza" style="border: 1px solid black; width: 100%;background-color: #ccc;text-align: center">  
	<thead>
	<tr>
		<th>PIZZA</th>
		<th>PRECO(P)</th>
		<th>PRECO(M)</th>
		<th>PRECO(G)</th>
	</tr>
	</thead>
	<tbody>
	<?php 
			while($linha = mysqli_fetch_array($consulta_produto_pizza)){ ?>
				<tr><td><a href="?pagina=add_pizza&id_pizza=<?php echo $linha['id_pizza']; ?>"><?php echo $linha['nome_pizza']; ?></a></td>
					<?php
				echo '<td>'.$linha['preco_P'].'</td>';
				echo '<td>'.$linha['preco_M'].'</td>';
				echo '<td>'.$linha['preco_G'].'</td></tr>';

				}
	?>
	</tbody>
</table>
<div style="text-align: center;">
	<a href="?pagina=cardapio_bebida">
		<button type="button" style="margin:20px;color: white;background-color: blue; font-size: 15px">BEBIDAS</button>
	</a>
	<a href="?pagina=cardapio_sobremesa">
		<button type="button" style="margin:20px;color: white;background-color: orange; font-size: 15px">SOBREMESAS</button>
	</a><br>
</div>
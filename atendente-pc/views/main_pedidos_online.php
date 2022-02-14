<script type="text/javascript">
	setTimeout(function(){
   		window.location.reload(1);
}, 5000);
</script>
<?php
	include 'db.php';
	$query_cliente = "SELECT DISTINCT id_cliente from pedido_online";
	$query_horario = "SELECT * from pedido_online order by horario_pedido";
	mysqli_query($conexao,$query_horario);
	mysqli_query($conexao,$query_cliente);
	#mysqli_query($conexao,$query_conjunto);
	$query = mysqli_fetch_array($consulta_pedidos_online);
	$consulta_clientes = mysqli_query($conexao,$query_cliente);
	$consulta_horario = mysqli_query($conexao,$query_horario);
	#$consulta_conjunto = mysqli_query($conexao,$query_conjunto);
?>
<br><br>
<div style="width: 800px;margin: 0 auto">
	<a href="?pagina=pedidos">
		<button style="font-size: 30px; color: black"><--</button>
	</a>
	<label style="font-size: 30px;font-family: cursive;color: white">PEDIDOS ONLINE</label>
</div>
<br>
<div style="background-color: gray;padding: 10px 10px;text-align: center;width: 800px;margin: 0 auto;">
	<?php   #Ordenação dos pedidos por horario(não faço a minima ideia de como funcionou de primeira).
			$countP = 0; $conjunto_atual = ""; $conjunto_passado = null;
	 	while ($linha = mysqli_fetch_array($consulta_horario)) {
	 		if ($conjunto_passado == null){
	 			$countP++;
	 			$conjunto_atual = $linha['conjunto'];
	 			$cliente_atual = $linha['id_cliente']; ?>
	 			<a href="?pagina=pedido_online&id_cliente=<?php echo $cliente_atual; ?>&conjunto=<?php echo $conjunto_atual; ?>&pedido=<?php echo $countP; ?>">
	 				<button style="margin: 5px 5px;background-color: red" class="divbutton">PEDIDO <?php echo $countP; ?></button>
	 			</a> <?php
	 			$conjunto_passado = $linha['conjunto'];
	 		}
	 		else {
	 			$conjunto_atual = $linha['conjunto'];
	 			$cliente_atual = $linha['id_cliente'];
	 			if($conjunto_atual <> $conjunto_passado and $cliente_atual == $linha['id_cliente']){
	 				$countP++;
	 				$conjunto_atual = $linha['conjunto'];
	 				$cliente_atual = $linha['id_cliente'];
	 				?>
	 			<a href="?pagina=pedido_online&id_cliente=<?php echo $cliente_atual; ?>&conjunto=<?php echo $conjunto_atual; ?>&pedido=<?php echo $countP; ?>">
	 				<button style="margin: 5px 5px;background-color: red" class="divbutton">PEDIDO <?php echo $countP; ?></button>
	 			</a> <?php
	 			$conjunto_passado = $linha['conjunto'];

	 			}
	 		}
	 	}
	 	
	  ?>		
</div>

<?php 
	/*
	Antiga ordenação por ordem de id_cliente
	 <?php
	 		$count = 1;
	 	while($num_clientes = mysqli_fetch_array($consulta_clientes)) {
	 		$cliente_atual = $num_clientes['id_cliente'];
	 		$query = "SELECT distinct conjunto from pedido_online where id_cliente = $cliente_atual ORDER BY horario_pedido";
	 		$consulta = mysqli_query($conexao,$query);
	 		while($linhas = mysqli_fetch_array($consulta)){ ?>
	 			<a href="?pagina=pedido_online&id_cliente=<?php echo $cliente_atual; ?>&conjunto=<?php echo $linhas['conjunto']; ?>&pedido=<?php echo $count; ?>">
	 				<button style="margin: 5px 5px;background-color: red" class="divbutton">PEDIDO <?php echo $count; ?></button>
	 			</a>
	 	<?php
	 		$count++;
	 		}
	 	}
	 	 ?>

	 	*/


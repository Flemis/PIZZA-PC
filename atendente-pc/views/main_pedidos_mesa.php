<script type="text/javascript">
	setTimeout(function(){
   		window.location.reload(1);
}, 5000);
</script>
<?php
	$cores = [];$count = 0;
	while ($linha_mesa = mysqli_fetch_array($consulta_mesa)) {
		if ($linha_mesa['estado_mesa'] == 1) {
			$cores[$count] = 'red';
		}
		else {
			$cores[$count] = 'green';
		}
		$count = $count + 1;
	}
	mysqli_data_seek($consulta_mesa, 0);

?>
<br><br>
<div style="width: 800px;margin: 0 auto">
	<label style="font-size: 30px;font-family: cursive;color: white">PEDIDOS MESA</label>
	<a href="?pagina=pedidos_online">
		<button style="font-size: 30px; color: black">--></button>
	</a>
</div>
<br>
<div style="background-color: gray;padding: 10px 10px;text-align: center;width: 800px;margin: 0 auto;">
	<a href="?pagina=pedido_mesa&id_mesa=1">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[0] ?>" class="divbutton">MESA 01</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=2">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[1] ?>" class="divbutton">MESA 02</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=3">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[2] ?>" class="divbutton">MESA 03</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=4">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[3] ?>" class="divbutton">MESA 04</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=5">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[4] ?>" class="divbutton">MESA 05</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=6">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[5] ?>" class="divbutton">MESA 06</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=7">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[6] ?>" class="divbutton">MESA 07</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=8">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[7] ?>" class="divbutton">MESA 08</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=9">
		<button style="margin: 0px 5px;background-color: <?php echo $cores[8] ?>" class="divbutton">MESA 09</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=10">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[9] ?>" class="divbutton">MESA 10</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=11">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[10] ?>" class="divbutton">MESA 11</button>
	</a>
	<a href="?pagina=pedido_mesa&id_mesa=12">
		<button style="margin: 5px 5px;background-color: <?php echo $cores[11] ?>" class="divbutton">MESA 12</button>
	</a>
</div>
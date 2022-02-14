
<?php

$id_mesa = $_POST['id_mesa'];
$preco = $_POST['preco'];
?>
<br>
<div style="width: 250px;margin: 0 auto">
	<label style="font-size: 30px;font-family: cursive;color: white">PEDIDO MESA <?php echo $id_mesa?></label><br>
</div>
<form  method="post" action="fecha_mesa.php" id="containermenu" style="background-color: gray;height: 300px">
		<label style="font-family: cursive; font-size: 25px;margin: 0 18px">Método de pagamento</label><br><br>
		<input type="hidden" name="total" value="<?php echo $preco?>">
		<input type="hidden" name="mesa" value="<?php echo $id_mesa?>">
		<input type="submit" class="divbutton" style="background-color: turquoise;font-size: 30px;margin: 0 22px" name="metodo" value="PIX">
		<input type="submit" class="divbutton" style="background-color: orange;font-size: 30px" name="metodo" value="DINHEIRO">
		<input type="submit" class="divbutton" style="background-color: purple;font-size: 30px;margin: 12px 18px" name="metodo" value="CARTÃO DÉBITO">
		<input type="submit" class="divbutton" style="background-color: #1EDF18;font-size: 29px;margin: 5px 14px" name="metodo" value="CARTÃO CRÉDITO">
		<a href="?pagina=pedido_mesa&id_mesa=<?php echo $id_mesa ?>">
			<button type="button" class="divbutton" style="background-color: red;font-size: 30px;margin: 12px 80px">VOLTAR</button>
		</a>
	</form>


<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "pizza_luigi";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);



$query_funcionario = "SELECT * FROM funcionario";
$query_total = "SELECT * FROM recibo";
$query_total_online = "SELECT * FROM recibo_online";
$query_cliente = "SELECT * FROM cliente";
$query_produto_pizza = "SELECT * FROM pizza";
$query_produto_sobremesa = "SELECT * FROM sobremesa";
$query_produto_bebida = "SELECT * FROM bebida";
$query_pedidos_mesa = "SELECT * FROM pedido";
$query_mesa = "SELECT * FROM mesa";
$query_pedidos_online = "SELECT * FROM pedido_online";
$query_garcom = "SELECT * FROM garcom";


$consulta_funcionario = mysqli_query($conexao, $query_funcionario);
$consulta_total = mysqli_query($conexao, $query_total);
$consulta_cliente = mysqli_query($conexao, $query_cliente);
$consulta_produto_pizza = mysqli_query($conexao,$query_produto_pizza);
$consulta_produto_bebida = mysqli_query($conexao,$query_produto_bebida);
$consulta_produto_sobremesa = mysqli_query($conexao, $query_produto_sobremesa);
$consulta_pedidos_mesa = mysqli_query($conexao, $query_pedidos_mesa);
$consulta_mesa = mysqli_query($conexao, $query_mesa);
$consulta_pedidos_online = mysqli_query($conexao, $query_pedidos_online);
$consulta_total_online = mysqli_query($conexao,$query_total_online);
$consulta_garcom = mysqli_query($conexao,$query_garcom);
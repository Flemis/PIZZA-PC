<?php
	session_start();

	unset($_SESSION['login_cliente']);
	unset($_SESSION['cliente']);


	header('location:index.php');
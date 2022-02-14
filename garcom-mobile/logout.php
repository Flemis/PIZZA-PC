<?php
	session_start();

	unset($_SESSION['login_garcom']);
	unset($_SESSION['garcom']);
	unset($_SESSION['mesa']);

	header('location:index.php');
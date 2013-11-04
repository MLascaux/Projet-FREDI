<?php

	function run($sql)
	{
		$serveur = "localhost";
		$user = "root";
		$password = "";
		$BDD = "ProjetFredi";
		
		$cnx = new mysqli($serveur, $user, $password, $BDD);
		$result = $cnx->query($sql);
		
		return $result;
	}

?>
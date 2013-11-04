<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
	
		<title>Projet FREDI</title>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>

		<!-- JS -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		
	</head>
	
	<body>
	
		<div id="header">
			
			<!-- Permet d'appeler un menu different en fonction de l'utilisateur -->
			<?php

				include_once("function/user.php");

				if(islogin())
				{
					if(isAdmin())
					{
						include("menu_admin.php");
					}
					else
					{
						include("menu_user.php");
					}
				}
				else
				{
					include("menu.php");
				}

			?>

		</div>
		
		<?php

			include_once("sql/run.php");

			/* !!!GESTION DES PAGES!!! */
			
			if(!isset($_GET['p']))
			{
				$p = "index";
			}
			else
			{
				$p = $_GET['p'];
			}

			if(empty($p))
			{
				$p = "index";
			}

			$array_pages = array
			(
				'index'         => 'content/index.php'     ,
				'connect'       => 'content/connect.php'   ,
				'disconnect'    => 'content/disconnect.php',
				'register'      => 'content/register.php'  ,

				'admin_gestion' => 'admin/gestion.php'
			);

			if(!array_key_exists($p, $array_pages))
			{
				$page = 'content/404.php';
			}
			elseif(!is_file($array_pages[$p]))
			{
				$page = '404.php';
			}
			else
			{
				$page = $array_pages[$p];
			}

			include($page);

		?>
		
		<div id="foot">
			© <img src="picture/logo_entreprise.png"/>
		</div>
	
	</body>
	
</html>
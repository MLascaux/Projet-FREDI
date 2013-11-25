<?php
session_start();

// Get current page
if(!isset($_GET['p']))
{
    $currentPage = "index";
}
else
{
    $currentPage = $_GET['p'];
}

if(empty($currentPage))
{
    $currentPage = "index";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>FREDI | Maison des Ligues</title>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-override.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
		<!-- JS -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<body>
    <header class="navbar  navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../" class="navbar-brand">FREDI</a>
            </div>
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
    </header>

    <div class="container main-content">
    <?php
			include_once("sql/run.php");

			/* !!!GESTION DES PAGES!!! */

			$array_pages = array
			(
				'index'         => 'content/index.php'     ,
				'connect'       => 'content/connect.php'   ,
				'disconnect'    => 'content/disconnect.php',
				'register'      => 'content/register.php'  ,

				'admin_gestion' => 'admin/gestion.php'
			);

			if(!array_key_exists($currentPage, $array_pages))
			{
				$page = 'content/404.php';
			}
			elseif(!is_file($array_pages[$currentPage]))
			{
				$page = '404.php';
			}
			else
			{
				$page = $array_pages[$currentPage];
			}

			include($page);

		?>
        <footer>
            <img width="100" src="./images/logo_mdl.png" alt="MLD"/>
            GUILBERT Paul - LASCAUX Martial
        </footer>
        </div>
		

	
	</body>
	
</html>
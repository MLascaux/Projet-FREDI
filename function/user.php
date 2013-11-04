<?php

function isLogin()
{
	return isset($_SESSION['user']['login']);
}

function isAdmin()
{
	if(isLogin())
	{
		return isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1;
	}

	return 0;
}
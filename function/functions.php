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

function traitementMessage($message){
    foreach($message as $m){
        if(!empty($m['message']) && !empty($m['level'])){
            echo '<div class="alert alert-'. $m['level'] .'">'. $m['message'] .'</div>';
        }
    }
}
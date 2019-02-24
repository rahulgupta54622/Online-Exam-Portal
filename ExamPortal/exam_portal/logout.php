<?php

session_start();

if(isset($_SESSION["username"]) or isset($_SESSION["admin"]))
{

	session_destroy();
	header('Location:front.php');
}
else
{
	header('Location:front.php');
}

?>
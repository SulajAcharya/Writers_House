<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]) || !isset($_SESSION["role"]) || $_SESSION["role"] !== "user")
    {
		header("Location: /");
		exit(0);
	}
?>
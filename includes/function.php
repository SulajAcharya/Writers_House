<?php
	function create_hash($string)
	{
		return sha1($string);
	}

	function get_action_attr_value_for_current_page($query="")
	{
		$query = $query === "" ? $query : "?$query";
		return preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"])) . $query;
	}

	function redirect_to_current_page($query="")
	{
		echo "<script>window.location='".preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"]))."?$query';</script>";
		exit(0);
	}
	
    function error_message()
	{
		require_once($_SERVER["DOCUMENT_ROOT"]."/includes/error_message.php");
	}

?>
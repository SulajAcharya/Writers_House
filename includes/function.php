<?php
	function encrypt_pwd($string)
	{
		return sha1($string);
	}

	function action_form($query="")
	{
		$query = $query === "" ? $query : "?$query";
		return preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"])) . $query;
	}

	function current_page($query="")
	{
		echo "<script>window.location='".preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"]))."?$query';</script>";
		exit(0);
	}
	
    function error_message()
	{
		require_once($_SERVER["DOCUMENT_ROOT"]."/includes/error_message.php");
	}

	function signin($data)
	{
		global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));
		$password = encrypt_pwd($password);

		$sql = "SELECT user_id, role FROM user WHERE email_address = :email_address AND password = :password";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
		$stmt->bindParam(':password',$password, PDO::PARAM_STR);

		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION["user_id"] = $result["user_id"];
				$_SESSION["role"] = $result["role"];
				return true;
			}
		}
		$_SESSION["error_message"][] = "Invalid Login";
		return false;
	}

	function registration($data)
	{
		global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));

		if (filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
			$_SESSION["error_message"][] = "Invalid Email Address";
		}

		if (emailaddress_checking($email_address) === true) {
			$_SESSION["error_message"][] = "This email address is already registered";
		}

		if ($password != $conf_pass) {
			$_SESSION["error_message"][] = "Password and Confirm password are not matching";
		}

		if (!isset($_SESSION["error_message"])) {
			$password = encrypt_pwd($password);
			$unique_id = rand(time(), 1000);
			$image = isset($_FILES['image']) ? upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/Writers_House/img/", ["jpg", "jpeg", "png"]) : "";

			$sql = "INSERT INTO user(fname, lname, user_name, email_address, password, unique_id, img) VALUES (:fname, :lname, :user_name, :email_address, :password, :unique_id, :image)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
			$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
			$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':unique_id', $unique_id, PDO::PARAM_STR);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$_SESSION["success_message"][] = "Successfully Registered";
				return true;
			}

			return false;
		}

		return false;
	}

	function emailaddress_checking($email_address)
	{
		global $db;
		$sql="SELECT COUNT(1) as 'count' FROM user WHERE email_address = :email_address" ;
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':email_address',$email_address,PDO::PARAM_STR);
		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC)["count"] > 0? true : false ;
		}
		return false;
	}	

	function upload_file($file, $targetDirectory, $allowedExtensions) {
		$fileName = basename($file["name"]);
		$targetFile = $targetDirectory . $fileName;
		$fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
	  
		if (!in_array($fileExtension, $allowedExtensions)) {
		  return ""; 
		}

		if (move_uploaded_file($file["tmp_name"], $targetFile)) {
		  return $targetFile;
		}
	  
		return "";
	}

	function feedback_response($data)
	{
		global $db;
		extract($data);
		$sql="INSERT INTO feedback(email_address,feddback_comment,rating) VALUES (:email_address, :feddback_comment, :rating)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
		$stmt->bindParam(':feddback_comment', $feddback_comment, PDO::PARAM_STR);
		$stmt->bindParam(':rating', $rating, PDO::PARAM_STR);

		if ($stmt->execute()) {
			$_SESSION["success_message"][] = "Feedback Added Successfully";
			return true;
		}
	}

	function get_count_of_user()
	{
		global $db;
		$sql = "SELECT COUNT(user_id) as count FROM user WHERE role = 'user' AND block = '0'";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;
	}

	function get_count_of_writer()
	{
		global $db;
		$sql = "SELECT COUNT(user_id) as count FROM user WHERE role = 'writer' AND block = '0'";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;
	}

	function get_count_of_content()
	{
		global $db;
		$sql = "SELECT COUNT(content_id) as count FROM content WHERE deleted = '0'";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;
	}
?>
global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));
		
		if(filter_var($email_address, FILTER_VALIDATE_EMAIL) === false)
		{
			$_SESSION["error_messages"][] = "Invalid email address, Please enter vaild email address.";
		}

		if(is_email_address_available_in_users_table($email_address) === true)
		{
			$_SESSION["error_messages"][] = "This email address is already registered.";	
		}

		if($password !== $confirm_password)
		{
			$_SESSION["error_messages"][] = "Password and Confirm Password does not match.";	
		}

		if(!isset($_SESSION["error_messages"]))
		{
			$password = create_hash($password);
			$token = create_token();
			$sql = "INSERT INTO users (email_address, password, email_address_verified, token) VALUES (:email_address, :password, '1', :token)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':token', $token, PDO::PARAM_STR);
   }
   

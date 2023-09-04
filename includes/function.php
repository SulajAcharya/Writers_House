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
		$_SESSION["error_messages"][] = "Invalid Login";
		return false;
	}

	function registration($data)
	{
		global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));

		if (filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
			$_SESSION["error_messages"][] = "Invalid Email Address";
		}

		if (emailaddress_checking($email_address) === true) {
			$_SESSION["error_messages"][] = "This email address is already registered";
		}

		if ($password != $conf_pass) {
			$_SESSION["error_messages"][] = "Password and Confirm password are not matching";
		}

		if (!isset($_SESSION["error_messages"])) {
			$password = encrypt_pwd($password);
			$unique_id = rand(time(), 1000);
			$image = isset($_FILES['image']) ? upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/Writers_House/img//profile_img/", ["jpg", "jpeg", "png"]) : "";

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
				$_SESSION["success_messages"][] = "Successfully Registered";
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
			$_SESSION["success_messages"][] = "Feedback Added Successfully";
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

	function get_genre_list()
	{
		global $db;
		$sql = "SELECT * FROM genre WHERE deleted = '0'";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function add_genre($data)
	{
		global $db;
		extract($data);

		if(genre_checking($name) === true)
		{
			$_SESSION["error_messages"][] = "Genre already available";
		}

		if(!isset($_SESSION["error_messages"]))
		{
			$sql = "INSERT into genre(name) VALUES (:name)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);

			if($stmt->execute())
			{
				$_SESSION["success_messages"][] = "Successfully added";
				return true;
			}
			return false;
		}
	}

	function genre_checking($name)
	{
		global $db;
		$sql = "SELECT COUNT(1) as 'count' FROM genre WHERE name = :name AND deleted = '0'";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name',$name,PDO::PARAM_STR);

		if($stmt->execute())
		{
			$result=$stmt->fetch(PDO::FETCH_ASSOC)["count"];
			return $result > 0 ? true : false;
		}
		return false;
	}

	function genre_by_id($id)
	{
		global $db;
		$sql = "SELECT * from genre WHERE genre_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function activate_deactivate_genre($deactivate,$id)
	{
		global $db;
		$sql = "UPDATE genre SET deactivate = :deactivate, modified_time = NOW() WHERE genre_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':deactivate',$deactivate, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function update_genre($name,$id)
	{
		global $db;
		$sql = "UPDATE genre SET name = :name, modified_time = NOW() WHERE genre_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':name',$name, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function delete_genre_by_id($id)
	{
		global $db;
		$sql = "UPDATE genre SET deleted = '1', deleted_time = NOW() WHERE genre_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data deleted Successfully.";
			return true;
		}
		return false;
	}

	function user_list()
	{
		global $db;
		$sql = "SELECT * FROM user WHERE NOT role = 'writer'";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function chat_list()
	{
		global $db;
		$sql = "SELECT * FROM user";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}
	
	function verify_user($verified,$id)
	{
		global $db;
		$sql = "UPDATE user SET verified = :verified, verified_time = NOW() WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':verified',$verified, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function block_user($block,$id)
	{
		global $db;
		$sql = "UPDATE user SET block = :block, modified_time = NOW() WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':block',$block, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function update_role($role,$id)
	{
		global $db;
		$sql = "UPDATE user SET role = :role, modified_time = NOW() WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':role',$role, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function get_user_details_by_id()
	{
		global $db;
		$user_id = $_SESSION["user_id"];
		$sql = "SELECT * FROM user WHERE user_id = :user_id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_user_details_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM user WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function writer_list()
	{
		global $db;
		$sql = "SELECT * FROM user WHERE role = 'writer'";
		$stmt = $db->prepare($sql);

		if($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function writer_by_id($id)
	{
		global $db;
		$sql = "SELECT * from user WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function verify_writer($verified,$id)
	{
		global $db;
		$sql = "UPDATE user SET verified = :verified, verified_time = NOW() WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':verified',$verified, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function block_writer($block,$id)
	{
		global $db;
		$sql = "UPDATE user SET block = :block, modified_time = NOW() WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':block',$block, PDO::PARAM_STR);

		if ($stmt->execute())
		{
			$_SESSION["success_messages"][] = "Data Updated Successfully.";
			return true;
		}
		return false;
	}

	function get_previous_content_by_id($id)
	{
		global $db;
		$sql = "SELECT * FROM previous_visit WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_content_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE content_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_comment_count($id)
	{
		global $db;
		$sql = "SELECT COUNT(id) as count FROM comments WHERE content_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;
	}

	function get_writer_content_count($id)
	{
		global $db;
		$sql = "SELECT COUNT(content_id) as count FROM content WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;
	}

	function get_writer_read_count($id)
	{
		global $db;
		$sql = "SELECT SUM(read_count) as count FROM content WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;
	}

	function get_writer_content($id)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;		
	}

	function get_content_list()
	{
		global $db;
		$sql = "SELECT * FROM content";
		$stmt = $db->prepare($sql);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_pending_content_list()
	{
		global $db;
		$sql = "SELECT * FROM content WHERE approved = '0'";
		$stmt = $db->prepare($sql);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_approve_content_list()
	{
		global $db;
		$sql = "SELECT * FROM content WHERE approved = '1'";
		$stmt = $db->prepare($sql);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_disapprove_content_list()
	{
		global $db;
		$sql = "SELECT * FROM content WHERE approved = '-1'";
		$stmt = $db->prepare($sql);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_content_read_count($id)
	{
		global $db;
		$sql = "SELECT read_count as count FROM content WHERE content_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;		
	}

	function get_content_like_count($id)
	{
		global $db;
		$sql = "SELECT likes as count FROM content WHERE content_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);

		if($stmt->execute())
		{
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return (int) $result['count'];
		}
		return false;		
	}

	function approve_content($id)
	{
		global $db;
		$sql = "UPDATE content SET approved = '1', modified_time = NOW() WHERE content_id = :id";
		$stmt =  $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);
		
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}

	function disapprove_content($id)
	{
		global $db;
		$sql = "UPDATE content SET approved = '-1', disapprove_time = NOW() WHERE content_id = :id";
		$stmt =  $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_STR);
		
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}


	function change_password($data)
	{
		global $db;
		extract($data);
		$user_id = $_SESSION["user_id"];

		if ($password != $c_password) {
			$_SESSION["error_messages"][] = "Password and Confirm password are not matching";
		}

		if (!isset($_SESSION["error_messages"])) {
			$password = encrypt_pwd($password);
			$sql = "UPDATE user SET password = :password WHERE user_id = :user_id";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$_SESSION["success_messages"][] = "Successfully Password Change";
				return true;
			}

			return false;
		}
	}

	function insert_chat($data)
	{
		global $db;
		extract($data);

		$sql = "INSERT INTO chat(incoming_id, outgoing_id, msg) VALUES (:incoming_id, :outgoing_id, :msg)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_STR);
		$stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_STR);
		$stmt->bindParam(':msg', $msg, PDO::PARAM_STR);

		if($stmt->execute())
		{
			return true;
		}
		return false;
	}

	function get_chat($incoming_id, $outgoing_id)
	{
		global $db;

		$sql = "SELECT * FROM chat WHERE incoming_id = :incoming_id AND outgoing_id = :outgoing_id 
				OR incoming_id = :outgoing_id AND outgoing_id = :incoming_id ORDER BY id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_STR);
		$stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		return false;
	}

	function profile_update($data)
	{
		global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));

		if (filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
			$_SESSION["error_messages"][] = "Invalid Email Address";
		}

		if (!isset($_SESSION["error_messages"])) {
			$user_id = $_SESSION["user_id"];
			$image = isset($_FILES['image']) ? upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/Writers_House/img/profile_img/", ["jpg", "jpeg", "png"]) : "";
			$sql = "UPDATE USER SET fname = :fname, lname = :lname, user_name = :user_name, email_address = :email_address, img = :image, description = :description WHERE user_id = :user_id";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
			$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
			$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR);
			$stmt->bindParam(':description', $description, PDO::PARAM_STR);
			$stmt->bindParam(':user_id',$user_id, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$_SESSION["success_messages"][] = "Profile Updated";
				return true;
			}

			return false;
		}

		return false;
	}

	function add_content($data)
	{
		global $db;
		extract($data);

		$user_id = $_SESSION["user_id"];
		$cover_img = isset($_FILES['image']) ? upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/Writers_House/img/content_img/", ["jpg", "jpeg", "png"]) : "";
		$sql = "INSERT INTO content(user_id,title,one_liner,genre_id,writers_content,cover_img) VALUES (:user_id,:title,:one_liner,:genre_id,:writers_content,:cover_img)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		$stmt->bindParam(':title',$title,PDO::PARAM_STR);
		$stmt->bindParam(':one_liner',$one_liner,PDO::PARAM_STR);
		$stmt->bindParam(':genre_id',$genre_id,PDO::PARAM_STR);
		$stmt->bindParam(':writers_content',$writers_content,PDO::PARAM_STR);
		$stmt->bindParam(':cover_img',$cover_img,PDO::PARAM_STR);

		if ($stmt->execute()) {
			$_SESSION["success_messages"][] = "Content added";
			return true;
		}

		return false;
	}

	function update_to_writer($id)
	{
		global $db;
		$sql = "UPDATE user SET role = 'writer', modified_time = NOW() WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	function get_only_user_details_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM user WHERE user_id = :id AND role='user'";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_only_writer_details_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM user WHERE user_id = :id AND role='writer'";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_last_message_from_chat($incoming_id, $outgoing_id)
	{
		global $db;
		$sql = "SELECT * FROM chat WHERE incoming_id = :incoming_id AND outgoing_id = :outgoing_id 
				OR incoming_id = :outgoing_id AND outgoing_id = :incoming_id ORDER BY id DESC LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_STR);
		$stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount()) {
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}
		}
		return false;				
	}

	function chat_search($search)
	{
		global $db;
		$search = "%" . $search . "%";
		$sql = "SELECT * FROM user WHERE fname LIKE :search OR lname LIKE :search OR user_name LIKE :search";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':search', $search, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		return false;
	}

	function content_search($search)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE title LIKE CONCAT('%', :search, '%') OR genre_id = :search";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':search', $search, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		return false;
	}

	function user_search($search)
	{
		global $db;
		$search = "%" . $search . "%";
		$sql = "SELECT * FROM user WHERE fname LIKE :search OR lname LIKE :search OR user_name LIKE :search";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':search', $search, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		return false;
	}

	function like_checking($content_id, $user_id)
	{
		global $db;
		$sql="SELECT COUNT(1) as 'count' FROM likes WHERE content_id = :content_id AND user_id = :user_id" ;
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC)["count"] > 0? true : false ;
		}
		return false;
	}

	function get_like_detail($content_id, $user_id)
	{
		global $db;
		$sql="SELECT * FROM likes WHERE content_id = :content_id AND user_id = :user_id" ;
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function insert_like($content_id, $user_id)
	{
		global $db;
		$sql="INSERT INTO likes (content_id, user_id) VALUES (:content_id, :user_id)" ;
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}

	function update_like($content_id, $user_id, $like)
	{
		global $db;
		$sql="UPDATE likes SET liked = :like WHERE content_id = :content_id AND user_id = :user_id";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':like',$like,PDO::PARAM_STR);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}

	function increase_like_count($content_id)
	{
		global $db;
		$sql = "UPDATE content SET likes = likes + 1 WHERE content_id = :content_id";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}

	function decrease_like_count($content_id)
	{
		global $db;
		$sql = "UPDATE content SET likes = likes - 1 WHERE content_id = :content_id";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}

	function get_comment($content_id)
	{
		global $db;
		$sql="SELECT * FROM comments WHERE content_id = :content_id";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function insert_comment($data)
	{
		global $db;
		extract($data);
		$sql="INSERT INTO comments(comment, user_id, content_id) VALUES (:comment, :user_id, :content_id)";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
		$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}
		return false;
	}
?>
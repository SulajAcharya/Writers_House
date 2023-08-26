<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]) || !isset($_SESSION["role"]) || $_SESSION["role"] !== "user")
    {
		header("Location: /");
		exit(0);
	}
?>
<nav class="navbar navbar-expand-sm shadow bg-primary navbar-dark" id="user_nav">
  <div class="container">
    <a class="navbar-brand col-md-4 d-flex justify-content-end" href="/user/">
      <span class="fw-bold">Dashboard</span>
    </a>
    <div class="collapse navbar-collapse" id="nav-content">
      <ul class="navbar-nav">
        <li class="nav-item col-md-12 d-flex justify-content-end">
          <a class="nav-link" href="/user/profile_update">
            <span class="fw-bold">Update Profile</span>
          </a>
        </li>
        <li class="nav-item col-md-12 d-flex justify-content-end">
          <a class="nav-link" href="/user/change_password">
            <span class="fw-bold">Change Password</span>
          </a>
        </li>
      </ul>
    </div>      
  </div>
</nav>
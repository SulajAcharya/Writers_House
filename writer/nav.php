<?php
    $page_title = "Writer Dashboard";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]) || !isset($_SESSION["role"]) || $_SESSION["role"] !== "writer")
    {
		header("Location: /");
		exit(0);
	}
?>
<nav class="navbar navbar-expand-sm shadow bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand col-md-3" href="">
      <span class="fw-bold">Dashboard</span>
    </a>
    <div class="collapse navbar-collapse" id="nav-content">
      <ul class="navbar-nav">
        <li class="nav-item col-md-12">
          <a class="nav-link" href="#">
            <span class="fw-bold">Add Content</span>
          </a>
        </li>
        <li class="nav-item col-md-12">
          <a class="nav-link" href="#">
            <span class="fw-bold">Profile Update</span>
          </a>
        </li>
        <li class="nav-item col-md-12">
          <a class="nav-link" href="#">
            <span class="fw-bold">Change Password</span>
          </a>
        </li>
      </ul>
    </div>    
  </div>
</nav>
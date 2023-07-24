<?php
    $page_title = "Login";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) && is_numeric($_SESSION["user_id"]) && isset($_SESSION["role"]))
    {
		echo "<script>window.location='/".$_SESSION["role"]."';</script>";
		exit(0);
	}

    if($_POST["signin"])
    {
        signin($_POST);
        redirect_to_current_page();
    }
?>

<div class="container">
    <div class="row">
        <div class="card mt-5 col-md-6 offset-md-3 shadow pb-3 bg-body rounded">
            <div class="card-body m-3">
                <?php error_message(); ?>
                <form role="form" action="<?php echo get_action_attr_value_for_current_page(); ?>" method="post" enctype="multipart/form-data">
                    <h2 class="mt-5 mb-3 ms-5 fw-bold text-primary">Sign In</h2>
                    <p class="mb-5 ms-5">Sign in to your account</p>
                    <div class="mb-4 mx-5">
                        <input type="text" class="form-control me-5" id="email_address user_name" name="email_address user_name" placeholder="Email or Username" required>
                    </div>
                    <div class="mb-4 mx-5">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-4 mx-5 d-grid">
                        <button type="submit" class="btn btn-primary fw-bold" id="signin" name="signin">Login</button>
                    </div>
                    <div class="text-center">
                        <p>Don't have an account? <a href="" class="text-decoration-none">Sign Up</a></p>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>

<?php
?>
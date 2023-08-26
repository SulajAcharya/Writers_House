<?php
    $page_title = "Change Password";
    require_once($_SERVER["DOCUMENT_ROOT"]."/user/nav.php");

    if(isset($_POST["change"]))
    {
        change_password($_POST);
        current_page();
    }
?>

<div class="container">
    <div class="row">
        <div class="card mt-5 col-md-6 offset-md-3 shadow pb-3 bg-body rounded">
            <div class="card-body m-3">
                <?php error_message(); ?>
                <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
                    <h2 class="mt-5 mb-3 ms-5 fw-bold text-primary">Change Password</h2>
                    <div class="mb-4 mx-5">
                        <input type="password" class="form-control me-5" id="password" name="password" placeholder="New Password" required>
                    </div>
                    <div class="mb-4 mx-5">
                        <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="mb-4 mx-5 d-grid">
                        <button type="submit" class="btn btn-primary fw-bold" id="change" name="change">Change Password</button>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
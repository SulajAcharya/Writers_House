<?php 
    $page_title = "Update Profile";
    require_once($_SERVER["DOCUMENT_ROOT"]."/writer/nav.php");

    $user = get_user_details_by_id();

    if(isset($_POST["update"]))
    {
        profile_update($_POST);
        current_page();
    }
?>

<div class="container mt-5" id="profile">
    <div class="col-md-6 offset-md-3">
        <div class="card profile-card">
            <div class="card-body">
                <?php error_message(); ?>
                <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fname" class="form-label h5">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user["fname"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label h5">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user["lname"]; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label h5">User Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user["user_name"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label h5">Email</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="<?php echo $user["email_address"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label h5">Profile Photo</label>
                        <input type="file" class="form-control" id="image" name="image" value="<?php echo $user["img"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label h5">Description</label>
                        <textarea class="form-control" id="description" name="description" value="<?php echo $user["description"]; ?>" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary h5" id="update" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
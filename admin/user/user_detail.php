<?php
    $page_title = "User Detail";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $user = get_user_details_by_passing_id($id);
    }
?>

<div class="container mt-3" id="user_details">
    <div class="row g-0">
        <div class="card col-md-10 offset-md-1">
            <div class="card-header">
                Detail
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $user["img"]; ?>" class="img-thumbnail mx-5" alt="Profile Image">
                            </div>
                            <div class="col-md-3">
                                <label class="h5">User Name: </label>
                                <p><?php echo $user["lname"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body m-3">
                        <div class="row">
                            <div class="col-md-2">
                                <p class="h5">First Name: </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-decoration-underline h5"><?php echo $user['fname']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="h5">Last Name: </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-decoration-underline h5"><?php echo $user['lname']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="h5">Email address: </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-decoration-underline h5"><?php echo $user['email_address']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <a href="/admin/user/" class="btn btn-danger">Close</a>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
<?php
    $page_title = "Admin Dashboard";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");
?>

<div class="container" id="admin">
    <div class="row">
        <p class="h1 fw-bold my-5">Welcome Admin</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center h3 fw-bold">User</p>
                                <i class="fa fa-user h1 d-flex justify-content-center"></i>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $user_count = get_count_of_user();
                                ?>
                                <div class="data d-flex align-items-center justify-content-center h1 fw-bold my-4">
                                    <?php echo $user_count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center h3 fw-bold">Writer</p>
                                <i class="fas fa-user-edit h1 d-flex justify-content-center"></i>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $writer_count = get_count_of_writer();
                                ?>
                                <div class="data d-flex align-items-center justify-content-center h1 fw-bold my-4">
                                    <?php echo $writer_count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center h3 fw-bold">Content</p>
                                <i class="fa fa-scroll h1 d-flex justify-content-center"></i>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $content_count = get_count_of_content();
                                ?>
                                <div class="data d-flex align-items-center justify-content-center h1 fw-bold my-4">
                                    <?php echo $content_count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
?>
<?php
    $page_title = "User Dasboard";
    require_once($_SERVER["DOCUMENT_ROOT"]."/user/nav.php");

    $user = get_user_details_by_id();
?>

<div class="container my-5" id="user_dashboard">
    <div class="row mb-5">
        <div class="col-md-2">
            <img src="<?php echo $user["img"]; ?>" alt="User Photo" class="img mb-3 user_img">
        </div>
        <div class="col-md-6 mb-5">
            <div class="col-mb-4 mb-3 mt-2 h3"><?php echo $user["user_name"]; ?></div>
            <?php if($user["description"] > 0): ?>
                <p class="mb-3">Description</p>
            <?php endif; ?>
            <a href="/user/update_to_writer?q=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary">Upgrade To Writer</a>
        </div>
    </div>
    <div class="h4 previous">Previous Visits</div>
    <hr>
    <?php
        $id = $user["user_id"];
        $visits = get_previous_content_by_id($id);
    ?>
    <?php if($visits): ?>
        <div class="row">
            <?php
                foreach($visits as $visit):
            ?>
                <?php
                    $id = $visit["content_id"];
                    $content = get_content_by_passing_id($id);
                ?>
                <a href="/content/content_view_page?q=<?php echo $content["content_id"]; ?>" class="text-decoration-none text-dark">
                    <div class="card col-md-3">
                        <div class="card-body">
                            <img class="card-img-top" src="<?php echo $content["cover_img"]; ?>" alt="content">
                            <h5 class="card-title my-2"><?php echo $content["title"]; ?></h5>
                            <div class="row mb-3">
                                <div class="d-flex justify-content-between gap-2">
                                <?php echo substr($content['created_time'],8,2)."-".substr($content['created_time'],5,2)."-".substr($content['created_time'],0,4); ?>
                                <a href="/user/delete_previous?q=<?php echo $visit["id"]; ?>" class="btn btn-danger" id="delete_button" name="delete_button">
                                    <span><i class="fa-solid fa-trash"></i></span>
                                </a>        
                                </div>
                            </div>
                            <div class="row">
                            <?php
                                $id = $content["content_id"];
                                $c_comment = get_comment_count($id);
                            ?>
                            <div class="col-md-4">
                                <span><i class="fa-regular fa-eye"></i> <?php echo $content["read_count"]; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span><i class="fa-regular fa-message"></i> <?php echo $c_comment; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span><i class="fa-regular fa-thumbs-up"></i> <?php echo $content["likes"]; ?></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
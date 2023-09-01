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
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <?php
                            $id = $visit["content_id"];
                            $content = get_content_by_passing_id($id);
                        ?>
                        <img class="card-img-top" src="<?php echo $content["cover_img"]; ?>" alt="content">
                        <div class="card-title h5 my-2">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <?php echo $content["title"]; ?>
                                </div>
                            </div>
                        </div>
                        <p class="card-text my-2">
                            <?php echo substr($content['created_time'],8,2)."-".substr($content['created_time'],5,2)."-".substr($content['created_time'],0,4); ?>
                        </p>
                        <div class="row">
                            <?php
                                $id = $content["content_id"];
                                $comment = get_comment_count($id);
                            ?>
                            <div class="col-md-4">
                                <span><i class="fa-regular fa-eye"></i> <?php echo $content["read_count"]; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span><i class="fa-regular fa-message"></i> <?php echo $comment; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span><i class="fa-regular fa-thumbs-up"></i> <?php echo $content["like"]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
?>
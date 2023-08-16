<?php
    $page_title = "Content Detail";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $content = get_content_by_passing_id($id);
    }

    if(isset($_POST["approve"]))
    {
        approve_content($id);
        current_page("q=$id");
    }

    if(isset($_POST["disapprove"]))
    {
        disapprove_content($id);
        current_page("q=$id");
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
                                <img src="<?php echo $content["cover_img"]; ?>" class="img-thumbnail mx-5" alt="Cover Image">
                            </div>
                            <div class="col-md-3">
                                <p class="h5 mb-3"><?php echo $content["title"]; ?></p>
                                <?php 
                                    $id = $content["user_id"];
                                    $writer = get_user_details_by_passing_id($id);
                                ?>
                                <p class="mb-3">~<?php echo $writer["fname"]." ".$writer["lname"]; ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body m-3">
                        <?php
                            $id = $content["content_id"];
                            $views = get_content_read_count($id);
                            $like = get_content_like_count($id);
                            $comment = get_comment_count($id);
                        ?>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-center">
                                <pre class="h5"><i class="fa fa-eye"></i> <?php echo $views; ?></pre>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center">
                                <pre class="h5"><i class="fa-solid fa-thumbs-up"></i> <?php echo $like; ?></pre>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center">
                                <pre class="h5"><i class="fas fa-comment-alt"></i> <?php echo $comment; ?></pre>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mx-5"><?php echo $content["writers_content"]; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <?php if($content["approved"] == '0'): ?>
                                    <form role="form" action="<?php echo action_form("q=".$content["content_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-success mx-5" id="approve" name="approve">Approve</button>
                                    </form>
                                    <form role="form" action="<?php echo action_form("q=".$content["content_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger mx-5" id="disapprove" name="disapprove">Disapprove</button>
                                    </form>
                                    <a href="/admin/content/all_content_list" class="btn btn-primary mx-5">Close</a>
                                <?php elseif($content["approved"] == '1'): ?>
                                    <form role="form" action="<?php echo action_form("q=".$content["content_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger mx-5" id="disapprove" name="disapprove">Disapprove</button>
                                    </form>
                                    <a href="/admin/content/approve_content_list" class="btn btn-primary mx-5">Close</a>
                                <?php else: ?>
                                    <form role="form" action="<?php echo action_form("q=".$content["content_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-success mx-5" id="approve" name="approve">Approve</button>
                                    </form>
                                    <a href="/admin/content/disapprove_content_list" class="btn btn-primary mx-5">Close</a>
                                <?php endif; ?>
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
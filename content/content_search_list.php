<?php
    $page_title = "Content List";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]))
    {
        $search_name = $_GET["q"];
    }
?>

<div class="cotnainer mt-4" id="content_page_list">
    <div class="row">
        <ul class="row ms-5" id="content_writer_option">
            <li class="h3 content col-md-1 justify_content_start">
                <input type="radio" name="content_list_radio" id="content" value="0" checked>
                <label for="content">Content</label>
            </li>
            <li class="h3 previous col-md-1 justify_content_start">
                <input type="radio" name="content_list_radio" id="writer" value="1">
                <label for="writer">Authors</label>
            </li>
        </ul>
        <div class="container" id="content_list">
            <?php
                $content_result = content_search($search_name);
                $user_result = user_search($search_name);
            ?>
            <?php if($content_result): ?>
                <?php foreach($content_result as $content): ?>
                    <div class="row">
                        <a href="/content/content_view_page?q=<?php echo $content["content_id"]; ?>" class="text-decoration-none text-dark">
                            <div class="card col-md-6 offset-md-3 mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $content['cover_img']; ?>" alt="Content Image" id="content_image">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card-title mb-3"><?php echo $content['title']; ?></h5>
                                            <p class="card-text mb-3"><?php echo $content['one_liner']; ?></p>
                                            <span class="card-text align-text-bottom">
                                                <?php echo substr($content['created_time'],8,2)."-".substr($content['created_time'],5,2)."-".substr($content['created_time'],0,4); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="container" id="author_list">
            <?php if($user_result): ?>
                <?php foreach($user_result as $author): ?>
                    <div class="row">
                        <a href="/writer/writer_detail?q=<?php echo $author["user_id"]; ?>" class="text-decoration-none text-dark">
                            <div class="card col-md-6 offset-md-3 mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo $author['img']; ?>" alt="profile_photo" id="profile_photo">
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="card-title"><?php echo $author["fname"].' '.$author["lname"]; ?></h5>
                                            <span class="card-text">@<?php echo $author["user_name"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
<?php
    $page_title = "Writer Profile";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
      $id = trim($_GET["q"]);
      $writer = get_only_writer_details_by_passing_id($id);
    }
?>

<div class="container my-5" id="writer_profile">
  <div class="row mb-5">
    <div class="col-md-2">
      <img  src="<?php echo $writer["img"]; ?>" alt="Writer Photo" class="img mb-3" id="user" style="border-radius: 50%;">
    </div>
    <div class="col-md-6 mb-3">
      <div class="col-mb-4 mb-3 mt-2 h3"><?php echo $writer["user_name"]; ?></div>
      <p class="mb-3"><?php echo $writer["description"]; ?></p>
      <?php
        $writer_id = $writer["user_id"];
        $read = get_writer_read_count($writer_id);
      ?>
      <p class="mb-3">Total Read <?php echo $read; ?></p>
      <a href="/chat/chat?q=<?php echo $writer_id; ?>" class="btn btn-primary fw-bold">Message</a>
    </div>
  </div>
  <label for="" class="h4">Content</label>
  <hr>
  <?php
    $id = $writer["user_id"];
    $visits = get_previous_content_by_id($id);
    $contents = get_writer_content($id);
  ?>
  <div class="container">
    <div class="row" id="published_content">
      <?php if($contents): ?>
        <?php foreach($contents as $content): ?>
          <a href="/content/content_view_page?q=<?php echo $content["content_id"]; ?>" class="text-decoration-none text-dark">
                <div class="card mb-3 col-md-3">
                    <div class="card-body">
                        <img class="card-img-top" src="<?php echo $content["cover_img"]; ?>" alt="content">
                        <h5 class="card-title my-2"><?php echo $content["title"]; ?></h5>
                        <p class="card-text my-2">
                        <?php echo substr($content['created_time'],8,2)."-".substr($content['created_time'],5,2)."-".substr($content['created_time'],0,4); ?>
                        </p>
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
      <?php endif; ?>
    </div>
  </div>
</div>
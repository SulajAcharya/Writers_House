<?php
    $page_title = "User Profile";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $writer = get_only_user_details_by_passing_id($id);
    }
?>

<div class="container my-5" id="user_profile">
  <div class="row mb-5">
    <div class="col-md-2">
      <img  src="<?php echo $writer["img"]; ?>" alt="Writer Photo" class="img mb-3" id="user" style="border-radius: 50%;">
    </div>
    <div class="col-md-6 mb-3">
      <div class="col-mb-4 mb-3 mt-2 h3"><?php echo $writer["user_name"]; ?></div>
      <p class="mb-3"><?php echo $writer["description"]; ?></p>
      <a href="/chat/chat?q=<?php echo $writer_id; ?>" class="btn btn-primary fw-bold">Message</a>
    </div>
  </div>
  <label for="" class="h4">Content</label>
  <hr>
  <div class="container my-5">
    <div class="row">
        <div class="message">
            <p class="d-flex justify-content-center fw-bold text-light border border-primary rounded py-2 mx-5 bg-blue">No Content Published</p>
        </div>
    </div>
  </div>
</div>
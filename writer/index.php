<?php
    $page_title = "Writer Dashboard";
    require_once($_SERVER["DOCUMENT_ROOT"]."/writer/nav.php");

    $writer = get_user_details_by_id();
?>
<div class="container my-5" id="writer_detail">
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
      <p> Total Read <?php echo $read; ?></p>
    </div>
  </div>
  <ul class="row" id="content_previous_option">
    <li class="h4 content col-md-1 justify_content_start">
        <input type="radio" name="writer_radio" id="content" value="0" checked>
        <label for="content">Content</label>
    </li>
    <li class="h4 previous col-md-1 justify_content_start">
        <input type="radio" name="writer_radio" id="previous" value="1">
        <label for="previous">Previous</label>
    </li>
  </ul>
  <hr>
  <?php
    $id = $writer["user_id"];
    $visits = get_previous_content_by_id($id);
    $contents = get_writer_content($id);
  ?>
  <div class="row" id="published_content">
    <?php if($contents): ?>
      <?php foreach($contents as $content): ?>
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              <img class="card-img-top" src="<?php echo $content["img"]; ?>" alt="content">
              <h5 class="card-title my-2"><?php echo $content["title"]; ?></h5>
              <p class="card-text my-2">
                <?php echo substr($previous['start_time'],8,2)."-".substr($previous['start_time'],5,2)."-".substr($previous['start_time'],0,4); ?>
              </p>
              <div class="row">
                <?php
                  $id = $content["content_id"];
                  $c_comment = get_comment_count($id);
                ?>
                <div class="col-md-4">
                  <span><i class="fa-regular fa-eye"></i> <?php echo $previous["read_count"]; ?></span>
                </div>
                <div class="col-md-4">
                  <span><i class="fa-regular fa-message"></i> <?php echo $c_comment; ?></span>
                </div>
                <div class="col-md-4">
                  <span><i class="fa-regular fa-thumbs-up"></i> <?php echo $previous["like"]; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <div class="row" id="previous_visit_content">
    <?php if($visits): ?>
      <?php foreach($visits as $visit): ?>
        <div class="col-md-3">
          <?php
            $id = $visit["content_id"];
            $previous = get_content_by_passing_id($id);
          ?>
          <div class="card">
            <div class="card-body">
              <img class="card-img-top" src="<?php echo $previous["img"]; ?>" alt="content">
              <h5 class="card-title my-2"><?php echo $previous["title"]; ?></h5>
              <p class="card-text my-2">
                <?php echo substr($previous['start_time'],8,2)."-".substr($previous['start_time'],5,2)."-".substr($previous['start_time'],0,4); ?>
              </p>
              <div class="row">
                <?php
                  $id = $content["content_id"];
                  $p_comment = get_comment_count($id);
                ?>
                <div class="col-md-4">
                  <span><i class="fa-regular fa-eye"></i> <?php echo $previous["read_count"]; ?></span>
                </div>
                <div class="col-md-4">
                  <span><i class="fa-regular fa-message"></i> <?php echo $p_comment; ?></span>
                </div>
                <div class="col-md-4">
                  <span><i class="fa-regular fa-thumbs-up"></i> <?php echo $previous["like"]; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
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
      <p class="mb-3"> Total Read <?php echo $read; ?></p>
      <?php if($writer["verified"] == "0"): ?>
        <span class="badge bg-warning text-dark">Not Verified</span>
      <?php else: ?>
        <span class="badge bg-success">Verfied</span>
      <?php endif; ?>
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
  <div class="container">
    <div class="row" id="published_content">
      <div class="row">
        <?php if($contents): ?>
          <?php foreach($contents as $content): ?>
            <div class="col-md-3">
              <?php
                $id = $content["content_id"];
                $c_comment = get_comment_count($id);
              ?>
              <div class="card h-100">
                <div class="card-body">
                  <?php if($content["approved"] == '0'): ?>
                    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-warning text-dark">Pending</span>
                  <?php elseif($content["approved"] == '1'): ?>
                    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-success">Approved</span>
                  <?php else: ?>
                    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">Disapproved</span>
                  <?php endif; ?>
                  <a href="/content/content_view_page?q=<?php echo $content["content_id"]; ?>" class="text-decoration-none text-dark">
                    <img class="card-img-top img-fluid" src="<?php echo $content["cover_img"]; ?>" alt="content">
                    <h5 class="card-title my-2"><?php echo $content["title"]; ?></h5>
                    <div class="row mb-3">
                      <div class="d-flex justify-content-between gap-2">
                        <?php echo substr($content['created_time'], 8, 2) . "-" . substr($content['created_time'], 5, 2) . "-" . substr($content['created_time'], 0, 4); ?>
                        <a href="/writer/edit_content?q=<?php echo $content["content_id"]; ?>" class="btn btn-primary">
                          <span><i class="fas fa-edit"></i></span>
                        </a>
                        <a href="/writer/delete_content?q=<?php echo $content["content_id"]; ?>" class="btn btn-danger" id="delete_button" name="delete_button">
                          <span><i class="fa-solid fa-trash"></i></span>
                        </a>
                      </div>
                    </div>
                    <div class="row">
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
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="row" id="previous_visit_content">
      <div class="row">
        <?php if($visits): ?>
          <?php foreach($visits as $visit): ?>
            <?php
              $id = $visit["content_id"];
              $previous = get_content_by_passing_id($id);
            ?>
            <div class="col-md-3">
              <a href="/content/content_view_page?q=<?php echo $previous["content_id"]; ?>" class="text-decoration-none text-dark">
                <div class="card h-100">
                  <div class="card-body">
                    <img class="card-img-top" src="<?php echo $previous["cover_img"]; ?>" alt="content">
                    <h5 class="card-title my-2"><?php echo $previous["title"]; ?></h5>
                    <div class="row mb-3">
                      <div class="d-flex justify-content-between gap-2">
                        <?php echo substr($previous['created_time'], 8, 2) . "-" . substr($previous['created_time'], 5, 2) . "-" . substr($previous['created_time'], 0, 4); ?>
                        <a href="/writer/delete_previous?q=<?php echo $visit["id"]; ?>" class="btn btn-danger" id="delete_button" name="delete_button">
                          <span><i class="fa-solid fa-trash"></i></span>
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <?php
                        $id = $previous["content_id"];
                        $p_comment = get_comment_count($id);
                      ?>
                      <div class="col-md-4">
                        <span><i class="fa-regular fa-eye"></i> <?php echo $previous["read_count"]; ?></span>
                      </div>
                      <div class="col-md-4">
                        <span><i class="fa-regular fa-message"></i> <?php echo $p_comment; ?></span>
                      </div>
                      <div class="col-md-4">
                        <span><i class="fa-regular fa-thumbs-up"></i> <?php echo $previous["likes"]; ?></span>
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
</div>
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
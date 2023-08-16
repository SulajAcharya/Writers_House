<?php
    $page_title = "Writer Dashboard";
    require_once($_SERVER["DOCUMENT_ROOT"]."/writer/nav.php");
?>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
?>

<div class="container my-5" id="user_detail">
  <div class="row mb-5">
    <div class="col-md-2">
      <img  src="https://via.placeholder.com/150" alt="User Photo" class="img mb-3" id="user" style="border-radius: 50%;">
    </div>
    <div class="col-md-6 mb-3">
      <div class="col-mb-4 mb-3 mt-2 h3">Username</div>
      <p class="mb-3">Description</p>
      <p class=""> Total Read 225</p>
    </div>
  </div>
  <div class="row">
    <div class="h4 content col-md-1">Content</div>
    <div class="h4 previous col-md-2">Previous Visits</div>
  </div>
  <hr style = "height:2px;border-width:0;color:black;background-color:black">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <img class="card-img-top" src="https://via.placeholder.com/40" alt="content">
          <h5 class="card-title my-2">Title</h5>
          <p class="card-text my-2">22 June 2023</p>
          <div class="row">
            <div class="col-md-4">
              <span><i class="fa-regular fa-eye"></i> 22</span>
            </div>
            <div class="col-md-4">
              <span><i class="fa-regular fa-message"></i> 2</span>
            </div>
            <div class="col-md-4">
              <span><i class="fa-regular fa-thumbs-up"></i> 15</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
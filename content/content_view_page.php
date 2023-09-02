<?php
    $page_title = "Content View Page";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
      $id = trim($_GET["q"]);
      $content = get_content_by_passing_id($id);
    }
?>

<div class="container col-md-6 offset-md-3 shadow rounded mt-3 mb-3 border">
    <div class="row">
        <div class="title row mb-3">
            <h4 class="mt-3 text-center"><?php echo $content["title"]; ?></h4>
        </div>
        <?php
            $user_id = $content["user_id"];
            $writer = get_user_details_by_passing_id($user_id); 
        ?>
        <a href="/writer/writer_detail?q=<?php echo $writer["user_id"]; ?>" class="text-decoration-none text-dark">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="author_name mb-3">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end"><span>~by <?php echo $writer["user_name"]; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php
            $id = $content["content_id"];
            $comment = get_comment_count($id);
        ?>
        <div class="row mb-3 mt-3">
            <div class="row text-center">
                <div class="col-md-4">
                    <span><i class="fa-regular fa-eye"></i> <?php echo $content["read_count"]; ?></span>
                </div>
                <div class="col-md-4">
                    <span><i class="fa-regular fa-message"></i> <?php echo $comment; ?></span>
                </div>
                <div class="col-md-4">
                    <span><i class="fa-regular fa-thumbs-up"></i> <?php echo $content["likes"]; ?></span>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="container col-md-10 offset-md-1">
                <div class="col-md gap-2 text-end">
                    <button class="btn btn-primary mb-2" style="border-radius: 45%;height: 37px;" onclick="speakText()">
                        <span><i class="fas fa-volume-up"></i></span>
                    </button>
                    <button class="btn btn-primary mb-2" style="border-radius: 45%;height: 37px;">
                        <span><i class="fa-solid fa-music"></i></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="container border rounded mb-3 col-md-10 offset-md-1">
                <p id="content" name="content"><?php echo $content["writers_content"]; ?></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="container">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-md-10">
                            <h6>Comment</h6>
                        </div>
                        <div class="col-md text-end">
                            <span><i class="fa-regular fa-thumbs-up fa-xl" style="color: #2091F9;"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="container">
                <div class="col-md-10 offset-md-1">
                    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb-1">
            <div class="container">
                <div class="col-md-10 offset-md-1">
                    <div class="container shadow rounded mb-3">
                        <div class="row">
                            <div class="col-md-2 mt-2">
                                <img src="assets/img/images.png" style="border-radius: 50%;">
                            </div>
                            <div class="col-md-8">
                                <div class="columns">
                                    <div class="row">
                                        <div class="text">user_name</div>
                                    </div>
                                    <div class="row mb-1">
                                        <p class="text">comment</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <span><i class="fa-regular fa-thumbs-up fa-xl mt-4" style="color: #2091F9;"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function speakText() {
    const contentToSpeak = document.getElementById("content").textContent;
    const synth = window.speechSynthesis;

    // Check if speech synthesis is supported by the browser
    if ('speechSynthesis' in window) {
      const utterance = new SpeechSynthesisUtterance(contentToSpeak);
      synth.speak(utterance);
    } else {
      alert("Speech synthesis is not supported by your browser.");
    }
}
</script>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
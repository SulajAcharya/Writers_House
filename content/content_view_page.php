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
            $comment_count = get_comment_count($id);
        ?>
        <div class="row mb-3 mt-3">
            <div class="row text-center">
                <div class="col-md-4">
                    <span><i class="fa-regular fa-eye"></i> <?php echo $content["read_count"]; ?></span>
                </div>
                <div class="col-md-4">
                    <span><i class="fa-regular fa-message"></i> <?php echo $comment_count; ?></span>
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
                        <?php
                            $user_id = $_SESSION["user_id"];
                        ?>
                        <?php if(like_checking($id, $user_id) === true): ?>
                            <?php
                                $like = get_like_detail($id, $user_id);
                            ?>
                            <?php if($like["liked"] == '0'): ?>
                                <a href="" class="col-md text-decoration-none text-end">
                                    <span><i class="fa-regular fa-thumbs-up fa-xl" style="color: #2091F9;"></i></span>
                                </a>
                            <?php elseif($like["liked"] == '1'): ?>
                                <a href="" class="col-md text-decoration-none text-end">
                                    <span><i class="fa-solid fa-thumbs-up fa-xl" style="color: #2091F9;"></i></i></span>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="" class="col-md text-decoration-none text-end">
                                <span><i class="fa-regular fa-thumbs-up fa-xl" style="color: #2091F9;"></i></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="container">
                <div class="col-md-10 offset-md-1">
                    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="comment-submit" id="comment" name="comment">
                            <button class="btn btn-primary" type="submit" id="comment-submit" name="comment-submit">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $comments = get_comment($id);
        ?>
        <?php if($comments): ?>
            <?php foreach($comments as $comment): ?>
                <?php
                    $user = get_user_details_by_passing_id($user_id); 
                ?>
                <div class="row mb-1">
                    <div class="container">
                        <div class="col-md-10 offset-md-1">
                            <div class="container shadow rounded mb-3">
                                <div class="row">
                                    <div class="col-md-2 mt-2">
                                        <a href="" class="text-decoration-none">
                                            <img src="<?php echo $user["img"]; ?>" alt="profile image" style="border-radius: 50%;">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="columns">
                                            <div class="row">
                                                <div class="text"><?php echo $user["user_name"]; ?></div>
                                            </div>
                                            <div class="row mb-1">
                                                <p class="text h5"><?php echo $comment["comment"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function speakText() {
    const contentToSpeak = document.getElementById("content").textContent;
    const synth = window.speechSynthesis;

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
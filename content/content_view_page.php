<?php
    $page_title = "Content View Page";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
      $id = trim($_GET["q"]);
      $content = get_content_by_passing_id($id);
      $user_visit_id = $_SESSION["user_id"];
      insert_previous($user_visit_id, $id);
      read_count($id);
    }

    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]))
    {
		header("Location: /login/");
		exit(0);
	}

    if(isset($_POST["comment-submit"]))
    {
        insert_comment($_POST);
        $content_id = trim($_POST["content_id"]);
        current_page("q=$content_id");
    }
?>

<div class="container col-md-6 offset-md-3 shadow rounded mt-3 mb-3 border" id="content_view_page">
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
                    <button class="btn btn-primary mb-2" style="border-radius: 45%; height: 37px;" id="speak" name="speak">
                        <span><i class="fas fa-volume-up"></i></span>
                    </button>
                    <button class="btn btn-primary mb-2" id="music_button" name="music_button" style="border-radius: 45%;height: 37px;">
                        <span><i class="fa-solid fa-music"></i></span>
                    </button>
                    <?php if($content["genre_id"] == 1): ?>
                        <audio src="/assets/audio/horror.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 2): ?>
                        <audio src="/assets/audio/action.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 3): ?>
                        <audio src="/assets/audio/adventure.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 4): ?>
                        <audio src="/assets/audio/article.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 5): ?>
                        <audio src="/assets/audio/crime.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 6): ?>
                        <audio src="/assets/audio/drama.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 7): ?>
                        <audio src="/assets/audio/fanatasy.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 8): ?>
                        <audio src="/assets/audio/fiction.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 9): ?>
                        <audio src="/assets/audio/historical.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 10): ?>
                        <audio src="/assets/audio/historicfiction.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 11): ?>
                        <audio src="/assets/audio/humor.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 12): ?>
                        <audio src="/assets/audio/investigation.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 13): ?>
                        <audio src="/assets/audio/life.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 14): ?>
                        <audio src="/assets/audio/love.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 15): ?>
                        <audio src="/assets/audio/mystery.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 16): ?>
                        <audio src="/assets/audio/nonfiction.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 17): ?>
                        <audio src="/assets/audio/poetry.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 18): ?>
                        <audio src="/assets/audio/shortstory.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 19): ?>
                        <audio src="/assets/audio/spacefiction.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 20): ?>
                        <audio src="/assets/audio/superhero.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php elseif($content["genre_id"] == 21): ?>
                        <audio src="/assets/audio/thrilling.mp3" type="audio/mp3" id="audio_file" autostart="false" hidden></audio>
                    <?php endif; ?>
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
                            $vistor_id = $_SESSION["user_id"]; 
                        ?>
                        <?php if(like_checking($id, $vistor_id) === true): ?>
                            <?php
                                $like = get_like_detail($id, $vistor_id);
                            ?>
                            <?php if($like["liked"] == '0'): ?>
                                <a href="/content/update_like?q=<?php echo $id; ?>" class="col-md text-decoration-none text-end" id="add_like">
                                    <span><i class="fa-regular fa-thumbs-up fa-xl" style="color: #2091F9;"></i></span>
                                </a>
                            <?php elseif($like["liked"] == '1'): ?>
                                <a href="/content/update_like?q=<?php echo $id; ?>" class="col-md text-decoration-none text-end" id="remove_like">                                    <span><i class="fa-solid fa-thumbs-up fa-xl" style="color: #2091F9;"></i></i></span>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="/content/insert_like?q=<?php echo $id; ?>" class="col-md text-decoration-none text-end" id="insert_like">                                <span><i class="fa-regular fa-thumbs-up fa-xl" style="color: #2091F9;"></i></span>
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
                            <input type="text" class="form-control" aria-describedby="comment-submit" value="<?php echo $id; ?>" id="content_id" name="content_id" hidden>                            <button class="btn btn-primary" type="submit" id="comment-submit" name="comment-submit">Comment</button>
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
                    $comment_user = $comment["user_id"];
                    $user = get_user_details_by_passing_id($comment_user); 
                ?>
                <div class="row mb-1">
                    <div class="container">
                        <div class="col-md-10 offset-md-1">
                            <div class="container shadow rounded mb-3">
                                <div class="row">
                                    <div class="col-md-2 my-2">
                                        <?php if($user["role"] == "user"): ?>
                                            <a href="/user/user_detail?q=<?php echo $user["user_id"]; ?>" class="text-decoration-none">
                                                <img src="<?php echo $user["img"]; ?>" alt="profile image" id="comment_image" name="comment_image" style="border-radius: 50%;">
                                            </a>
                                        <?php else: ?>
                                            <a href="/writer/writer_detail?q=<?php echo $user["user_id"]; ?>" class="text-decoration-none">
                                                <img src="<?php echo $user["img"]; ?>" alt="profile image" id="comment_image" name="comment_image" style="border-radius: 50%;">
                                            </a>
                                        <?php endif; ?>
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
    var audioElement = document.getElementById('audio_file');
    var musicButton = document.getElementById('music_button');

    musicButton.addEventListener('click', function() {
        if (audioElement.paused) {
            audioElement.play();
        } else {
            audioElement.pause();
        }
    });
</script>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
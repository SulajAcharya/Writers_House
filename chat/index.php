<?php
    $page_title = "Messages";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]) || !isset($_SESSION["role"]))
    {
        header("Location: /");
        exit(0);
    }
?>

<div class="container" id="message">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="search">
                <input type="text" placeholder="Enter an users to search" class="mt-3 w-100 p-3">
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <?php
                        $users = chat_list();
                    ?>
                    <?php if($users): ?>
                        <?php foreach($users as $user): ?>
                            <div class="profile mb-5">
                                <a href="/chat/chat?q=<?php echo $user["user_id"]; ?>" class="text-decoration-none text-dark">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo $user["img"]; ?>" alt="profile pic" id="profile_pic">
                                        </div>
                                        <div class="col-9">
                                            <div class="card-title h5"><?php echo $user["user_name"]; ?></div>
                                            <div class="card-text">You:Hi</div>
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
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
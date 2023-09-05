<?php
    $page_title = "Messages";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]) || !isset($_SESSION["role"]))
    {
        header("Location: /");
        exit(0);
    }

    if(isset($_POST["submit"]))
    {
        $search = trim($_POST["search"]);
        echo "<script>window.location='/chat/search?q=$search';</script>";
    }
?>

<div class="container" id="message">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
                <div class="search">
                    <input type="text" id="search" name="search" placeholder="Enter an users to search" class="mt-3 w-100 p-3">
                    <input type="submit" class="d-none" id="submit" name="submit">
                </div>
            </form>
            <div class="card mt-4">
                <div class="card-body">
                    <?php
                        $users = chat_list();
                        $user_id = $_SESSION["user_id"];
                    ?>
                    <?php if($users): ?>
                        <?php foreach($users as $user): ?>
                            <?php if ($user["user_id"] != $user_id): ?>
                                <div class="profile mb-5">
                                    <a href="/chat/chat?q=<?php echo $user["user_id"]; ?>" class="text-decoration-none text-dark">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="<?php echo $user["img"]; ?>" alt="profile pic" id="profile_pic">
                                            </div>
                                            <?php
                                                $incoming_id = $user["unique_id"];
                                                $receiver = get_user_details_by_passing_id($user_id);
                                                $outgoing_id = $receiver["unique_id"];
                                                $last_message = get_last_message_from_chat($incoming_id, $outgoing_id);
                                            ?>
                                            <div class="col-10">
                                                <div class="card-title h5"><?php echo $user["user_name"]; ?></div>
                                                <?php if($last_message): ?>
                                                    <?php if($last_message["outgoing_id"] == $outgoing_id): ?>
                                                        <div class="card-text">You: <?php echo $last_message["msg"]; ?></div>
                                                    <?php elseif($last_message["outgoing_id"] == $incoming_id): ?>
                                                        <div class="card-text"><?php echo $last_message["msg"]; ?></div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="card-text">No message available</div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
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
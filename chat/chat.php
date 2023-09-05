<?php
    $page_title = "Chat";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $receiver = get_user_details_by_passing_id($id);
    }
?>

<div class="container" id="chat">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php
                $sender_id = $_SESSION["user_id"];
                $sender = get_user_details_by_passing_id($sender_id); 
                $outgoing_id = $sender['unique_id'];
                $incoming_id = $receiver['unique_id'];
            ?>
            <?php
                $chats = get_chat($incoming_id, $outgoing_id);
            ?> 
            <div class="card">
                <div class="card-header chat-header d-flex justify-content-start align-items-center shadow pb-3 bg-body">
                    <a href="/chat/" class="text-decoration-none text-dark"><i class="fa fa-arrow-left col-md-1"></i></a>
                    <img src="<?php echo $receiver['img']; ?>" alt="" class="col-md-1">
                    <p class="h4"><?php echo $receiver['user_name']; ?></p>   
                </div>
                <div class="chat-box card-body">
                    <?php if($chats): ?>
                        <?php foreach($chats as $chat): ?>
                            <?php if($chat['outgoing_id'] == $outgoing_id AND $chat['incoming_id'] = $incoming_id): ?>
                                <div class="mb-1" id="outgoing_msg">
                                    <div class="detail">
                                        <div class="row">
                                            <p class="d-flex justify-content-end fw-bold">
                                                <?php echo $chat['msg']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($chat['outgoing_id'] == $incoming_id AND $chat['incoming_id'] = $outgoing_id): ?>
                                <div class="mb-1" id="incoming_msg">
                                    <div class="detail">
                                        <div class="row">
                                            <p class="d-flex justify-content-start fw-bold">
                                                <?php echo $chat['msg']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <form role="form" action="#" method="post" enctype="multipart/form-data" class="chat_input input-group">
                    <input type="text" name="outgoing_id" id="outgoing_id" value="<?php echo $sender['unique_id']; ?>" hidden>
                    <input type="text" name="incoming_id" id="incoming_id" value="<?php echo $receiver['unique_id']; ?>" hidden>
                    <input type="text" class="form-control" placeholder="Type here" id="msg" name="msg" class="input-field" aria-describedby="chat-icon">
                    <button class="btn btn-primary" type="submit" id="chat-icon" name="chat-icon" data-mdb-ripple-color="dark">
                        <i class="fab fa-telegram-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
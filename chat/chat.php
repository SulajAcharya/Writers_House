<?php
    $page_title = "Chat";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $user = get_user_details_by_passing_id($id);
    }

    if(isset($_POST["chat-icon"]))
    {
        insert_chat($_POST);
        current_page();
    }
?>

<div class="container" id="chat">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header chat-header d-flex justify-content-start align-items-center shadow pb-3 bg-body">
                    <a href="/chat/" class="text-decoration-none text-dark"><i class="fa fa-arrow-left col-md-1"></i></a>
                    <img src="<?php echo $user["img"]; ?>" alt="" class="col-md-1">
                    <p class="h4"><?php echo $user["user_name"]; ?></p>    
                </div>
                <div class="chat-box card-body">
                    <div class="mb-4" id="incoming_msg">
                        <div class="detail">
                            <div class="row">
                                <p class="d-flex justify-content-start fw-bold">
                                    How are you I am fine ou look greate
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4" id="outgoing_msg">
                        <div class="detail">
                            <div class="row">
                                <p class="d-flex justify-content-end fw-bold">
                                    How are you I am fine ou look greate gydfhkuzhviaehwjlhliJLIdvjlh
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data" class="chat_input input-group">
                    <input type="text" name="outgoing_id" id="outgoing_id" value="" hidden>
                    <input type="text" name="incoming_id" id="incoming_id" value="" hidden>
                    <input type="text" class="form-control" placeholder="Type here" id="msg" name="msg" aria-describedby="chat-icon">
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
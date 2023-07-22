<?php
    $page_title = "Chat";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
?>

<div class="container" id="chat">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-start align-items-center shadow pb-3 mb-5 bg-body">
                    <i class="fa fa-arrow-left col-md-1"></i>
                    <img src="" alt="" class="col-md-1">
                    <p class="h4">Ajay Kumar</p>    
                </div>
                <div class="chat-box card-body">
                    
                </div>
                <div class="card-footer d-flex justify-content-start align-items-center p-3">
                    <div class="input-group">
                        <form action="#" class="typing-area" autocomplete="off">
                            <input type="text" name="outgoing_id" value="" hidden>
                            <input type="text" name="incoming_id" value="" hidden>
                            <input type="text" class="form-control" name="message" class="input-field" placeholder="Type here">
                            <span class="btn btn-primary"><i class="fab fa-telegram-plane"></i></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
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
                <div class="chat_input input-group mb-3">
                    <input type="text" name="outgoing_id" value="" hidden>
                    <input type="text" name="incoming_id" value="" hidden>
                    <input type="text" class="form-control" placeholder="Type here" aria-describedby="chat-icon">
                    <button class="btn btn-primary" type="button" id="chat-icon" data-mdb-ripple-color="dark">
                        <i class="fab fa-telegram-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
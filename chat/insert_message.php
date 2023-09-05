<?php
	require_once($_SERVER["DOCUMENT_ROOT"]. "/includes/db.php");
    require_once($_SERVER["DOCUMENT_ROOT"]. "/includes/function.php");

    if(isset($_POST['category_id']) && isset($_POST['subject_id'])) {
        $outgoing_id = $_POST['outgoing_id'];
        $incoming_id = $_POST['incoming_id'];
        $msg = $_POST['msg'];
        if(!empty($message)){
            insert_chat($outgoing_id, $incoming_id, $msg);
        }
    }else{
        header("/login.php");
    }
?>
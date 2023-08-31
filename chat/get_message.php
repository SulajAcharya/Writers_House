<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/db.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/function.php");

    $incoming_id = $_SESSION["incoming_id"];
    $outgoing_id = $_SESSION["outgoing_id"];
    $newMessages = get_chat($incoming_id, $outgoing_id);
    header('Content-Type: application/json');
    echo json_encode($newMessages);
?>

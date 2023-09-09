<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/db.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/function.php");

    if (isset($_POST['incoming_id']) && isset($_POST['outgoing_id'])) {
        $incoming_id = $_POST['incoming_id'];
        $outgoing_id = $_POST['outgoing_id'];

        $chats = get_chat($incoming_id, $outgoing_id);
        if ($chats !== false) {
            foreach ($chats as $chat) {
                echo '<p>' . htmlspecialchars($chat['msg']) . '</p>';
            }
        } else {
            echo '<p>No chat messages found.</p>';
        }
    } else {
        echo '<p>Invalid request.</p>';
    }
?>

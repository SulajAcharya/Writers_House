<?php
    $page_title = "Delete previous";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $content = get_content_by_passing_id($id);
        $user_id = $_SESSION["user_id"];
        if($content["user_id"] = $user_id)
        {
            delete_previous($id);
        }
    }

    echo "<script>window.location='/user/';</script>";
    exit(0);
?>
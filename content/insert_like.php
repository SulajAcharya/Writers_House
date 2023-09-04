<?php
    $page_title = "Insert Like";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $user_id = $_SESSION["user_id"];
        insert_like($id, $user_id);
        increase_like_count($id);
    }

    echo "<script>window.location='/content/content_view_page?q=$id';</script>";
    exit(0);
?>
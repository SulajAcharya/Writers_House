<?php
    $page_title = "Update Like";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $user_id = $_SESSION["user_id"];
        $liked = get_like_detail($id, $user_id);
    }

    if($liked["liked"] == 0)
    {
        $like = '1';
        update_like($id, $user_id, $like);
        increase_like_count($id);
    }
    
    if($liked["liked"] == 1)
    {
        $like = '0';
        update_like($id, $user_id, $like);
        decrease_like_count($id);
    }

    echo "<script>window.location='/content/content_view_page?q=$id';</script>";
    exit(0);
?>
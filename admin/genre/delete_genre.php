<?php
    $page_title = "Genre Activate/Deactivate";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        delete_genre_by_id($id);
    }

    echo "<script>window.location='/admin/genre/';</script>";
    exit(0);
?>
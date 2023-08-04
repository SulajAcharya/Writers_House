<?php
    $page_title = "Genre Activate/Deactivate";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $genre = genre_by_id($id);
    }
    
    if($genre['deactivate'] === "0")
    {
        $deactivate = '1';
        activate_deactivate_genre($id, $deactivate);
    }
    else
    {
        $deactivate = '0';
        activate_deactivate_genre($id, $deactivate);
    }
    echo "<script>window.location='/admin/genre/';</script>";
    exit(0);
?>
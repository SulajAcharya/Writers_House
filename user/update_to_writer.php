<?php
    $page_title = "Update to Writer";
    require_once($_SERVER["DOCUMENT_ROOT"]."/user/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        update_to_writer($id);
    }
    echo "<script>window.location='/".$_SESSION["role"]."';</script>";
    exit(0);
?>
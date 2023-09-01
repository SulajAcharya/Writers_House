<?php
    $page_title = "User Verify";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $writer = get_user_details_by_passing_id($id);
    }
    
    if($writer["verified"] === "0")
    {
        $verified = '1';
        verify_user($verified,$id);
    }

    echo "<script>window.location='/admin/writer/';</script>";
    exit(0);
?>
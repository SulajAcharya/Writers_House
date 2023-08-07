<?php
    $page_title = "User Verify";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $user = user_by_id($id);
    }
    
    if($user["verified"] === "0")
    {
        $verified = '1';
        verify_user($verified,$id);
    }

    echo "<script>window.location='/admin/user/';</script>";
    exit(0);
?>
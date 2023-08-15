<?php
    $page_title = "User Verify";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $writer = user_by_id($id);
    }
    
    if($writer["role"] === "user")
    {
        $role = 'writer';
        update_role($role,$id);
    }
    elseif($writer["role"] === "writer")
    {
        $role = 'admin';
        update_role($role,$id);
    }
    else
    {
        $role = 'user';
        update_role($role,$id);
    }

    echo "<script>window.location='/admin/writer/';</script>";
    exit(0);
?>
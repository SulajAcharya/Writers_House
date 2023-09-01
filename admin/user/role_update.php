<?php
    $page_title = "User Verify";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $user = get_user_details_by_passing_id($id);
    }
    
    if($user["role"] === "user")
    {
        $role = 'writer';
        update_role($role,$id);
    }
    elseif($user["role"] === "writer")
    {
        $role = 'admin';
        update_role($role,$id);
    }
    else
    {
        $role = 'user';
        update_role($role,$id);
    }

    echo "<script>window.location='/admin/user/';</script>";
    exit(0);
?>
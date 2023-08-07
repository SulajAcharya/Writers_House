<?php
    $page_title = "Genre Adding";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");
?>

<div class="container" id="genre">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card my-3">
                    <div class="card-header">
                        User List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center table_heading">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Email Address</th>
                                        <th>Verified</th>
                                        <th>Block</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($users = user_list()): ?>
                                    <?php
                                        $number = 1;
                                        foreach($users as $user):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $user['email_address']; ?></td>
                                        <td>
                                            <?php if($user["verified"] === "0"): ?>
                                                <a href="/admin/user/verify_user?q=<?php echo $user["user_id"]; ?>" class="btn btn-sm btn-warning mx-auto d-block col-6" id="p_verified" name="p_verified"><span class="fa fa-dot-circle"></span> Not Verified</a>
                                            <?php else: ?>
                                                <button class="btn btn-sm btn-success mx-auto d-block col-6" id="verified" name="verified"><span class="fa fa-check-square"></span> Verified</button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($user["block"] === "0"): ?>
                                                <a href="/admin/user/block_user?q=<?php echo $user["user_id"]; ?>" class="btn btn-sm btn-success mx-auto d-block col-6" id="n_block" name="n_block"><span class="fa-solid fa-check"></span> Not Block</a>
                                            <?php else: ?>
                                                <a href="/admin/user/block_user?q=<?php echo $user["user_id"]; ?>" class="btn btn-sm btn-danger mx-auto d-block col-6" id="block" name="block"><span class="fa-solid fa-close"></span> Blocked</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/admin/user/user_detail?q=<?php echo $user["user_id"]; ?>" class="btn btn-sm btn-primary mx-auto d-block col-6" id="detail" name="detail"><span class="fa-solid fa-circle-info"></span> Detail</a>
                                        </td>
                                    </tr>
                                    <?php
                                        $number += 1;
                                        endforeach;
                                    ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
?>
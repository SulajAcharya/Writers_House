<?php
    $page_title = "Writer";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");
?>

<div class="container" id="genre">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card my-3">
                    <div class="card-header">
                        Writer List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center table_heading">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Email Address</th>
                                        <th>Role</th>
                                        <th>Verified</th>
                                        <th>Block</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($writers = writer_list()): ?>
                                    <?php
                                        $number = 1;
                                        foreach($writers as $writer):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $writer['email_address']; ?></td>
                                        <td>
                                            <?php if($writer["role"] === "user"): ?>
                                                <a href="/admin/writer/role_update?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-primary mx-auto d-block col-6" id="user" name="user"><span class="fas fa-user"></span> User</a>
                                            <?php elseif($writer["role"] === "writer"): ?>
                                                <a href="/admin/writer/role_update?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-warning mx-auto d-block col-6" id="writer" name="writer"><span class="fas fa-user-edit"></span> Writer</a>
                                            <?php else: ?>
                                                <a href="/admin/writer/role_update?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-danger mx-auto d-block col-6" id="admin" name="admin"><span class="fas fa-user-cog"></span> Admin</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($writer["verified"] == "0"): ?>
                                                <a href="/admin/writer/verify_writer?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-warning mx-auto d-block col-6" id="p_verified" name="p_verified"><span class="fa fa-dot-circle"></span> Not Verified</a>
                                            <?php else: ?>
                                                <button class="btn btn-sm btn-success mx-auto d-block col-6" id="verified" name="verified"><span class="fa fa-check-square"></span> Verified</button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($writer["block"] == "0"): ?>
                                                <a href="/admin/writer/block_writer?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-success mx-auto d-block col-6" id="n_block" name="n_block"><span class="fa-solid fa-check"></span> Not Block</a>
                                            <?php else: ?>
                                                <a href="/admin/writer/block_writer?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-danger mx-auto d-block col-6" id="block" name="block"><span class="fa-solid fa-close"></span> Blocked</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/admin/writer/writer_detail?q=<?php echo $writer["user_id"]; ?>" class="btn btn-sm btn-primary mx-auto d-block col-6" id="detail" name="detail"><span class="fa-solid fa-circle-info"></span> Detail</a>
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
<?php
    $page_title = "Pending Content";
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
                                        <th>Title</th>
                                        <th>One Liner</th>
                                        <th>Writer</th>
                                        <th>Genre</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($contents = get_pending_content_list()): ?>
                                    <?php
                                        $number = 1;
                                        foreach($contents as $content):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $content['title']; ?></td>
                                        <td><?php echo $content['one_liner']; ?></td>
                                        <td>
                                            <?php 
                                                $id = $content["user_id"];
                                                $writer = get_user_details_by_passing_id($id);
                                            ?>
                                            <?php echo $writer["email_address"]; ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $id = $content["genre_id"];
                                                $genre = genre_by_id($id);
                                            ?>
                                            <?php echo $genre["name"]; ?>
                                        </td>
                                        <td>
                                            <a href="/admin/content/content_detail?q=<?php echo $content["content_id"]; ?>" class="btn btn-sm btn-primary mx-auto d-block col-md-12" id="detail" name="detail"><span class="fa-solid fa-circle-info"></span> Detail</a>
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
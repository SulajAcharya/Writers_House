<?php
    $page_title = "Feedback List";
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
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($feedbacks = get_feedback()): ?>
                                    <?php
                                        $number = 1;
                                        foreach($feedbacks as $feedback):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $feedback['email_address']; ?></td>
                                        <td><?php echo $feedback['feddback_comment']; ?></td>
                                        <td>
                                            <?php echo $feedback["rating"]; ?>
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
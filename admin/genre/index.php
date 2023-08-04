<?php
    $page_title = "Genre Adding";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_POST["genre_add"]))
    {
        add_genre($_POST);
        current_page();
    }
?>

<div class="container" id="genre">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card my-3">
                    <div class="card-header">
                        Add Genre
                    </div>
                    <div class="card-body">
                        <?php error_message(); ?>
                        <form role="form" action="<?php echo action_form(); ?>" class="form-group" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="genre_name" class="fw-bold d-flex justify-content-end col-form-label">Genre:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Genre Name" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" id="genre_add" name="genre_add" class="btn btn-success">Add <span class="fa fa-circle-plus"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-header">
                        Genre List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center table_heading">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Activate/Deactivate</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($genres = get_genre_list()): ?>
                                    <?php
                                        $number = 1;
                                        foreach($genres as $genre):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $genre['name']; ?></td>
                                        <td>
                                            <a href="/admin/genre/edit_genre.php?q=<?php echo $genre["genre_id"]; ?>" class="btn btn-sm btn-success mx-auto d-block col-6" id="edit" name="edit"><span class="fa-solid fa-edit"></span> Edit</a>
                                        </td>
                                        <td>
                                            <?php if($genre["deactivate"] === "0"): ?>
                                                <a href="/admin/genre/activate_deactivate_genre.php?q=<?php echo $genre["genre_id"]; ?>" class="btn btn-sm btn-success mx-auto d-block col-3" id="activate" name="activate"><span class="fa-solid fa-check"></span> Activate</a>
                                            <?php else: ?>
                                                <a href="/admin/genre/activate_deactivate_genre.php?q=<?php echo $genre["genre_id"]; ?>" class="btn btn-sm btn-danger mx-auto d-block col-3" id="deactivate" name="deactivate"><span class="fa-solid fa-close"></span> Deactivate</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/admin/genre/delete_genre.php?q=<?php echo $genre["genre_id"]; ?>" class="btn btn-sm btn-danger mx-auto d-block col-6" id="delete" name="delete"><span class="fa-solid fa-trash"></span> Delete</a>
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
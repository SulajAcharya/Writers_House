<?php
    $page_title = "Genre Editing";
    require_once($_SERVER["DOCUMENT_ROOT"]."/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $genre = genre_by_id($id);
    }

    if(isset($_POST["genre_update"]))
    {
        $name = trim($_POST["name"]);
        update_genre($name,$id);
        current_page("q=$id");
    }
?>

<div class="container" id="genre">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card my-3">
                    <div class="card-header">
                        Update Genre
                    </div>
                    <div class="card-body">
                        <?php error_message(); ?>
                        <form role="form" action="<?php echo action_form("q=" . $genre["genre_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="genre_name" class="fw-bold d-flex justify-content-end col-form-label">Genre:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Genre Name" value="<?php echo $genre["name"]; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" id="genre_update" name="genre_update" class="btn btn-primary">Edit <span class="fa fa-edit"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
?>
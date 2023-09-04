<?php
    $page_title = "Add Content";
    require_once($_SERVER["DOCUMENT_ROOT"]."/writer/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = trim($_GET["q"]);
        $content = get_content_by_passing_id($id);
    }

    if(isset($_POST["publish"]))
    {
        $content_id = trim($_POST["content_id"]);
        update_content($_POST, $content_id);
        current_page("q=$content_id");
    }
?>

<div class="container col-md-6 shadow rounded mb-3 border mt-4" id="add_content">
    <?php error_message(); ?>
    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-4 mt-3">
            <div class="col-md-3">
                <div class="card shadow border align-items-center justify-content-center mb-3" id="card1">
                    <img src="<?php echo $content["cover_img"]; ?>" class="img-thumbnail" id="display_image">
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mb-3">
                    <div class="col-md-1">
                        <label for="title" class="h5">Title</label>
                    </div>
                    <div class="col-md">
                        <input type="text" class="form-control shadow mb-0 border" id="title" name="title" value="<?php echo $content["title"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="one_liner" class="h5">One Linear</label>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control shadow rounded border" id="one_liner" name="one_liner"><?php echo $content["one_liner"]; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genre_id" class="h5">Genre</label>
                        <select name="genre_id" id="genre_id" class="form-control">
                            <?php
                                $genre_id = $content["genre_id"];
                                $g_name = genre_by_id($genre_id);
                            ?>
                            <option value ="<?php echo $genre_id; ?>"><?php echo $g_name["name"]; ?></option>
                            <?php if($genres = get_genre_list()): ?>
                                <?php foreach($genres as $genre): ?>
                                    <?php if ($genre["genre_id"] != $genre_id): ?>
                                        <option value ="<?php echo $genre["genre_id"];?>"><?php echo $genre["name"]; ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="h5">Add/Edit Image</label>
                        <input type="file" class="form-control" name="image" id="image" value="<?php echo $content["cover_img"]; ?>" onchange="updateImage(this)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <textarea class="form-control shadow rounded border" rows="12" id="writers_content" name="writers_content"><?php echo $content["writers_content"]; ?></textarea>
                <input type="text" name="content_id" id="content_id" class="d-none" value="<?php echo $content["content_id"]; ?>">
            </div>
        </div>
        <div class="col-md text-end">
            <button type="sumbit" class="btn btn-primary mb-3" id="publish" name="publish">
                Update
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('image');
            const displayImage = document.getElementById('display_image');
            const imageDataInput = document.getElementById('image');

            imageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        displayImage.src = event.target.result;
                        displayImage.style.display = 'block';
                        imageDataInput.value = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
</script>


<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
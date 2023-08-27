<?php
    $page_title = "Add Content";
    require_once($_SERVER["DOCUMENT_ROOT"]."/writer/nav.php");

    if(isset($_POST["publish"]))
    {
        add_content($_POST);
        current_page();
    }
?>

<div class="container col-md-6 shadow rounded mb-3 border mt-4" id="add_content">
    <?php error_message(); ?>
    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-4 mt-3">
            <div class="col-md-3">
                <div class="card shadow border align-items-center justify-content-center mb-3" id="card1">
                    <img src="" class="img-thumbnail" id="display_image">
                    <div class="btn btn-primary" id="btn_circle">
                        <label for="add" class="fw-bold">+</label>
                        <input type="file" class="d-none" name="add" id="add" onchange="updateImage(this)">
                    </div>
                </div>
                <div class="btn btn-primary align-items-center justify-content-center col-md-12">
                    <label for="change" class="fw-bold">Edit Image</label>
                    <input type="file" class="d-none" name="change" id="change" onchange="updateImage(this)">
                </div>
                <input type="hidden" id="image" name="image" value="">
            </div>
            <div class="col-md-9">
                <div class="row mb-3">
                    <div class="col-md-1">
                        <h5>Title</h5>
                    </div>
                    <div class="col-md">
                        <input type="text" class="form-control shadow mb-0 border" id="title" name="title">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="one_liner" class="h5">One Linear</label>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control shadow rounded border" id="one_liner" name="one_liner"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Genre</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md mb-3">
                        <select name="genre_id" id="genre_id" class="form-control" required>
                            <option>Select</option>
                            <?php if($genres = get_genre_list()): ?>
                                <?php foreach($genres as $genre): ?>
                                    <option value ="<?php echo $genre["genre_id"];?>"><?php echo $genre["name"]; ?></option>
                                <?php endforeach ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <textarea class="form-control shadow rounded border" rows="10" id="writers_content" name="writers_content"></textarea>
            </div>
        </div>
        <div class="col-md text-end">
            <button type="sumbit" class="btn btn-primary mb-3" id="publish" name="publish">
                Publish
            </button>
        </div>
    </form>
</div>

<script>
    function updateImage(input) {
        const displayedImage = document.getElementById('display_image');
        const imageDataInput = document.getElementById('image');
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                displayedImage.src = e.target.result;
                imageDataInput.value = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
<?php
    $page_title = "Feedback";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_POST["submit"]))
    {
        feedback_response($_POST);
        current_page();
    }
?>



<div class="container" id="feedback">
        <div class="row">
            <div class="card mt-5 col-md-8 offset-md-2 shadow pb-3 bg-body rounded">
                <div class="card-body m-3">
                    <?php error_message(); ?>
                    <form role="form" action="<?php echo action_form(); ?>" class="form-group" method="post" enctype="multipart/form-data">
                        <h1 class="mt-5 mb-4 ms-4 fw-bold text-primary">Feedback</h1>
                        <p class="mb-2 mx-4 h5">Email Id</p>
                        <div class="mb-4 mx-4">
                            <input type="text" class="form-control me-5" id="email_address" name="email_address" placeholder="Email" required>
                        </div>
                        <p class="mb-2 mx-4 h5">Feedback</p>
                        <div class="mb-4 mx-4">
                            <textarea class="form-control" aria-label="With textarea" name="feddback_comment" id="feddback_comment" placeholder="Feedback" required></textarea>
                        </div>
                        <div class="row mb-4">
                            <div class="ms-4 col-md-2 h5">Rating</div>
                            <div class="col-md-3" id="rate" name="rate">
                                <input type="radio" class="form-check-input" name="rating" id="rating" value="Great" required>
                                <label class="h6" for="btnradio1">Great</label>
                            </div>
                            <div class="col-md-3" id="rate" name="rate">
                                <input type="radio" class="form-check-input" name="rating" id="rating" value="Satisfied" required>
                                <label class="h6" for="btnradio2">Satisfied</label>
                            </div>
                            <div class="col-md-3" id="rate" name="rate">
                                <input type="radio" class="form-check-input" name="rating" id="rating" value="Poor" required>
                                <label class="h6" for="btnradio3">Poor</label>
                            </div>
                        </div>
                        <div class="mb-2 mx-4 d-grid">
                            <button type="submit" class="btn btn-primary fw-bold" id="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
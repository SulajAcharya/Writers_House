<?php
    $page_title = "Feedback";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if(isset($_POST["submit"]))
    {
        feedback_response($_POST);
        current_page();
    }
?>



<div class="container">
        <div class="row">
            <div class="card mt-5 col-md-8 offset-md-2 shadow pb-3 bg-body rounded">
                <div class="card-body m-3">
                    <?php error_message(); ?>
                    <form role="form" action="<?php echo action_form(); ?>" class="form-group" method="post" enctype="multipart/form-data">
                        <h1 class="mt-5 mb-4 ms-4 fw-bold text-primary">Feedback</h1>
                        <p class="mb-1 mx-4">Enter Email Id</p>
                        <div class="mb-4 mx-4">
                            <input type="text" class="form-control me-5" id="email_address" name="email_address" placeholder="Email" required>
                        </div>
                        <p class="mb-1 mx-4">Feedback</p>
                        <div class="mb-4 mx-4">
                            <textarea class="form-control" aria-label="With textarea" name="feddback_comment" id="feddback_comment" placeholder="Feedback" required></textarea>
                        </div>
                        <div class="mb-1 mx-4">Rating</div>
                        <div class="row mb-4 mx-2">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="rate">
                                <input type="radio" class="btn-check" name="rating" id="rating" autocomplete="off" value="Great" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Great</label>
                            
                                <input type="radio" class="btn-check" name="rating" id="rating" autocomplete="off" value="Satisfied">
                                <label class="btn btn-outline-primary" for="btnradio2">Satisfied</label>
                            
                                <input type="radio" class="btn-check" name="rating" id="rating" autocomplete="off" value="Poor">
                                <label class="btn btn-outline-primary" for="btnradio3">Poor</label>
                            </div>
                        </div>
                        <div class="mb-2 mx-5 d-grid">
                            <button type="submit" class="btn btn-primary fw-bold" id="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
?>
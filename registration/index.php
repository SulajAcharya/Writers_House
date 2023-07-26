<?php
    $page_title="Sign Up";

    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
  if(isset($_POST["registration"]))
  {
    registration($_POST);
    redirect_to_current_page();
  }

?>
<div class="container mt-4" id="sign_up">
    <div class="row justify-content-center">
      
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">
        <h2 class="d-flex justify-content-start mb-4" style="color:blue">Sign Up</h2>
        <form role="form" action="<?php echo get_action_attr_value_for_current_page(); ?>" class="form-group" method="post" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label fw-bold text-uppercase" for="fname">First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" id="fname" name="fname" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold text-uppercase" for="lname">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" id="lname" name="lname" required>
            </div>
        </div>
        <div class="row mb-3">
              <div class="col-md-6">
                  <label class="form-label fw-bold text-uppercase" for="email_address">Email-ID</label>
                  <input type="text" class="form-control" placeholder="Enter Email-ID" id="email_address" name="email_address" required>
              </div>
              <div class="col-md-6">
                  <label class="form-label fw-bold text-uppercase" for="user_name">Username</label>
                  <input type="text" class="form-control" placeholder="Enter Username" id="user_name" name="user_name" required>
              </div>
        </div>
        <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold text-uppercase" for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Enter Password" id="password" name="password" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold text-uppercase" for="conf_pass">Confirm Password</label>
                    <input type="text" class="form-control" placeholder="Re-Enter Password" id="conf_pass" name="conf_pass" required>
                </div>
        </div>
          <div class="col-md-9">
            <label class="form-label fw-bold text-uppercase" for="img">Photo</label>
            <input type="file" class="form-control-file" id="img" name="img">
          </div>
          <br>
          <div class="col-md-7">
            <input type="checkbox" id="acknowledgement" name="acknowledgement" value="acknowledgement">
            <label class="form-label " for="acknowledgement"> I Agree With Terms & Services</label><br>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button" id="registration" name="registration">Register</button>
          </div>
          <p class="text-center"> Already A User? <a href=""> Sign Up.</a> </p>
           
          

          
        </form>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
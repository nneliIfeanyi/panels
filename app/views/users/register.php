<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body shadow my-5">
      <h2>Create An Account</h2>
      <p>Please fill this form to register with us</p>
      <div id="success-msg"></div>
      <form action="" id="register_form" method="post">
        <div class="form-group mb-2">
            <label>User Name</label>
            <input type="text" name="name" required data-parsley-pattern="^[a-zA-Z0-9@_# ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['name']; ?>">  
        </div> 
        <div class="form-group mb-2">
            <label>Email Address</label>
            <input type="text" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['email']; ?>"> 
        </div>    
        <div class="form-group mb-2">
            <label>Password</label>
            <input type="password" name="password" id="password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['password'];?>">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" data-parsley-equalto="#password" data-parsley-trigger="keyup" required class="form-control form-control-lg" value="">
            
        </div>

        <div class="form-row mt-3">
          <div class="col">
            <input type="submit" id="submit" class="btn btn-primary btn-block" value="Register">
          </div>
          
          <div class="col mt-3">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-outline-secondary btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
    <div class="col-md-6 mb-5 mx-auto">
      <div class="card card-body bg-light mt-5">
    
        <h2>Input new password</h2>
      
        <form action="<?php echo URLROOT; ?>/admin/reset_pwd" method="post">
            
          <div class="form-group mb-2">
              <label>Password:<sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>

          <div class="form-row">
            <div class="col-6 mb-2">
              <input type="submit" class="btn btn-success btn-block" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

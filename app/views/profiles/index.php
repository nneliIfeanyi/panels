<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mb-5 mx-auto">
    <div class="card card-body mt-5">
      <?php flash('profile_msg');?>
      <h2 class="text-center">Update Profile</h2>
      <!-- Profile Pic is here below -->
      <div class="mx-auto">
        <div class="w-100">
          <a href="<?php echo URLROOT; ?>/users/update_pic"><img src="<?= URLROOT.'/'.$data['user']->photo;?>" style="height: 170px;border-radius: 50%;"></a>
        </div>
        <p><a href="<?php echo URLROOT; ?>/users/update_pic">Click to change profile pic</a></p>
      </div>

      <!-- Profile Pic ends here -->

      <form action="<?php echo URLROOT; ?>/profiles/complete/<?php echo $data['user']->id;?>" method="post">
        <div class="form-group mb-2">
            <label class="text-muted fs-6">User Name</label>
            <input type="text" class="form-control form-control-lg" disabled value="<?php echo $data['user']->name; ?>">
        </div>
        <div class="form-group mb-2">
            <label class="text-muted fs-6">Email</label>
            <input type="email" name="email" class="form-control form-control-lg disabled <?php echo (!empty($data['email'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user']->email; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div> 
        <div class="form-group mb-2">
            <label class="text-muted fs-6">Phone</label>
            <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user']->phone; ?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
        </div>
        
        <div class="form-group mb-4">
            <label class="text-muted fs-6">Region</label>
            <select name="region" class="form-select">
                <option value="<?php echo $data['user']->region;?>"><?php echo $data['user']->region;?></option>
                <?php foreach ($states as $states):?>
                    <option value="<?php echo $states->state;?>"><?php echo $states->state;?></option>
                  <?php endforeach;?>
            </select>
        </div> 
        <div class="form-group mb-4">
            <label class="text-muted fs-6">Address</label>
            <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $data['user']->address; ?>">
        </div>    

        <div class="row mt-2">
          <div class="col-12 mb-2">
            <input type="submit" class="btn btn-primary btn-block" value="Update">
          </div>
          <div class="col-lg-6">
            <a href="<?php echo URLROOT; ?>/users/" class="btn">Reset password</a>
          </div>
          <div class="col-lg-6">
            <a href="<?php echo URLROOT; ?>/posts" class="btn"><i class="fa fa-backward"></i> Go Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

  
<?php require APPROOT . '/views/inc/footer.php'; ?>
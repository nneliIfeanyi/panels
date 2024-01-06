<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
    <div class="col-md-6 mb-5 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('profile_msg'); ?>
        <h2>Change profile picture</h2>
        
        <form action="<?php echo URLROOT; ?>/profiles/update_pic" method="post" enctype="multipart/form-data">

          <div class="card rounded-0 mb-4" style="width: 100px;">
             <img class="card-img rounded" height="100" src="<?php echo URLROOT . '/' . $data['user']->photo; ?>">
          </div>

          <div class="form-group mb-4">
              <input type="file" name="picture" class="form-control form-control-lg">
          </div>

          <div class="form-row">
            <div class="col-6 mb-2">
              <input type="submit" class="btn btn-success btn-block" value="Update">
            </div>
              <div class="col-12 mb-2">
             <a href="<?php echo URLROOT; ?>/profiles" class="btn btn-block">Go Back</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

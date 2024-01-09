<?php require APPROOT . '/views/inc/header.php'; 

if (empty($data['user']->region) || empty($data['user']->address)) 
{
  // echo "Incomplete user profile, use this <a href='profiles'>link</a> to continue.";
  ?>
    <div class="row">
      <div class="col-md-6 mx-auto mt-5">
        <div class="card p-4">
          <p class="lead">Incomplete user profile, use this <a href="<?php echo URLROOT?>/users/profile/<?php echo $data['user']->id;?>">link</a> to continue.</p>
        </div>
      </div>
    </div>
  <?php
}
else
{
 ?>

  <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body shadow  mt-5">
        <h2>Add Post</h2>
        <p>Create a post with this form</p>
        <form action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
          <!-- <div class="form-group mb-2">
              <label>Add a title</label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="eg...">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div> -->

          <div class="form-group mb-2">
            <label>Image File (optional)</label>
            <input type="file" class="form-control form-control-lg" name="photo" <?php echo $data['photo']; ?>>
            <span class="text-danger"><?php echo $data['photo_err']; ?></span>
          </div>    
          <div class="form-group mb-3">
              <label>Add some text</label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder=""><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
          
        </form>
      </div>

  <?php
}

?>


<?php require APPROOT . '/views/inc/footer.php'; ?>

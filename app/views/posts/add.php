<?php require APPROOT . '/views/inc/header.php'; ?>

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
            <label>Image File</label>
            <input type="file" class="form-control form-control-lg" name="photo" <?php echo $data['photo']; ?>>
            <span class="text-danger"><?php echo $data['photo_err']; ?></span>
          </div>  
          <div class="form-group mb-2">
            <label>Price</label>
            <input type="number" class="form-control form-control-lg" name="price" <?php echo $data['price']; ?>>
            
          </div>    
          <div class="form-group mb-3">
              <label>Add some text</label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder=""><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
          
        </form>
      </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

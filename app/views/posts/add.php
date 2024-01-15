<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-9 mx-auto">
  <?php
  //If a gist request
    if ($data['category'] == 'gist') {
      ?>

      <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body shadow  mt-5">
        <h2>Create a Gist</h2>
        <p>Create a post with this form</p>
        <form action="<?php echo URLROOT; ?>/posts/add/gist" method="post" enctype="multipart/form-data">
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
            <label>Title</label>
            <input type="text" class="form-control form-control-lg" name="title" <?php echo $data['title']; ?>>
            
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
    }//End a gist request

    else{
      ?>

        <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
          <div class="card card-body shadow  mt-5">
            <h2>Upload Asset</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT; ?>/posts/add/asset" method="post" enctype="multipart/form-data">
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
                <input type="number" class="form-control form-control-lg" name="title" <?php echo $data['title']; ?>>
              </div>    
              <div class="form-group mb-3">
                  <label>Add some text</label>
                  <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder=""><?php echo $data['body']; ?></textarea>
                  <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
              </div>
              <button type="submit" class="btn btn-primary px-2"><i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
              
            </form>
          </div>

      <?php
    }
?>
    </div>
  </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body shadow mt-5">
        <h2>Edit Post</h2>
        <p>Change the details of this post</p>
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-2">
              
            <img src="<?= URLROOT.'/'.$data['photo'];?>" style="height: 170px;border-radius: 10%;">
            <div class="form-group mt-3">
              <label>Change Image</label>
              <input type="file" class="form-control form-control-lg" name="photo">
            </div>
          </div> 
          <div class="form-group mb-2">
            <label>Price | Title</label>
            <input type="text" class="form-control form-control-lg" name="price" value="<?php echo $data['price']; ?>">
            
          </div>   
          <div class="form-group mb-3">
              <label>Body</label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Edit</button>
        </form>
      </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

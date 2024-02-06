<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-9 mx-auto">
  <?php
  //If a gist request
    if ($data['post']->category == 'gist') {
      ?>

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
              <label>Title</label>
              <input type="text" class="form-control form-control-lg" name="title" value="<?php echo $data['price']; ?>">
              
            </div>   
            <div class="form-group mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Edit</button>
          </form>
        </div>

    <?php
  }//End a gist request

  else{
    ?>

    <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body shadow mt-5">
        <h2>Edit Asset</h2>
        <p>Change the details of this post</p>
        <form id="asset_edit" action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-2">
              
            <img src="<?= URLROOT.'/'.$data['photo'];?>" style="height: 170px;border-radius: 10%;">
            <div class="form-group mt-3">
              <label>Change Image</label>
              <input type="file" class="form-control form-control-lg" name="photo">
            </div>
          </div> 
          <div class="form-group mb-2">
            <label>Price</label>
            <input type="text"  required data-parsley-trigger="keyup" class="form-control form-control-lg" name="title" value="<?php echo $data['price']; ?>">
            
          </div>   
          <div class="form-group mb-3">
              <label>Body</label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Edit</button>
        </form>
      </div>

      <?php
    }
?>
    </div>
  </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

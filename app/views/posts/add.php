<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-9 mx-auto">
  <?php
  //If a gist request
    if ($data['category'] == 'gist') {
      ?>

      <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="mt-3 pt-2">
        <h2>Create a Gist</h2>
        <p><span class="text-primary">Gist</span> does not mean talking outside the box, it's about issues related to the <span class="fw-semibold text-primary">GSM World</span> which other <span class="text-primary"> fellows</span> will find helpful..</p>
      </div>

      <div class="card card-body shadow  mt-3 mb-5">
        
        <p>Create a Gist with this form</p>
        <form action="<?php echo URLROOT; ?>/posts/add/gist" method="post" enctype="multipart/form-data">

          <div class="form-group mb-2">
            <label>Image File<span style="font-size: 12px;"> (optional)</span></label>
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
        <div class="mt-3 pt-2">
          <h2>Upload Asset</h2>
          <p class="fw-bold">SimTrays, FingerPrints, Cameras, PowerFlex, DownBoards, Screens, Frames, Backcovers, FlexConnector, etc are all Assets..</p>
          <p><span class="">Upload</span> or <span class="">Post</span> as many as you have, be it brand new or used, but dont't forget the pictures<span class="fw-semibold"> [Pls make it clear]</span></p>
        </div>
          <div class="card card-body shadow  mt-3 mb-5">
            <p>Create a post with this form</p>
            <form id="asset_form" action="<?php echo URLROOT; ?>/posts/add/asset" method="post" enctype="multipart/form-data">
              
              <div class="form-group mb-2">
                <label>Image File</label>
                <input type="file" class="form-control form-control-lg" name="photo" <?php echo $data['photo']; ?>>
                <span class="text-danger"><?php echo $data['photo_err']; ?></span>
              </div>  
              <div class="form-group mb-2">
                <label>Price</label>
                <input type="number" required data-parsley-trigger="keyup" class="form-control form-control-lg" name="title" <?php echo $data['title']; ?>>
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

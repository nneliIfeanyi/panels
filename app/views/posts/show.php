<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
      <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      </div>
        <div class="col-md-6">
          <a class="text-primary btn btn-sm float-end" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add New Post</a>
        </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-9 mx-auto">
      <div class="card">
        <?php 

            if (!empty($post->post_img)) {
              ?>
                <img src="<?php echo URLROOT.'/'.$data['post']->post_img; ?>" class="card-img-top image-fluid" alt="Post-image">
              <?php
            }

          ?>
        
      </div>
       <?php 
       $post_time = strtotime($data['post']->created_at);
       ?> 
      <div class="bg-secondary text-white p-2 mb-3">
        <span class="fw-bold"> Posted:</span> &nbsp;<?php echo to_time_ago($post_time); ?> by <span class="fw-bold text-white"><?php echo $data['user']->name; ?></span>
      </div>
      <p><?php echo $data['post']->body; ?></p>
      <div class="d-flex justify-content-start">
        <div class="btn-group">
          <a class="btn btn-sm" href="<?php echo URLROOT; ?>/posts"><i class="text-primary fa fa-thumbs-up" aria-hidden="true"></i> Like</a>
          <a href="<?php echo URLROOT;?>/users" class="btn btn-sm"><i class="fa fa-comment text-primary" aria-hidden="true"></i> Comment</a>
          <a class="btn btn-sm" href="<?php echo URLROOT; ?>/#"><i class="fa fa-phone text-primary" aria-hidden="true"></i> Call <?php echo $data['user']->name; ?></a>
        </div>
      </div>

      <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
        <hr>
        <a class="btn btn-outline-primary" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

        <form class="float-end" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
          <!-- <input type="submit" class="btn btn-danger" value="Delete"> -->
        </form>
        <?php else: ?>
        <hr>
        <div class="d-grid mb-5">
          <a class="btn btn-outline-primary" href="#"><i class="fa fa-eye"></i> Veiw <?php echo $data['user']->name; ?>'s profile</a>
        </div>
      <?php endif; ?>

    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
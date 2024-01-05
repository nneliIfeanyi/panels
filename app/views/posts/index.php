<?php require APPROOT . '/views/inc/header.php'; ?>
  
  <?php require APPROOT . '/views/inc/nav2.php'; ?>
  <div class="row">
    <div class="col-md-9 mx-auto">
      <h1 class="py-3">Posts</h1>
     <?php flash('post_message'); ?>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-9 mx-auto">
      <form action="#" method="get" class="">
        <div class="input-group mb-2">
          <input type="text" class="form-control" name="surname" placeholder="filter post...">
          <button type="submit" class="input-group-text px-3 bg-primary text-light">
            <i class="fa fa-fw fa-search text-white"></i> Search
          </button>
        </div>
      </form>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <?php 
       $post_time = strtotime($post->created_at);
    ?>
    <div class="row mb-5">
      <div class="col-md-9 mx-auto">
        <div class="card shadow border border-light mb-3" data-bs-toggle="tooltip" data-bs-title="Posted: &nbsp;<?php echo to_time_ago($post_time); ?> by <?php echo $post->name; ?>">
          <?php 

            if (!empty($post->post_img)) {
              ?>
                <img src="<?php echo URLROOT.'/'.$post->post_img; ?>" height="200" class="card-img-top" alt="Post-image">
              <?php
            }

          ?> 
          <div class="card-body">
            <p class="card-text text-truncate"><?php echo $post->body; ?></p>
          </div>
          <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
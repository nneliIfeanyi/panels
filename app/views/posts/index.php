<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row">
    <div class="col-md-9 mx-auto">
      <h1 class="py-3"><?php echo $data['title']?></h1>
     <?php flash('post_message'); ?>
    </div>
  </div>

  <!-- Search Posts Div -->
  <div class="row mb-3">
    <div class="col-md-9 mx-auto">
      <form action="<?php echo URLROOT?>/posts" method="post">
        <div class="input-group mb-2">
          <input type="search" class="form-control" name="search" placeholder="Begin typing to search posts...">
          <button type="submit" class="input-group-text px-3 bg-primary text-light">
            <i class="fa fa-fw fa-search text-white"></i> Search
          </button>
        </div>
      </form>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) :?>
    
    <div class="row mb-4" id="search-results">
      <div class="col-md-9 mx-auto">
        <div class="card shadow border border-secondary" data-bs-toggle="tooltip" data-bs-title="Posted by <?php echo $post->name; ?>">
          <?php 

            if (!empty($post->post_img)) {
              ?>
                <img src="<?php echo URLROOT.'/'.$post->post_img; ?>" height="220" class="card-img-top" alt="Post-image">
              <?php
            }

          ?> 
          <div class="card-body">
            <p class="card-text text-truncate"><?php echo $post->body;?></p>
          </div>
          <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="fs-6 fs-italics text-center mb-2">No more posts...</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
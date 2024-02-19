<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- <style>
.cssmarquee {
height: 50px;
overflow: hidden;
position: relative;
}
.cssmarquee h1 {
font-size: 1em;
position: absolute;
width: 100%;
height: 100%;
margin: 0;
line-height: 10px;
text-align: center;
transform:translateX(100%);
animation: cssmarquee 12s linear infinite;
}
@keyframes cssmarquee {
0% {
transform: translateX(100%);
}
100% {
transform: translateX(-100%);
}
}
</style> -->
 
 <!--  <div class="cssmarquee">
    <h1 class="fs-italics">We are yet to launch.. This is a test version...</h1>
  </div> -->
<style>
  .card-text{
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
  <div class="row">
    <div class="col-md-9 mx-auto">
      <p class="display-4"><?php echo $data['title']?></p>
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
  
    
    <div class="row" id="search-results">
      <?php foreach($data['posts'] as $post) :
        $post_time = strtotime($post->created_at);
        ?>
      <div class="col-md-9 mx-auto mb-4">
        <div class="card shadow border border-secondary" data-bs-toggle="tooltip" data-bs-title="Posted by <?php echo $post->name; ?>">
          <?php 

            if (!empty($post->post_img)) {
              ?>
                <img src="<?php echo URLROOT.'/'.$post->post_img; ?>" height="220" class="card-img-top" alt="Post-image">
              <?php
            }

          ?> 
          <div class="card-body">

            <div class="fw-bold text-primary">
              <?php 
                if ($post->category == 'asset')
                  { echo '&#8358;'.$post->price.'.00';}
                else
                  {echo $post->title;}
              ?>
            </div>
            <span class="text-muted">Posted:</span> <span class="fw-semibold">&nbsp;<?php echo to_time_ago($post_time); ?></span><hr>
            <p class="card-text"><?php echo $post->body;?></p>
          </div>
          <div class="d-flex py-2">
            <!-- 
              LIKES BUTTON SHOWING ON THE INDEX PAGE BUT I DIDNT SUCCED
            <div class="ms-2 btn-group border rounded-5 me-3 px-3">
              <form class="" action="<?php echo URLROOT; ?>/posts/likes/<?php echo $post->postId; ?>" method="post">
                <button type="submit" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Like"><i class="text-primary fa fa-thumbs-up fa-2x" aria-hidden="true"><?php echo $data['likes']?></i></button>
              </form>
              <form class="" action="<?php echo URLROOT; ?>/posts/unlike/<?php echo $post->postId; ?>" method="post">
                <button type="submit" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Unlike"><i class="text-danger fa fa-thumbs-down fa-2x" aria-hidden="true"></i></button>
              </form>
            </div> -->

            <a class="btn btn-secondary btn-sm rounded-5 w-100 mx-3" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
          </div>
          
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <div class="fs-6 fs-italics text-center mb-2">
    <span class="spinner-border-sm spinner-border"> </span> No more posts...
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
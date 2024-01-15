<?php require APPROOT . '/views/inc/header.php';$post_time = strtotime($data['post']->created_at); ?>
  <div class="row mb-3">
      <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      </div>
      <div class="col-md-6">
        <a 
          data-bs-toggle="modal" data-bs-target="#exampleModal"
          class="text-primary btn btn-sm float-end">
          <i class="fa fa-pencil" aria-hidden="true"></i>
           Add New Post
        </a>
      </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-9 mx-auto">
      <?php flash('like_msg'); ?>

      <div class="card">
       <?php 

            if (!empty($data['post']->post_img)) {
              ?>
                <img src="<?php echo URLROOT.'/'. $data['post']->post_img;?>" class="card-img-top img-fluid" alt="Post-image">
              <?php
            }

       ?> 
      </div>
         
      <div class="bg-secondary text-white p-2 mb-3">
        <span class="fw-bold"> Posted:</span> &nbsp;<?php echo to_time_ago($post_time); ?> by <span class="fw-bold text-white"><?php echo $data['user']->name; ?></span>
      </div>
      <div class="fw-bold text-secondary">
        <?php

          if ($data['post']->category == 'asset') {

          echo '&#8358;'.$data['post']->price.'.00';
          }else

          {echo $data['post']->title;}

        ?>
      </div>
      <p><?php echo $data['post']->body; ?></p>

      <div class="d-flex justify-content-start">
        <div class="btn-group">
          <form class="me-2" action="<?php echo URLROOT; ?>/posts/likes/<?php echo $data['post']->id; ?>" method="post">
            <button type="submit" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Like"><i class="text-primary fa fa-thumbs-up fa-2x" aria-hidden="true"><?php echo $data['likes']?></i></button>
          </form>
          <form class="me-2" action="<?php echo URLROOT; ?>/posts/unlike/<?php echo $data['post']->id; ?>" method="post">
            <button type="submit" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Unlike"><i class="text-danger fa fa-thumbs-down fa-2x" aria-hidden="true"></i></button>
          </form>
          <a href="<?php echo URLROOT;?>/users" data-bs-toggle="tooltip" data-bs-title="Comment" class="btn btn-sm me-2"><i class="fa fa-comment text-primary fa-2x" aria-hidden="true"></i></a>

          <a class="btn btn-sm" href="tel:<?php echo $data['user']->phone; ?>" data-bs-toggle="tooltip" data-bs-title="Call <?php echo $data['user']->name; ?>"><i class="fa fa-phone text-primary fa-2x" aria-hidden="true"></i></a>
        </div>
      </div>

        <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
          <hr>
          <a class="btn btn-outline-secondary" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

          <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn float-end btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
          <?php else: ?>
          <hr>
          <div class="d-grid mb-5">
            <a class="btn btn-outline-secondary" href="<?php echo URLROOT;?>/users/assets/<?php echo $data['user']->id; ?>"><i class="fa fa-eye"></i> Veiw <?php echo $data['user']->name; ?>'s Assets</a>
          </div>
        <?php endif; ?>

    </div>
  </div>


<!--Add post Modal -->
<div class="modal fade" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Add new post</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav">
            <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/posts/add/gist" class="nav-link">Create a gist</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/posts/add/asset" class="nav-link">Upload asset</a>
            </li>
        </ul>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!--Delete post Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel"> This Action cannot be reveresed..</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form class="float-end" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
          <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
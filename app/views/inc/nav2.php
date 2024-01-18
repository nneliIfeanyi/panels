<style type="text/css">
  .fa{
    font-size: 15px;
  }
</style>
<?php if(isset($_SESSION['user_id'])) : ?>
<div class="d-flex justify-content-around py-2" style="background: rgba(0, 0, 0, 0.75);">
        <!-- <div class="nav-item btn-group pe-3"> -->
          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Posts" href="<?php echo URLROOT; ?>/posts"><span class="badge bg-secondary"><i class="fa fa-home" aria-hidden="true"></i></span></a>

          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Market Place" href="<?php echo URLROOT; ?>/posts"><span class="badge bg-secondary"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
          
          <div class="dropdown" data-bs-toggle="tooltip" data-bs-title="Add new post">
            <a class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">
            <span class="badge bg-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></span>
            </a>
             <ul class="dropdown-menu dropdown-menu-dark">
                <li class="nav-item">
                    <a href="<?php echo URLROOT; ?>/posts/add/gist" class="dropdown-item">Create a gist</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLROOT; ?>/posts/add/asset" class="dropdown-item">Upload asset</a>
                </li>
              </ul>
          </div>

          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Users" href="<?php echo URLROOT; ?>/users"><span class="badge bg-secondary"><i class="fa fa-users" aria-hidden="true"></i></span></a>

          <!-- <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about" data-bs-toggle="tooltip" data-bs-title="About"><span class="badge bg-secondary"><i class="fa fa-info fa-2x" aria-hidden="true"></i></span></a> -->

        <a class="btn btn-sm" href="<?php echo URLROOT; ?>/profiles/<?php echo $_SESSION['user_id'] ?>" data-bs-toggle="tooltip" data-bs-title=" <?php echo $_SESSION['user_name'] ?>"><span class="badge bg-secondary"><i class="fa fa-user" aria-hidden="true" ></i></span></a>
    </div>
 <?php endif; ?>
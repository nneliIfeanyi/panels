<?php if(isset($_SESSION['user_id'])) : ?>
<div class="d-flex justify-content-around py-2" style="background: rgba(0, 0, 0, 0.75);">
        <!-- <div class="nav-item btn-group pe-3"> -->
          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Homepage" href="<?php echo URLROOT; ?>/posts"><span class="badge bg-secondary"><i class="fa fa-home fa-2x" aria-hidden="true"></i></span></a>

          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Add new post" href="<?php echo URLROOT; ?>/posts/add"><span class="badge bg-secondary"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></span></a>

          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Users" href="<?php echo URLROOT; ?>/users"><span class="badge bg-secondary"><i class="fa fa-users fa-2x" aria-hidden="true"></i></span></a>
          
          <button class="btn btn-sm" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-title="Change to light theme">
            <span class="badge bg-secondary"><i class="fa fa-sun fa-2x" aria-hidden="true" style="color: antiquewhite;"></i></span>
          </button>
          <button class="btn btn-sm" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-title="Change to dark theme">
           <span class="badge bg-secondary"><i class="fa fa-moon fa-2x" aria-hidden="true" style="color: antiquewhite;"></i></span>
          </button>

          <!-- <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about" data-bs-toggle="tooltip" data-bs-title="About"><span class="badge bg-secondary"><i class="fa fa-info fa-2x" aria-hidden="true"></i></span></a> -->

        <a class="btn btn-sm" href="<?php echo URLROOT; ?>/profiles/<?php echo $_SESSION['user_id'] ?>" data-bs-toggle="tooltip" data-bs-title=" <?php echo $_SESSION['user_name'] ?>"><span class="badge bg-secondary"><i class="fa fa-user fa-2x" aria-hidden="true" ></i></span></a>
    </div>
 <?php endif; ?>
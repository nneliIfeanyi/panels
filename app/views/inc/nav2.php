

<div class="bottom-nav d-flex justify-content-end py-2" style="background: rgba(0, 0, 0, 0.75);">

        <div class="nav-item btn-group pe-3">
          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Homepage" href="<?php echo URLROOT; ?>/posts"><i class="fa fa-home" aria-hidden="true" style="color: antiquewhite;"></i></a>

          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Add new post" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true" style="color: antiquewhite;"></i></a>

          <button class="btn btn-sm" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-title="Change to light theme">
                  <i class="fa fa-sun" aria-hidden="true" style="color: antiquewhite;"></i>
              </button>
          <button class="btn btn-sm" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-title="Change to dark theme">
                  <i class="fa fa-moon" aria-hidden="true" style="color: antiquewhite;"></i>
              </button>
        </div>

        <a class="btn btn-sm" href="<?php echo URLROOT; ?>/profiles/<?php echo $_SESSION['user_id'] ?>" style="color: antiquewhite;"><i class="fa fa-user" aria-hidden="true" ></i> <?php echo $_SESSION['user_name'] ?></a>
       
     
  </div>
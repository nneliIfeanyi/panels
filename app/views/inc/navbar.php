<div class="fixed-top mb-5">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand text-primary" href="<?php echo URLROOT; ?>/home"><b><?php echo SITENAME; ?></b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if(isset($_SESSION['user_id'])) : ?>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">Settings</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/profiles/<?php echo $_SESSION['user_id'] ?>">Welcome <?php echo $_SESSION['user_name'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
        </ul>
      </div>
    <?php else : ?> 
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
        </li>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</nav>
<?php require APPROOT . '/views/inc/nav2.php'; ?>
</div>

<!--Setting Modal -->
<div class="modal fade" id="settingsModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settingsModalLabel">Change Background</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav">
            <li class="nav-item btn-group">
            <button class="btn btn-sm nav-link" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-title="light mode">
              <span class="badge bg-secondary"><i class="fa fa-sun fa-2x" aria-hidden="true" style="color: antiquewhite;"></i></span>
            </button>
            <button class="btn btn-sm nav-link" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-title="dark mode">
             <span class="badge bg-secondary"><i class="fa fa-moon fa-2x" aria-hidden="true" style="color: antiquewhite;"></i></span>
            </button>
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
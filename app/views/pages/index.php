<?php require APPROOT . '/views/inc/style.php'; ?>

  <div class="showcase">
    <div class="video-container">
      <video src="<?php echo URLROOT;?>/img/bg_panel.mp4" autoplay muted loop></video>
    </div>

      <div class="content">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <h2>A GSM Repair Community</h2>
        <p class="lead text-white"><?php echo $data['description']; ?></p>
        <a href="<?php echo URLROOT;?>/users/register" class="btn btn-primary rounded-3 px-4 fw-bold">Join</a>
        <!-- <div class="d-grid pt-4 mx-5">
          <a href="" class="btn btn-outline-primary text-white px-4">Explore</a>
        </div> -->
      </div>
  </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
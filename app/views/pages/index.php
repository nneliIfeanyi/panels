<?php require APPROOT . '/views/inc/style.php'; ?>



  <div class="showcase">
    <div class="video-container">
      <video src="<?php echo URLROOT;?>/img/g99.mp4" autoplay muted loop></video>
    </div>

      <div class="content">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
        <a href="<?php echo URLROOT;?>/users/register" class="btn btn-primary rounded-3 px-5">Join</a>
      </div>
  </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
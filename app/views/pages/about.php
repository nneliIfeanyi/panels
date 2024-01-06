
<?php require APPROOT . '/views/inc/style.php'; ?>



  <div class="showcase">
    <div class="video-container">
      <video src="<?php echo URLROOT;?>/img/g99.mp4" autoplay muted loop></video>
    </div>
    <div class="content">
      <h1>About</h1>
      <p>This is a social network type app built to interact and share ideas..</p>
      <p>We buy and exchange phone panels, screens and other gsm parts...</p>
      <p class="fw-bold">App Version: <?php echo $data['version']; ?></p>
    </div>
  </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php require APPROOT . '/views/inc/style.php'; ?>

  <div class="showcase">
    <div class="video-container">
      <video src="<?php echo URLROOT;?>/img/g99.mp4" autoplay muted loop></video>
    </div>
    <div class="content fs-italics">
      <h1>About</h1>
      <p class="lead text-white">This is a social network type app built to interact and share ideas..</p>
      <p class="lead text-white">To buy and exchange phone panels, screens and other gsm parts...</p>
      <div class="">App Version: <?php echo $data['version']; ?></div>
      <div class="text-white pt-1">Copyright: &copy; <?php echo date('Y'); ?></div>
    </div>
  </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
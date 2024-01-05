</div>

<script type="text/javascript" src="<?php echo URLROOT ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ;?>/js/script.js"></script>
<script src="<?= URLROOT ;?>/js/theme.js"></script>
<script src="<?= URLROOT ;?>/js/jquery.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', userScroll);
    const tooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltip].map((tooltipTrigger) => new bootstrap.Tooltip(tooltipTrigger));
    //popover
    const popover = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popover].map((popoverTrigger) => new bootstrap.Popover(popoverTrigger));
</script>
</body>
</html>
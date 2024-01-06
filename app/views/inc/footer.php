</div>

<script type="text/javascript" src="<?php echo URLROOT ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ;?>/js/script.js"></script>
<script src="<?= URLROOT ;?>/js/theme.js"></script>
<script src="<?= URLROOT ;?>/js/jquery.js"></script>
<!-- <script>
    $(function () {
        $('#login_form').on('submit', function (event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo $base_url;?>process-login.php",
                data: formData,
                beforeSend: function () {
                    $('#msg').html("Signing In..... Please wait.");
                },
                success: function (response) {
                    $('#msg').html(response);
                }
            })
        })
    })
</script> -->
<script>
  // document.addEventListener('DOMContentLoaded', userScroll);
    const tooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltip].map((tooltipTrigger) => new bootstrap.Tooltip(tooltipTrigger));
    //popover
    const popover = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popover].map((popoverTrigger) => new bootstrap.Popover(popoverTrigger));
</script>
</body>
</html>
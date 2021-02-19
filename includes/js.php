<?php if(!defined('db_name')) { header("Location: ../"); exit(); die(); } ?>

<!-- JS here -->
    <script src="<?=SITE_PATH?>/assets/js/jquery.js"></script>
    <script src="<?=SITE_PATH?>/assets/js/bootstrap.min.js"></script>
    <script src="<?=SITE_PATH?>/assets/js/sidenav.js"></script>
    <script src="<?=SITE_PATH?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?=SITE_PATH?>/assets/js/animate.js"></script>
    <script src="<?=SITE_PATH?>/assets/js/bootstrap-select.min.js"></script>
    <script src="<?=SITE_PATH?>/assets/js/jquery.marquee.min.js"></script>
    <?php
        if($do == 'photogallery')
        {
            ?>
            <script type="text/javascript" src="<?=SITE_PATH?>/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
            <script type="text/javascript" src="<?=SITE_PATH?>/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
            <script type="text/javascript" src="<?=SITE_PATH?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
            <script type="text/javascript" src="<?=SITE_PATH?>/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
            <script type="text/javascript" src="<?=SITE_PATH?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
            <script>
                $(document).ready(function() {
                    $(".fancybox-thumb").fancybox({
                        prevEffect	: 'none',
                        nextEffect	: 'none',
                        helpers	: {
                            title	: {
                                type: 'outside'
                            },
                            thumbs	: {
                                width	: 50,
                                height	: 50
                            }
                        }
                    });
                });
            </script>
            <?php
        }
    ?>
    <script src="<?=SITE_PATH?>/assets/js/scripts.js"></script>

<?php echo $js; ?>
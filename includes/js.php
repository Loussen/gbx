<?php if (!defined('db_name')) {
    header("Location: ../");
    exit();
    die();
} ?>

    <!-- JS here -->
    <script src="<?= SITE_PATH ?>/assets/js/jquery.js"></script>
    <script src="<?= SITE_PATH ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= SITE_PATH ?>/assets/js/sidenav.js"></script>
    <script src="<?= SITE_PATH ?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?= SITE_PATH ?>/assets/js/animate.js"></script>
    <script src="<?= SITE_PATH ?>/assets/js/bootstrap-select.min.js"></script>
    <script src="<?= SITE_PATH ?>/assets/js/jquery.marquee.min.js"></script>
<?php
if ($do == 'photogallery') {
    ?>
    <script type="text/javascript" src="<?= SITE_PATH ?>/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript"
            src="<?= SITE_PATH ?>/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript"
            src="<?= SITE_PATH ?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript"
            src="<?= SITE_PATH ?>/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script type="text/javascript"
            src="<?= SITE_PATH ?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script>
        $(document).ready(function () {
            $(".fancybox-thumb").fancybox({
                prevEffect: 'none',
                nextEffect: 'none',
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    thumbs: {
                        width: 50,
                        height: 50
                    }
                }
            });
        });
    </script>
    <?php
}
?>
    <script src="<?= SITE_PATH ?>/assets/js/scripts.js"></script>
<?php
    if($do=='contact')
    {

        ?>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
        <script type="text/javascript">
            function initialize() {
                var myLatlng = new google.maps.LatLng<?=$info_contacts['google_map']?>;
                var mapOptions = {
                    zoom: 15,
                    scrollwheel: false,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    title: 'Hello World!'
                });

                var contentString = '' +
                    '' +
                    '';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        </script>
        <?php
    }
?>
<?php echo $js; ?>
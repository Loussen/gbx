<?php if(!defined('db_name')) { header("Location: ../"); exit(); die(); } ?>

<!-- JS here -->
<script src="<?=SITE_PATH?>/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/popper.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/bootstrap.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/owl.carousel.min.js"></script>
<!--<script src="--><?//=SITE_PATH?><!--/assets/js/isotope.pkgd.min.js"></script>-->
<script src="<?=SITE_PATH?>/assets/js/one-page-nav-min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/slick.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/wow.min.js"></script>
<!--<script src="--><?//=SITE_PATH?><!--/assets/js/jquery.nice-select.min.js"></script>-->
<script src="<?=SITE_PATH?>/assets/js/jquery.scrollUp.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/jquery.meanmenu.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/jquery.counterup.min.js"></script>
<!--<script src="--><?//=SITE_PATH?><!--/assets/js/waypoints.min.js"></script>-->
<script src="<?=SITE_PATH?>/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/jquery.magnific-popup.min.js"></script>
<!--<script src="--><?//=SITE_PATH?><!--/assets/js/plugins.js"></script>-->
<!--<script src="--><?//=SITE_PATH?><!--/assets/js/alloy_finger.min.js"></script>-->
<script src="<?=SITE_PATH?>/assets/js/lc_lightbox.lite.min.js"></script>
<script src="<?=SITE_PATH?>/assets/js/main.js"></script>


<?php echo $js; ?>

<script>
$(document).ready(function(){
    var base_url = '<?=SITE_PATH?>';
    $(document).on('submit','form#contact-form',function(e){
        e.preventDefault();

        $('#contact-form').css('opacity','0.3');
        $('.has-error').removeClass('has-error');

        var formData = new FormData(this);

        $.ajax({
            url: base_url+'/contact.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if(data.code==0)
                {
                    $('#contact-form').css('opacity','1');
                    $('[name="'+data.err_param+'"]').addClass('has-error');
                }
                else
                {
                    $("form#contact-form").css("display","none");
                    $('div.success_contact').show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#contact-form').css('opacity','1');
            }
        });

    });

    $(document).on('submit','form#appointment-form',function(e){
        e.preventDefault();

        $('#appointment-form').css('opacity','0.3');
        $('.has-error').removeClass('has-error');

        var formData = new FormData(this);

        $.ajax({
            url: base_url+'/appointment.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if(data.code==0)
                {
                    $('#appointment-form').css('opacity','1');
                    $('[name="'+data.err_param+'"]').addClass('has-error');
                }
                else
                {
                    $("form#appointment-form").css("display","none");
                    $('div.success_appointment').show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#appointment-form').css('opacity','1');
            }
        });

    });
});
</script>
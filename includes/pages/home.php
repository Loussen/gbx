<!-- hero-area start -->
<section class="hero-area">
    <div class="hero-slider">
        <div class="slider-active">
            <?php
            $home_slider = mysqli_query($db, "select * from sliders where active=1");

            while ($row_slider = mysqli_fetch_assoc($home_slider)) {
                ?>
                <div class="single-slider slider-height d-flex  fuad-slider align-items-stretch align-items-md-center"
                     data-background="<?= SITE_PATH ?>/images/sliders/<?= $row_slider['image'] ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-9 col-md-10">
                                <div class="hero-text hero-text-box">
                                    <div class="hero-slider-caption ">
                                        <h5 data-animation="fadeInUp" data-delay=".2s"><?=$row_slider['name_'.$lang_name]?></h5>
                                        <h1 data-animation="fadeInUp" data-delay=".4s"><?=$row_slider['title_'.$lang_name]?></h1>
                                        <p data-animation="fadeInUp" data-delay=".6s"><?=$row_slider['text_'.$lang_name]?></p>
                                    </div>
                                    <div class="hero-slider-btn">
                                        <a style="background-color: red;" data-animation="fadeInLeft" data-delay=".6s" href="<?=$site?>/muayine" class="btn btn-icon ml-0"><span>+</span><?=$lang7?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- hero-area end -->
<!-- about-area start -->
<?php
$home_about = mysqli_fetch_assoc(mysqli_query($db, "select * from about"));
?>
<section class="about-area pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-5">
                <!--                <div class="medical-icon-brand-2">-->
                <!--                    <img src="-->
                <? //=SITE_PATH?><!--/assets/img/about/medical-brand-icon-border.png" alt="">-->
                <!--                </div>-->
                <div class="about-left-side pos-rel mb-30">
                    <div class="about-front-img">
                        <img src="<?= SITE_PATH ?>/images/about/<?= $home_about['image'] ?>" alt="<?= $home_about['name_' . $lang_name] ?>">
<!--                        <div class="video-container">-->
<!--                            <iframe style="width: 100%;" src="https://www.youtube.com/embed/9kc6jlKen2E" frameborder="0"-->
<!--                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"-->
<!--                                    allowfullscreen></iframe>-->
<!--                        </div>-->
<!--                        <style>-->
<!--                            .video-container {-->
<!--                                overflow: hidden;-->
<!--                                position: relative;-->
<!--                                width: 100%;-->
<!--                                min-height: 430px;-->
<!--                            }-->
<!---->
<!--                            .video-container::after {-->
<!--                                padding-top: 56.25%;-->
<!--                                display: block;-->
<!--                                content: '';-->
<!--                            }-->
<!---->
<!--                            .video-container iframe {-->
<!--                                position: absolute;-->
<!--                                top: 0;-->
<!--                                left: 0;-->
<!--                                width: 100%;-->
<!--                                height: 100%;-->
<!--                            }-->
<!--                        </style>-->
                    </div>
                    <div class="about-shape">
                        <img src="<?= SITE_PATH ?>/assets/img/about/about-shape.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="about-right-side mb-30">
                    <div class="about-title mb-20">
                        <h5><?= $lang16 ?></h5>
                        <h3><?= $home_about['name_' . $lang_name] ?></h3>
                    </div>
                    <div class="about-text" style="line-height: 2.5; text-align: justify;">
                        <?= $home_about['short_text_' . $lang_name] ?>
                        <br/>
                        <a class="service-link" style="float: right;" href="<?= $site ?>/haqqimizda"><?= $lang1 ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area end -->
<!-- services-area start -->
<section class="servcies-area gray-bg pt-115 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="section-title text-center pos-rel mb-75">
                    <!--                    <div class="section-icon">-->
                    <!--                        <img class="section-back-icon" src="-->
                    <? //=SITE_PATH?><!--/assets/img/section/section-back-icon.png" alt="">-->
                    <!--                    </div>-->
                    <div class="section-text pos-rel">
                        <h5><?= $lang17 ?></h5>
                        <h2><?= $lang18 ?></h2>
                    </div>
                    <div class="section-line pos-rel">
                        <img src="<?= SITE_PATH ?>/assets/img/shape/section-title-line.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql_services = mysqli_query($db, "select * from services where active=1 order by position LIMIT 6");

            while ($row_services = mysqli_fetch_assoc($sql_services)) {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="pricing-box mb-30" style="padding: 40px 20px 60px 20px;">
                        <div class="pricing-thumb mb-45 text-center">
                            <img style="border-radius: 20px;"
                                 src="<?= SITE_PATH ?>/images/services/thumb_<?= $row_services['image'] ?>"
                                 alt="<?= $row_services['name_' . $lang_name] ?>">
                        </div>
                        <div class="pricing-content">
                            <h5>
                                <a class="title-link" href="<?= $site ?>/xidmet/<?= slugGenerator($row_services['name_' . $lang_name]) . '-' . $row_services["id"] ?>"><?= $row_services['name_' . $lang_name] ?></a>
                            </h5>
                            <p><?= substr_(decode_text($row_services['short_text_' . $lang_name]), 0, 200, true) ?></p>
                            <a data-animation="fadeInLeft" data-delay=".6s" style="border-radius: 10px;"
                               class="float-right ml-0 service-link"
                               href="<?= $site ?>/xidmet/<?= slugGenerator($row_services['name_' . $lang_name]) . '-' . $row_services["id"] ?>"><?= $lang1 ?></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="text-center">
            <a href="<?= $site ?>/xidmetler" class="btn"><?= $lang33 ?></a>
        </div>

    </div>
</section>
<!-- services-area end -->
<section class="team-area pt-115 pb-55">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="section-title text-center pos-rel mb-75">
                    <!--                    <div class="section-icon">-->
                    <!--                        <img class="section-back-icon back-icon-left" src="-->
                    <? //=SITE_PATH?><!--/assets/img/section/section-back-icon.png" alt="">-->
                    <!--                    </div>-->
                    <div class="section-text pos-rel">
                        <h5><?= $lang20 ?></h5>
                        <h2><?= $lang21 ?></h2>
                    </div>
                    <div class="section-line pos-rel">
                        <img src="<?= SITE_PATH ?>/assets/img/shape/section-title-line.png" alt="">
                    </div>
                </div>
            </div>
<!--            <div class="col-xl-6 col-lg-5">-->
<!--                <div class="section-button text-right d-none d-lg-block pt-80">-->
<!--                    <a data-animation="fadeInLeft" data-delay=".6s" href="--><?//= $site ?><!--/muayine"-->
<!--                       class="btn btn-icon ml-0"><span>+</span>--><?//= $lang7 ?><!--</a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="row">
            <?php
            $sql_methods = mysqli_query($db, "select * from methods where active=1 order by position LIMIT 6");

            while ($row_methods = mysqli_fetch_assoc($sql_methods)) {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="latest-news-box latest-news-box-2 latest-news-box-3 mb-30">
                        <div class="latest-news-thumb">
                            <a href="<?= $site ?>/metod/<?= slugGenerator($row_methods['name_' . $lang_name]) . '-' . $row_methods["id"] ?>"><img
                                        src="<?= SITE_PATH ?>/images/methods/thumb_<?= $row_methods['image'] ?>"
                                        alt="<?= $row_methods['name_' . $lang_name] ?>" style="width: 100%; height: 300px;"></a>
                        </div>
                        <div class="latest-news-content-box pl-0 pr-0">
                            <div class="latest-news-content">
                                <h3><a class="title-link"
                                            href="<?= $site ?>/metod/<?= slugGenerator($row_methods['name_' . $lang_name]) . '-' . $row_methods["id"] ?>"><?= $row_methods['name_' . $lang_name] ?></a>
                                </h3>
                                <p><?= substr_(decode_text($row_methods['short_text_' . $lang_name]), 0, 100, true) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="text-center">
            <a href="<?= $site ?>/metodlar" class="btn" style="border-radius: 10px;"><?= $lang34 ?></a>
        </div>
    </div>
</section>
<!-- testimonials-area start -->
<!-- fact-area start -->
<!--<section class="fact-area fact-map primary-bg pos-rel pt-115 pb-60">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-7 col-lg-6 col-md-8 section-title pos-rel mb-45">-->
<!--                <div class="section-text section-text-white pos-rel">-->
<!--                    <h5>--><?//= $lang22 ?><!--</h5>-->
<!--                    <h4 class="white-color">--><?//= $lang23 ?><!--</h4>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-5 col-lg-6 col-md-4 section-button section-button-left mb-30">-->
<!--                <a data-animation="fadeInLeft" data-delay=".6s" href="--><?//= $site ?><!--/muayine"-->
<!--                   class="btn btn-icon ml-0"><span>+</span>--><?//= $lang7 ?><!--</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<section class="cta-area pos-rel pt-80 pb-80">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-10 offset-xl-1 col-md-12">-->
<!--                <div class="cta-text text-center">-->
<!--                    <div class="section-title pos-rel mb-50">-->
<!--                        <div class="section-text section-text-white pos-rel">-->
<!--                            <h3 style="color: #899dab;">--><?//= $lang22 ?><!--</h3>-->
<!--                            <h1 style="font-size: 40px;" class="white-color">--><?//= $lang23 ?><!--</h1>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="section-button section-button-left">-->
<!--                        <a style="background-color: red;" data-animation="fadeInLeft" data-delay=".6s" href="--><?//= $site ?><!--/muayine" class="btn btn-icon ml-0"><span>+</span>--><?//= $lang7 ?><!--</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- fact-area end -->
<section class="gray-bg mb-50">
    <div class="testimonials-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="section-title text-center pos-rel mb-70">
                        <!--                        <div class="section-icon">-->
                        <!--                            <img class="section-back-icon" src="-->
                        <? //=SITE_PATH?><!--/assets/img/section/section-back-icon.png" alt="">-->
                        <!--                        </div>-->
                        <div class="section-text pos-rel">
                            <h5><?= $lang24 ?></h5>
                            <h2><?= $lang25 ?></h2>
                        </div>
                        <div class="section-line pos-rel">
                            <img src="<?= SITE_PATH ?>/assets/img/shape/section-title-line.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $home_patients = mysqli_query($db, "select * from patients where active=1");
            ?>

            <div class="custom-row testimonials-activation">
                <?php
                while ($row_patients = mysqli_fetch_assoc($home_patients)) {
                    ?>
                    <div class="col-xl-12">
                        <div class="testi-box-2">
                            <div class="test-rating-inner d-flex justify-content-between mb-30 align-items-center pr-15">
                                <div class="testi-quato-icon testi-quato-icon-green m-0">
                                    <img src="<?= SITE_PATH ?>/assets/img/testimonials/testi-quato-icon.png"
                                         alt="<?= $row_patients['name_' . $lang_name] ?>">
                                </div>
                            </div>
                            <div class="testi-content-2">
                                <h3><?= $row_patients['title_' . $lang_name] ?></h3>
                                <p>
                                    <!--<iframe src="https://www.facebook.com/plugins/video.php?href=<?= $row_patients['video_url'] ?>&show_text=0" style="border:none;overflow:hidden; width: 100%;" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>-->
                                    <iframe style="width:100%; height: 300px;"
                                            src="https://www.youtube.com/embed/<?= youtube_embed($row_patients['video_url']) ?>"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </p>

                            </div>
                            <div class="testi-author d-flex align-items-center mt-30">
                                <div class="testi-author-desination-2">
                                    <h4><?= $row_patients['name_' . $lang_name] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="text-center">
            <a href="<?= $site ?>/reyler" class="btn" style="border-radius: 10px;"><?= $lang35 ?></a>
        </div>
    </div>
</section>
<!-- testimonials-area end -->
<div class="section-faq-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-4 d-lg-none d-xl-block">
                <div class="faq-left-box pos-rel mb-200">
                    <div class="faq-left-img">
                        <img class="img" src="<?=SITE_PATH?>/assets/img/faq/faq-left-back.jpg" alt="">
                    </div>
                    <div class="faq-pos-front">
                        <img class="img" src="<?=SITE_PATH?>/assets/img/faq/faq-left-front.jpg" alt="">
                    </div>
                    <div class="faq-back-shape">
                        <img class="img" src="<?=SITE_PATH?>/assets/img/faq/faq-left-back-shape.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="about-title mb-45">
                    <h5>FAQ</h5>
                    <h2><?= $lang36 ?></h2>
                </div>
                <div class="faq-right-box">
                    <div id="accordion" class="mt-40">
                        <?php
                        $home_faq = mysqli_query($db, "select * from faq where active=1");

                        $i = 1;
                        while ($row_faq = mysqli_fetch_assoc($home_faq)) {
                            ?>
                            <div class="card">
                                <div class="card-header" id="heading_<?=$i?>">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse_<?=$i?>" aria-expanded="false" aria-controls="collapse_<?=$i?>">
                                            <?= $row_faq['question_' . $lang_name] ?>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse_<?=$i?>" class="collapse" aria-labelledby="heading_<?=$i?>" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <p><?= decode_text($row_faq['answer_' . $lang_name]) ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero-area start -->
<section class="breadcrumb-bg pt-200 pb-180" data-background="<?=SITE_PATH?>/images/menus/<?=$info_menu['image']?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="page-title">
                    <h1><?=$info_menu['name_'.$lang_name]?></h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">
                <div class="page-breadcumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item">
                                <a href="<?=$site.'/'.$info_home_menu['link']?>"><?=$info_home_menu['name_'.$lang_name]?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$info_menu['name_'.$lang_name]?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero-area end -->

<!-- contact-area start -->
<section class="contact-area pt-120 pb-90" data-background="assets/img/bg/bg-map.html">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="contact text-center mb-30">
                    <i class="fas fa-envelope"></i>
                    <h3><?=$lang2?></h3>
                    <p><a href="mailto:<?=$info_contacts['email']?>"><?=$info_contacts['email']?></a></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="contact text-center mb-30">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3><?=$lang3?></h3>
                    <p><?=$info_contacts['text_'.$lang_name]?></p>
                </div>
            </div>
            <div class="col-xl-4  col-lg-4 col-md-4 ">
                <div class="contact text-center mb-30">
                    <i class="fas fa-phone"></i>
                    <h3><?=$lang4?></h3>
                    <p><a href="tel:<?=$info_contacts['mobile']?>"><?=$info_contacts['mobile']?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area end -->

<!-- contact-form-area start -->
<!--<section class="contact-form-area gray-bg pt-100 pb-100">-->
<!--    <div class="container">-->
<!--        <div class="form-wrapper">-->
<!--            <div class="row align-items-center">-->
<!--                <div class="col-xl-8 col-lg-8">-->
<!--                    <div class="section-title mb-55">-->
<!--                        <p><span></span> --><?//=$lang5?><!--</p>-->
<!--                        <h1>--><?//=$lang6?><!--</h1>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-4 col-lg-3 d-none d-xl-block ">-->
<!--                    <div class="section-link mb-80 text-right">-->
<!--                        <a data-animation="fadeInLeft" data-delay=".6s" href="--><?//=SITE_PATH?><!--/muayine" class="btn btn-icon ml-0"><span>+</span>--><?//=$lang7?><!--</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="contact-form">-->
<!--                <div class="alert alert-success success_contact" style="display: none;">--><?//=$lang8?><!--</div>-->
<!--                <div class="alert alert-warning error_contact" style="display: none;">--><?//=$lang9?><!--</div>-->
<!--                <form id="contact-form" action="#">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-box user-icon mb-30">-->
<!--                                <input type="text" name="name" placeholder="--><?//=$lang10?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-box email-icon mb-30">-->
<!--                                <input type="text" name="email" placeholder="--><?//=$lang11?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-box phone-icon mb-30">-->
<!--                                <input type="text" name="phone" placeholder="--><?//=$lang12?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-box subject-icon mb-30">-->
<!--                                <input type="text" name="subject" placeholder="--><?//=$lang13?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-12">-->
<!--                            <div class="form-box message-icon mb-30">-->
<!--                                        <textarea name="message" id="message" cols="30" rows="10"-->
<!--                                                  placeholder="--><?//=$lang14?><!--"></textarea>-->
<!--                            </div>-->
<!--                            <div class="contact-btn text-center">-->
<!--                                <button class="btn btn-icon ml-0" type="submit"><span>+</span> --><?//=$lang15?><!--</button>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--                <p class="ajax-response text-center"></p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- contact-form-area end -->

<!--<section class="map-area">-->
<!--   <div id="contact-map" class="contact-map"></div>-->
<!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.318457107671!2d49.82806131564817!3d40.37963406581823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307dbd537914dd%3A0x91d103742f48d738!2sNizami%20st.!5e0!3m2!1sen!2s!4v1580742805542!5m2!1sen!2s" frameborder="0" style="border:0; width: 100%; height: 500px;" allowfullscreen=""></iframe>-->
<!--</section>-->
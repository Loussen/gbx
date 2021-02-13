<header>
    <div class="top-bar-white top-bar-3 pt-30 pb-30">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="logo logo-3 pos-rel">
                        <a href="<?=$site?>"><img src="<?=SITE_PATH?>/assets/img/logo/logo_new.png" alt="<?=$info_description["title_".$lang_name]?>"></a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 d-none d-lg-block">
<!--                    <div class="header-lang f-right pos-rel d-none d-lg-block p-0">-->
<!--                        --><?php
//                        if($lang_name=='az') $lname='AZ';
//                        elseif($lang_name=='en') $lname='EN';
//                        ?>
<!--                        <div class="lang-icon">-->
<!--                            <img src="--><?//=SITE_PATH?><!--/assets/img/icon/langs/--><?//=strtolower($lname)?><!--.png" alt="--><?//=$lname?><!--">-->
<!--                            <span>--><?//=$lname?><!--<i class="fas fa-angle-down"></i></span>-->
<!--                        </div>-->
<!--                        <ul class="header-lang-list header-lang-list-3">-->
<!--                            <li><a href="--><?//=SITE_PATH?><!--/index.php?change_lang_name=az">AZ</a></li>-->
<!--                            <li><a href="--><?//=SITE_PATH?><!--/index.php?change_lang_name=ru">RU</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                    <div class="header-cta-info header-cta-info-3 d-flex f-left d-none">
                        <div class="header-cta-icon">
                            <i class="fa fa-envelope" style="
    width: 40px;
    height: 40px;
    font-size: 41px;
    color: #707daf;
"></i>
                        </div>
                        <div class="header-cta-text">
                            <h5 class="theme-color"><?=$lang2?></h5>
                            <span class="primary-color"><a href="mailto:<?=$info_contacts["email"]?>"><?=$info_contacts["email"]?></a></span>
                        </div>
                    </div>
                    <div class="header-cta-info header-cta-info-3 d-flex f-left">
                        <div class="header-cta-icon">
                            <i class="fa fa-phone" style="
    width: 40px;
    height: 40px;
    font-size: 41px;
    color: #707daf;
"></i>
                        </div>
                        <div class="header-cta-text">
                            <h5 class="theme-color"><?=$lang4?></h5>
                            <span class="primary-color"><a href="tel:<?=$info_contacts["mobile"]?>"><?=$info_contacts["mobile"]?></a></span>
                        </div>
                    </div>
                    <div class="header-cta-info header-cta-info-3 d-flex f-right">
                        <a data-animation="fadeInLeft" data-delay=".6s" href="<?=$site?>/muayine" class="btn btn-icon ml-0" style="background-color: red;"><span>+</span><?=$lang7?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="top-bar d-none d-md-block">-->
<!--        <div class="container">-->
<!--            <div class="row d-flex align-items-center">-->
<!--                <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-7 offset-md-1">-->
<!--                    <div class="header-info">-->
<!--                        <span><i class="fas fa-phone"></i> --><?//=$info_contacts["mobile"]?><!--</span>-->
<!--                        <span><i class="fas fa-envelope"></i> --><?//=$info_contacts["email"]?><!--</span>-->
<!--                        <span><a href="--><?//=$info_contacts["facebook"]?><!--"><i class="fab fa-facebook"></i></a></span>-->
<!--                        <span><a href="--><?//=$info_contacts["instagram"]?><!--"><i class="fab fa-instagram"></i></a></span>-->
<!--                        <span><a href="--><?//=$info_contacts["youtube"]?><!--"><i class="fab fa-youtube"></i></a></span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-5 col-lg-5 col-md-4">-->
<!--                    <div class="header-top-right-btn f-right">-->
<!--                        <a href="--><?//=$site?><!--/muayine" class="btn">--><?//=$lang7?><!--</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- menu-area -->
                <?php require_once "includes/menu.php" ?>

</header>

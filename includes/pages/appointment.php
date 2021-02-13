<!-- hero-area start -->
<!--<section class="breadcrumb-bg pt-200 pb-180" data-background="--><?//=SITE_PATH?><!--/images/appointment/--><?//=$info_menu['image']?><!--">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-9 col-md-9 col-12">-->
<!--                <div class="page-title">-->
<!--                    <h1>--><?//=$lang7?><!--</h1>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">-->
<!--                <div class="page-breadcumb">-->
<!--                    <nav aria-label="breadcrumb">-->
<!--                        <ol class="breadcrumb ">-->
<!--                            <li class="breadcrumb-item">-->
<!--                                <a href="--><?//=$site.'/'.$info_home_menu['link']?><!--">--><?//=$info_home_menu['name_'.$lang_name]?><!--</a>-->
<!--                            </li>-->
<!--                            <li class="breadcrumb-item active" aria-current="page">--><?//=$lang7?><!--</li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- hero-area end -->
<!-- about-area start -->
<section class="about-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="about-right-side mb-30">
<!--                    <div class="about-title mb-20">-->
<!--                        <h1>--><?//=$info_menu['name_'.$lang_name]?><!--</h1>-->
<!--                    </div>-->
                    <div class="about-text mb-50" style="text-align: center;">
                        <p><?=decode_text($info_menu['full_text_'.$lang_name],true)?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="login-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="basic-login">
                    <h3 class="text-center mb-60"><?=$lang29?></h3>
                    <div class="alert alert-success success_appointment" style="display: none;"><?=$lang8?></div>
                    <div class="alert alert-warning error_appointment" style="display: none;"><?=$lang9?></div>
                    <form id="appointment-form" action="#">
                        <label for="name"><?=$lang10?><span>**</span></label>
                        <input id="name" name="name" type="text">
                        <label for="surname-id"><?=$lang11?> <span>**</span></label>
                        <input id="surname-id" name="surname" type="text">
                        <label for="phone-id"><?=$lang12?> <span>**</span></label>
                        <input id="phone-id" name="phone" type="text">
                        <label for="pass"><?=$lang32?> <span></span></label>
                        <textarea name="message" cols="30" rows="10"></textarea>
                        <div class="mt-10"></div>
                        <button class="btn theme-btn-2 w-100"><?=$lang15?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area end -->
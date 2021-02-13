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
<?php
    $about=mysqli_fetch_assoc(mysqli_query($db,"select * from about"));
?>
<!-- about-area start -->
<section class="about-area pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-5">
                <div class="about-left-side pos-rel mb-30">
                    <div class="about-front-img pos-rel">
                        <img src="<?=SITE_PATH?>/images/about/<?=$about['image']?>" alt="<?=$about['name_'.$lang_name]?>">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="about-right-side pt-55 mb-30">
                    <div class="about-title mb-20">
                        <h5><?=$info_menu['name_'.$lang_name]?></h5>
                        <h2><?=$about['name_'.$lang_name]?></h2>
                    </div>
                    <div class="about-text mb-50 content-text">
                        <p><?=decode_text($about['full_text_'.$lang_name],true)?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area end -->
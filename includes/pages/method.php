<!-- hero-area start -->
<section class="breadcrumb-bg pt-200 pb-180" data-background="<?=SITE_PATH?>/images/menus/<?=$info_menu['image']?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="page-title">
                    <h1><?=$info_method['name_'.$lang_name]?></h1>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex justify-content-start justify-content-md-end align-items-center">
                <div class="page-breadcumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item">
                                <a href="<?=$site.'/'.$info_home_menu['link']?>"><?=$info_home_menu['name_'.$lang_name]?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?=$site.'/'.$info_menu['link']?>"><?=$info_menu['name_'.$lang_name]?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$info_method['name_'.$lang_name]?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero-area end -->
<!-- about-area start -->
<section class="about-area pb-90 mt-30 pt-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-4 mb-30">
                <div class="about-left-side pos-rel">
                    <div class="about-front-img pos-rel">
                        <img src="<?=SITE_PATH?>/images/methods/<?=$info_method['image']?>" alt="<?=$info_method['name_'.$lang_name]?>">
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-8">
                <div class="about-right-side">
                    <div class="about-title">
                        <h5><?=$info_menu['name_'.$lang_name]?></h5>
                        <h2><?=$info_method['name_'.$lang_name]?></h2>
                    </div>
                    <div class="about-text content-text">
                        <p><?=decode_text($info_method['full_text_'.$lang_name],true)?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area end -->
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
                            <li class="breadcrumb-item">
                                <a href="<?=$site.'/'.$info_menu['link']?>"><?=$info_menu['name_'.$lang_name]?></a>
                            </li>
                            <li class="breadcrumb-item active"><?=$info_data['name_'.$lang_name]?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero-area end -->

<!-- blog-area start -->
<section class="blog-area pt-100 pb-60">
    <div class="container">
        <div class="row">
            <?php
                $gallery = mysqli_query($db,"select * from photo_albums_gallery where active=1 and parent_id='$id'");

                while($row_gallery=mysqli_fetch_assoc($gallery))
                {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a class="elem" href="<?=SITE_PATH?>/images/photo_albums_gallery/<?=$info_data['id']."/".$row_gallery['image']?>" title="<?=$row_gallery['name_'.$lang_name]?>" data-lcl-thumb="<?=SITE_PATH?>/images/photo_albums_gallery/<?=$info_data['id']."/thumb_".$row_gallery['image']?>">
                                    <img src="<?=SITE_PATH?>/images/photo_albums_gallery/<?=$info_data['id']."/thumb_".$row_gallery['image']?>" alt="<?=$row_gallery['name_'.$lang_name]?>">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <h3 class="blog-title blog-title-sm">
                                    <?=$row_gallery['name_'.$lang_name]?>
                                </h3>
                            </div>
                        </article>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>
<!-- blog-area end -->
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

<!-- blog-area start -->
<section class="blog-area pt-100 pb-60">
    <div class="container">
        <div class="row">
            <?php

            $limit=6;
            if(isset($_GET["page"])) $page=intval($_GET["page"]); else $page=1;
            $max_data=mysqli_num_rows(mysqli_query($db,"select id from videogallery where active='1'"));
            $max_page=ceil($max_data/$limit);
            if($page>$max_page) $page=$max_page;
            if($page<1) $page=1;
            $start=$page*$limit-$limit;

            $sql=mysqli_query($db,"select * from videogallery where active=1 order by id desc limit $start, $limit");

            while($row=mysqli_fetch_assoc($sql))
            {
                ?>
                <div class="col-lg-4 col-md-6">
                    <article class="postbox post format-image mb-40">
                        <div class="postbox__thumb">
                            <iframe style="width:100%; height: 300px;" src="https://www.youtube.com/embed/<?=youtube_embed($row['video_url'])?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="postbox__text p-30">
                            <h3 class="blog-title blog-title-sm">
                                <?=$row['name_'.$lang_name]?>
                            </h3>
                        </div>
                    </article>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if($max_data>6)
        {
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col basic-pagination basic-pagination-2 text-center mb-40">
                            <ul>
                                <?php
                                $show=3;
                                if($page>$show+1) echo '<li><a href="?page='.($page-1).'"><i class="fas fa-angle-double-left"></i></a></li>';
                                for($i=$page-$show;$i<=$page+$show;$i++)
                                {
                                    if($i>0 && $i<=$max_page)
                                    {
                                        if($i==$page)
                                        {
                                            $class='active';
                                            $href = 'javascript:void(0);';
                                        }
                                        else
                                        {
                                            $class='';
                                            $href = '?page='.$i;
                                        }

                                        echo '<li class="'.$class.'"><a href="'.$href.'">'.$i.'</a></li>';
                                    }
                                }
                                if($page<$max_page-$show && $max_page>1) echo '<li><a href="?page='.($page+1).'"><i class="fas fa-angle-double-right"></i></a></li>';
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<!-- blog-area end -->
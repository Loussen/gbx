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
            $max_data=mysqli_num_rows(mysqli_query($db,"select id from patients where active='1'"));
            $max_page=ceil($max_data/$limit);
            if($page>$max_page) $page=$max_page;
            if($page<1) $page=1;
            $start=$page*$limit-$limit;

            $sql=mysqli_query($db,"select * from patients where active=1 order by id desc limit $start, $limit");

            while($row=mysqli_fetch_assoc($sql))
            {
                ?>
                <div class="col-xl-4 mt-20 pt-20">
                    <div class="testi-box-2" style="border: 1px solid #eee; padding: 10px;">
                        <div class="testi-content-2">
                            <h3><?=$row['title_'.$lang_name]?></h3>
                            <p>
                                <!--<iframe src="https://www.facebook.com/plugins/video.php?href=<?=$row['video_url']?>&show_text=0" style="border:none;overflow:hidden; width: 100%;" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>-->
                                <iframe style="width:100%; height: 300px;" src="https://www.youtube.com/embed/<?=youtube_embed($row['video_url'])?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </p>

                        </div>
                        <div class="testi-author d-flex align-items-center mt-30">
                            <div class="testi-author-desination-2">
                                <h4><?=$row['name_'.$lang_name]?></h4>
                            </div>
                        </div>
                    </div>
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
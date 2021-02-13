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
                $max_data=mysqli_num_rows(mysqli_query($db,"select id from methods where active='1'"));
                $max_page=ceil($max_data/$limit);
                if($page>$max_page) $page=$max_page;
                if($page<1) $page=1;
                $start=$page*$limit-$limit;

                $sql=mysqli_query($db,"select * from methods where active=1 order by id desc limit $start, $limit");

                while($row=mysqli_fetch_assoc($sql))
                {
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="latest-news-box latest-news-box-2 latest-news-box-3 mb-30">
                            <div class="latest-news-thumb">
                                <a href="<?= $site ?>/metod/<?= slugGenerator($row_methods['name_' . $lang_name]) . '-' . $row_methods["id"] ?>">
                                    <img style="width: 100%; height: 300px;" src="<?=SITE_PATH?>/images/methods/thumb_<?=$row['image']?>" alt="<?=$row['name_'.$lang_name]?>">
                                </a>
                            </div>
                            <div class="latest-news-content-box pl-0 pr-0">
                                <div class="latest-news-content">
                                    <h3><a class="title-link" href="<?=$site?>/metod/<?=slugGenerator($row['name_'.$lang_name]).'-'.$row["id"]?>"><?=$row['name_'.$lang_name]?></a></h3>
                                    <p><?=substr_(decode_text($row['short_text_'.$lang_name]),0,100,true)?></p>
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
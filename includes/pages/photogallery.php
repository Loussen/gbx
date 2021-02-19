<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3><?=$siteTitle?></h3>
                    </div>
                </div>
            </div>

            <div class="row row-images">
                <?php
                $limit=24;
                if(isset($_GET["page"])) $page=intval($_GET["page"]); else $page=1;
                $max_data=mysqli_num_rows(mysqli_query($db,"select id from photo_albums_gallery where active=1 AND album_id=".$id));
                $max_page=ceil($max_data/$limit);
                if($page>$max_page) $page=$max_page;
                if($page<1) $page=1;
                $start=$page*$limit-$limit;

                $sql_gallery = mysqli_query($db,"SELECT id,name_".$lang_name." name,image,image_small FROM photo_albums_gallery WHERE active=1 AND album_id=".$id." ORDER BY position,id desc limit $start, $limit");

                while($row_gallery = mysqli_fetch_assoc($sql_gallery))
                {
                    ?>
                    <div class="col-xs-6 col-sm-3 mb-15">
                        <a class="fancybox-thumb" rel="fancybox-thumb" href="<?=SITE_PATH?>/images/<?=$row_gallery['image']?>" title="<?=$row_gallery['name']?>">
                            <img src="<?=SITE_PATH?>/images/<?=$row_gallery['image_small']?>" class="img-responsive img-thumbnail">
                        </a>
                    </div>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
                <?php
                if($max_data>24)
                {
                    ?>
                    <ul class="pagination pagination-sm">
                        <?php
                        $show=6;
                        if($page>$show+1) echo '<li><a href="?page='.($page-1).'"><i class="fa fa-angle-double-left"></i></a></li>';

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
                        if($page<$max_page-$show && $max_page>1) echo '<li><a href="?page='.($page+1).'"><i class="fa fa-angle-double-right"></i></a></li>';
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php require_once "includes/right.php"; ?>
    </div>
</div>
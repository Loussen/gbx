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

            <div class="row row-gl">
                <?php
                $limit=12;
                if(isset($_GET["page"])) $page=intval($_GET["page"]); else $page=1;
                $max_data=mysqli_num_rows(mysqli_query($db,"select id from photo_albums where active=1"));
                $max_page=ceil($max_data/$limit);
                if($page>$max_page) $page=$max_page;
                if($page<1) $page=1;
                $start=$page*$limit-$limit;

                $sql_albums = mysqli_query($db,"SELECT id,name_".$lang_name." name,image FROM photo_albums WHERE active=1 ORDER BY position,id desc limit $start, $limit");

                while($row_albums = mysqli_fetch_assoc($sql_albums))
                {
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="photo-box">
                            <a href="<?=$site?>/fotoqalereya/<?=slugGenerator($row_albums['name']).'-'.$row_albums["id"]?>">
                                <img src="<?=SITE_PATH?>/images/<?=$row_albums['image']?>" class="img-responsive img-thumbnail">
                            </a>
                            <h5><?=$row_albums['name']?></h5>
                        </div>

                    </div>
                    <?php
                }
                ?>

                <div class="clearfix"></div>

                <?php
                if($max_data>12)
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
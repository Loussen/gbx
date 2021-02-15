<div class="wrapper-1">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3><?=$info_menu['name_'.$lang_name]?></h3>
                    </div>
                </div>
            </div>

            <?php
            $limit=6;
            if(isset($_GET["page"])) $page=intval($_GET["page"]); else $page=1;
            $max_data=mysqli_num_rows(mysqli_query($db,"select id from news where lang='$lang_name' AND `type`='$typeIndex' AND active='1'"));
            $max_page=ceil($max_data/$limit);
            if($page>$max_page) $page=$max_page;
            if($page<1) $page=1;
            $start=$page*$limit-$limit;

            $sql=mysqli_query($db,"select * from news where lang='$lang_name' AND active=1 AND `type`='$typeIndex' order by id desc limit $start, $limit");

            while($row=mysqli_fetch_assoc($sql))
            {
                ?>
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <img class="img-responsive img-thumbnail ifw mb-15" src="<?=SITE_PATH?>/images/<?=$row['image_medium']?>" alt="<?=$row['name']?>">
                    </div>
                    <div class="col-sm-7 col-md-8">
                        <h5 class="b-heading"><?=decode_text($row['name'],true)?></h5>
                        <span class="b-date"><i aria-hidden="true" class="fa fa-calendar"></i> <?=date("d.m.Y", $row['datetime'])?></span>
                        <span class="b-views"><i aria-hidden="true" class="fa fa-eye"></i> <?=$row['read_count']?></span>
                        <p class="b-info"><?=$row['short_text']?></p>
                        <a class="btn btn-more btn-sm" href="<?=$site?>/xeber/<?=slugGenerator($row['name']).'-'.$row["id"]?>">daha ətraflı</a>
                    </div>
                </div>

                <hr/>
                <?php
            }
            ?>

            <?php
            if($max_data>6)
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
<!--            <ul class="pagination pagination-sm">-->
<!--                <li><a href="#">1</a></li>-->
<!--                <li><a href="#">2</a></li>-->
<!--                <li><a href="#">3</a></li>-->
<!--                <li><a href="#">4</a></li>-->
<!--                <li><a href="#">5</a></li>-->
<!--            </ul>-->


        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
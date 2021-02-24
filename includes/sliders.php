<div class="car-wrap">
    <div class="carousel slide" data-ride="carousel" id="myCarousel">
        <div class="carousel-inner">
            <?php
                $sql_sliders = mysqli_query($db, "SELECT * FROM sliders WHERE active=1");

                $j = 1;
                while($row_sliders = mysqli_fetch_assoc($sql_sliders))
                {
                    ?>
                    <div class="item <?=$j==1 ? 'active' : ''?>">
                        <a href="<?=$row_sliders['url']?>" <?=$row_sliders['target']?>><img src="<?=SITE_PATH?>/images/sliders/<?=$row_sliders['image']?>">
                            <div class="post-title">
                                <?=decode_text($row_sliders['name_'.$lang_name])?>
                            </div>
                        </a>
                    </div>
                    <?php
                    $j++;
                }
            ?>
<!--            <div class="item active">-->
<!--                <a href="#"><img src="--><?//=SITE_PATH?><!--/assets/images/carousel/slide-1.jpg">-->
<!--                    <div class="post-title">-->
<!--                        Lorem ipsum dolor sit amet consetetur sadipscing-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <a href="#"><img src="--><?//=SITE_PATH?><!--/assets/images/carousel/slide-2.jpg">-->
<!--                    <div class="post-title">-->
<!--                        Lorem ipsum dolor sit amet consetetur sadipscing-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <a href="#"><img src="--><?//=SITE_PATH?><!--/assets/images/carousel/slide-3.jpg">-->
<!--                    <div class="post-title">-->
<!--                        Lorem ipsum dolor sit amet consetetur sadipscing-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <a href="#"><img src="--><?//=SITE_PATH?><!--/assets/images/carousel/slide-4.jpg">-->
<!--                    <div class="post-title">-->
<!--                        Lorem ipsum dolor sit amet consetetur sadipscing-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <a href="#"><img src="--><?//=SITE_PATH?><!--/assets/images/carousel/slide-5.jpg">-->
<!--                    <div class="post-title">-->
<!--                        Lorem ipsum dolor sit amet consetetur sadipscing-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
        </div>
        <ul class="list-group col-sm-4">
            <?php
                $i = 0;

                $sql_sliders2 = mysqli_query($db, "SELECT * FROM sliders WHERE active=1");
                while($row_sliders2 = mysqli_fetch_assoc($sql_sliders2))
                {
                    ?>
                    <li class="list-group-item <?=$i==0 ? 'active' : ''?>" data-slide-to="<?=$i?>" data-target="#myCarousel">
                        <div class="inner-item">
                            <h4><?=$row_sliders2['name_'.$lang_name]?></h4><span><?=$row_sliders2['title_'.$lang_name]?></span>
                        </div>
                    </li>
                    <?php
                    $i++;
                }
            ?>
<!--            <li class="list-group-item active" data-slide-to="0" data-target="#myCarousel">-->
<!--                <div class="inner-item">-->
<!--                    <h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4><span>Xəbərlər</span>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="list-group-item" data-slide-to="1" data-target="#myCarousel">-->
<!--                <div class="inner-item">-->
<!--                    <h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4><span>Kampaniyalar</span>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="list-group-item" data-slide-to="2" data-target="#myCarousel">-->
<!--                <div class="inner-item">-->
<!--                    <h4>Lorem ipsum dolor sit</h4><span>Populyar məqalələr</span>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="list-group-item" data-slide-to="3" data-target="#myCarousel">-->
<!--                <div class="inner-item">-->
<!--                    <h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4><span>Xəbərlər</span>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="list-group-item" data-slide-to="4" data-target="#myCarousel">-->
<!--                <div class="inner-item">-->
<!--                    <h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4><span>Xəbərlər</span>-->
<!--                </div>-->
<!--            </li>-->
        </ul>
        <div class="carousel-controls">
            <a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
</div>
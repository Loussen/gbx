<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!--<div class="mask-bg-1"></div>-->
<!--<div class="mask-bg-2"></div>-->
<div class="top-row">
    <div class="container">
        <div class="row top-pt">
            <div class="col-md-9">
                <div class="marquee">
                    <span class="mar-date"><i aria-hidden="true" class="fa fa-calendar"></i> 24.06.16</span><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut.</a> <span class="mar-date"><i aria-hidden="true" class="fa fa-calendar"></i> 22.06.16</span><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut.</a> <span class="mar-date"><i aria-hidden="true" class="fa fa-calendar"></i> 20.06.16</span><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut.</a>
                </div>
            </div>
            <div class="col-md-2">
                <ul class="social-top">
                    <li>
                        <a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i aria-hidden="true" class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i aria-hidden="true" class="fa fa-youtube-play"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-1">
                <ul class="list-unstyled social">
                    <li class="dropdown lng">
                        <?php
                        $row_selected_lang = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM langs WHERE active=1 AND name='$lang_name'"));
                        ?>
                        <a aria-expanded="false" class="btn-lang dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?=SITE_PATH?>/assets/img/flags/<?=$row_selected_lang['name']?>.png"><?=$row_selected_lang['full_name']?> <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>
                        <ul class="dropdown-menu lang lang-drop" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <?php
                            $sql_langs = mysqli_query($db,"SELECT * FROM langs WHERE active=1 AND name!='$lang_name' order by position");

                            while($row_langs = mysqli_fetch_assoc($sql_langs))
                            {
                                ?>
                                <li>
                                    <a href="<?=SITE_PATH?>/index.php?change_lang_name=<?=$row_langs['name']?>"><img src="<?=SITE_PATH?>/assets/img/flags/<?=$row_langs['name']?>.png"><?=$row_langs['full_name']?></a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

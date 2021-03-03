<!--<div class="patient-serv hidden-sm hidden-xs">-->
<!---->
<!--</div>-->
<div class="container" style="padding: 0 30px;background-color: #fff;border: 1px solid #eee;border-top: none;margin-bottom: 10px;border-radius: 0 0 20px 20px;">
    <div class="sitemap">
        <div class="row">
            <?php
                $sql_home_menus = mysqli_query($db, "select * from menus where active=1 and link!='home' and flash=1 order by position");

                while($row_home_menus=mysqli_fetch_assoc($sql_home_menus))
                {
                    ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="box-main">
                            <div class="box-image"><img class="img-responsive" src="<?=SITE_PATH?>/images/menus/thumb_<?=$row_home_menus['image']?>"></div>
                            <h3><?=$row_home_menus['name_'.$lang_name]?></h3>
                            <?php
                            $sql_home_sub_menus = mysqli_query($db, "select * from menus where parent_id='$row_home_menus[id]' and active=1 and flash = 0 order by position limit 3");

                            $sub_home_menus_count = mysqli_num_rows($sql_home_sub_menus);
                            ?>
                            <p><?=substr_(decode_text($row_home_menus['short_text_'.$lang_name]),0,$sub_home_menus_count > 0 ? 300 : 300,false,true)?></p>
                            <ul>
                                <?php
                                    if($sub_home_menus_count > 0)
                                    {
                                        while($row_home_sub_menus = mysqli_fetch_assoc($sql_home_sub_menus))
                                        {
                                            if ($row_home_sub_menus["link"] != '') $href = $site . '/' . $row_home_sub_menus["link"];
                                            else $href = $site . '/pages/' . slugGenerator($row_home_sub_menus["name_" . $lang_name], '-', true, $lang_name) . '-' . $row_home_sub_menus["id"];
                                            ?>
                                            <li>
                                                <a href="<?=$href?>"><?=$row_home_sub_menus['name_'.$lang_name]?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        if ($row_home_menus["link"] != '' && $row_home_menus["link"] != '#') $href = $site . '/' . $row_home_menus["link"];
                                        elseif ($row_home_menus["link"] == '#') $href = 'javascript::void(0);';
                                        else $href = $site . '/pages/' . slugGenerator($row_home_menus["name_" . $lang_name], '-', false, $lang_name) . '-' . $row_home_menus["id"];
                                        ?>
                                        <li>
                                            <a href="<?=$href?>"><?=$row_home_menus['name_'.$lang_name]?></a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
            ?>
<!--            <div class="col-sm-6 col-md-4">-->
<!--                <div class="box-main">-->
<!--                    <div class="box-image"><img class="img-responsive" src="--><?//=SITE_PATH?><!--/assets/images/pgallery/b1.jpg"></div>-->
<!--                    <h3>Xəstəxana</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut. Maecenas sollicitudin nulla vel nulla faucibus tincidunt.</p>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="">Haqqımızda</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Foto qalereya</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Video qalereya</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-4">-->
<!--                <div class="box-main">-->
<!--                    <div class="box-image"><img class="img-responsive" src="--><?//=SITE_PATH?><!--/assets/images/pgallery/b4.jpg"></div>-->
<!--                    <h3>Bölmələr</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut. Maecenas sollicitudin nulla vel nulla faucibus tincidunt.</p>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="">Bölmələr</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-4">-->
<!--                <div class="box-main">-->
<!--                    <div class="box-image"><img class="img-responsive" src="--><?//=SITE_PATH?><!--/assets/images/main/3.jpg"></div>-->
<!--                    <h3>Həkimlər</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut. Maecenas sollicitudin nulla vel nulla faucibus tincidunt.</p>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="">A-Z</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Bölmə üzrə</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">İxtisas üzrə</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-4">-->
<!--                <div class="box-main">-->
<!--                    <div class="box-image"><img class="img-responsive" src="--><?//=SITE_PATH?><!--/assets/images/main/4.jpg"></div>-->
<!--                    <h3>Check-Up</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut. Maecenas sollicitudin nulla vel nulla faucibus tincidunt.</p>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="">Ümumi</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Kişi üçün</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Qadın üçün</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-4">-->
<!--                <div class="box-main">-->
<!--                    <div class="box-image"><img class="img-responsive" src="--><?//=SITE_PATH?><!--/assets/images/main/5.jpg"></div>-->
<!--                    <h3>e-Xidmətlər</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut. Maecenas sollicitudin nulla vel nulla faucibus tincidunt.</p>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="">e-Randevu</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">e-Geri zəng</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-4">-->
<!--                <div class="box-main">-->
<!--                    <div class="box-image"><img class="img-responsive" src="--><?//=SITE_PATH?><!--/assets/images/main/6.jpg"></div>-->
<!--                    <h3>Xəbərlər</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices diam felis, sed euismod dui sollicitudin ut. Maecenas sollicitudin nulla vel nulla faucibus tincidunt.</p>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="">Xəbərlər</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Kampaniyalar</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="">Populyar məqalələr</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>
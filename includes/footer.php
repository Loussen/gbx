<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copy">© <?=date("Y")?> <?=$lang2?></p>
            </div>
<!--            <div class="col-sm-6">-->
<!--                <p class="nco">Made by <a href="http://ncostudio.az/" target="_blank"><strong>NCO</strong></a></p>-->
<!--            </div>-->
        </div>
    </div>
</footer>

<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-lg">
    <a class="navmenu-brand visible-md visible-lg" href="#">Project name</a>
    <ul class="nav navmenu-nav">
        <li class="lang-mob">
            <ul class="list-unstyled pull-left">
                <li class="dropdown lng">
                    <?php
//                    if($lang_name=='ru') $lname='RU';
//                    elseif($lang_name=='en') $lname='EN';
//                    elseif($lang_name=='tr') $lname='TR';
//                    else $lname='AZ';

                    $row_selected_lang = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM langs WHERE active=1 AND name='$lang_name'"));
                    ?>
                    <a aria-expanded="false" class="btn-lang dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?=SITE_PATH?>/assets/img/flags/<?=$row_selected_lang['name']?>.png"><?=$row_selected_lang['full_name']?> <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>
                    <?php

                    $sql_langs = mysqli_query($db,"SELECT * FROM langs WHERE active=1 AND name!='$lang_name' order by position");
                    ?>
                    <ul class="dropdown-menu lang lang-drop" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <?php
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
            <ul class="social-top pull-right">
                <li>
                    <a href="<?=$info_contacts['facebook']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="<?=$info_contacts['instagram']?>"><i aria-hidden="true" class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="<?=$info_contacts['youtube']?>"><i aria-hidden="true" class="fa fa-youtube-play"></i></a>
                </li>
            </ul>
        </li>
        <li class="side-nav-logo">
            <img src="<?=SITE_PATH?>/assets/img/logos/logo-web.svg">
        </li>
        <li class="search-mob">
            <div id="custom-search-input-mob">
                <div class="input-group col-md-12">
                    <input class="form-control" placeholder="" type="text"> <span class="input-group-btn"><button class="btn btn-info btn-lg" type="button"><span class="input-group-btn"><span class="input-group-btn"><span class="input-group-btn"><span class="input-group-btn"><span class="input-group-btn"><span class="input-group-btn"><i class="glyphicon glyphicon-search"></i></span></span></span></span></span></span></button></span>
                </div>
            </div>
        </li>
        <?php
        $sql = mysqli_query($db, "select * from menus where parent_id=0 and active=1 order by position");

        while ($row = mysqli_fetch_assoc($sql)) {
            $sub_sql = mysqli_query($db, "select * from menus where parent_id='$row[id]' and active=1 order by position");
            $sub_count = mysqli_num_rows($sub_sql);

            if ($sub_count > 0) {
                $sub_menu = true;
            } else {
                $sub_menu = false;
            }

            if ($row["link"] != '' && $row["link"] != '#') $href = $site . '/' . $row["link"];
            elseif ($row["link"] == '#') $href = 'javascript::void(0);';
            else $href = $site . '/pages/' . slugGenerator($row["name_" . $lang_name], '-', false, $lang_name) . '-' . $row["id"];

            if($sub_menu == false) {
                ?>
                <li>
                    <a class="" href="<?= $href ?>"><?= $row["name_" . $lang_name] ?></a>
                </li>
                <?php
            }

            if ($sub_menu == true) {
                ?>
                <li class="dropdown">
                    <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="<?= $href ?>"
                       role="button"><?= $row["name_" . $lang_name] ?>
                        <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>
                    <ul class="dropdown-menu navmenu-nav">
                        <?php
                        while ($row2 = mysqli_fetch_assoc($sub_sql)) {
                            if ($row2["link"] != '') $href = $site . '/' . $row2["link"];
                            else $href = $site . '/pages/' . slugGenerator($row2["name_" . $lang_name], '-', true, $lang_name) . '-' . $row2["id"];

                            echo '<li><a href="' . $href . '">' . $row2["name_" . $lang_name] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
<!--        <li>-->
<!--            <a class="" href="index.html">Baş səhifə</a>-->
<!--        </li>-->
<!--        <li class="dropdown">-->
<!--            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Haqqımızda <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>-->
<!--            <ul class="dropdown-menu navmenu-nav">-->
<!--                <li>-->
<!--                    <a href="about.html">Ümumi məlumat</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="director.html">Baş direktor</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="mission.html">Missiya, Dəyərlər və Məqsədlər</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="quality.html">Keyfiyyət siyasəti</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="partners.html">Tərəfdaşlar</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="pgallery.html">Foto qalereya</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="vgallery.html">Video qalereya</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a class="" href="departments.html">Bölmələr</a>-->
<!--        </li>-->
<!--        <li class="dropdown">-->
<!--            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Həkimlər <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>-->
<!--            <ul class="dropdown-menu navmenu-nav">-->
<!--                <li>-->
<!--                    <a href="doctors_a-z.html">A-Z</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="doctors_unit.html">Bölmə üzrə</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="doctors_specialty.html">İxtisas üzrə</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="check_up.html">Check-Up</a>-->
<!--        </li>-->
<!--        <li class="dropdown">-->
<!--            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">e-Xidmətlər <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>-->
<!--            <ul class="dropdown-menu navmenu-nav">-->
<!--                <li>-->
<!--                    <a href="e-appointment.html">e-Randevu</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="e-call-back.html">e-Geri zəng</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li class="dropdown">-->
<!--            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Xəbərlər <i aria-hidden="true" class="fa fa-angle-down hidden-md"></i></a>-->
<!--            <ul class="dropdown-menu navmenu-nav">-->
<!--                <li>-->
<!--                    <a href="blog.html">Xəbərlər</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="blog.html">Kampaniyalar</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="blog.html">Populyar məqalələr</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a class="" href="contact.html">Əlaqə</a>-->
<!--        </li>-->
    </ul>
</div>

<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
    <button class="navbar-toggle" data-target=".navmenu" data-toggle="offcanvas" type="button"><span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button><a class="pull-right" href="<?=SITE_PATH?>"><img src="<?=SITE_PATH?>/assets/img/logos/logo-mob.png"></a>
</div>
<a class="btn btn-primary btn-lg back-to-top hidden-xs" data-placement="left" data-toggle="tooltip" href="#" id="back-to-top" role="button" title="Səhifənin başına get"><i aria-hidden="true" class="fa fa-chevron-up"></i></a>
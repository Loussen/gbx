<?php
$row_right_menus = mysqli_fetch_assoc(mysqli_query($db, "select * from menus where id='$parentExistId' AND active=1"));
?>
<div class="col-sm-4 col-md-3">
    <?php
    if ($parentExistId > 0) {
        ?>
        <div class="aside-box hidden-sm hidden-xs">
            <h4><?= $row_right_menus['name_' . $lang_name] ?></h4>
            <ul>
                <?php
                $sql_right_menus_child = mysqli_query($db, "select * from menus where parent_id='$parentExistId' AND active=1 order by position");
                while ($row_right_menus_child = mysqli_fetch_assoc($sql_right_menus_child)) {
                    if ($row_right_menus_child["link"] != '' && $row_right_menus_child["link"] != '#') $href = $site . '/' . $row_right_menus_child["link"];
                    elseif ($row_right_menus_child["link"] == '#') $href = 'javascript::void(0);';
                    else $href = $site . '/pages/' . slugGenerator($row_right_menus_child["name_" . $lang_name], '-', false, $lang_name) . '-' . $row_right_menus_child["id"];
                    ?>
                    <li><a href="<?= $href ?>"><?= $row_right_menus_child["name_" . $lang_name] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    $sql_news = mysqli_query($db, "select * from news where lang='$lang_name' AND active=1 AND `type`=1 order by id desc limit 4");

    $count_news = mysqli_num_rows($sql_news);

    if ($count_news > 0) {
        ?>
        <h4 class="aside-cat-head"><?=$lang3?></h4>
        <div class="aside-inner">
            <div class="aside-blog-list">
                <ul>
                    <?php
                    while ($row_news = mysqli_fetch_assoc($sql_news)) {
                        ?>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <a href="#"><img class="img-responsive"
                                                     src="<?= SITE_PATH ?>/images/news/<?= $row_news['image_small'] ?>"></a>
                                </div>
                                <div class="col-xs-9">
                                    <span class="a-date"><?= date("d.m.Y", $row_news['datetime']) ?></span> <span
                                            class="a-heading"><a
                                                href="<?= $site ?>/xeber/<?= slugGenerator($row_news['name']) . '-' . $row_news["id"] ?>"><?= decode_text($row_news['name'], true) ?></a></span>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }

    $sql_campaigns = mysqli_query($db, "select * from news where lang='$lang_name' AND active=1 AND `type`=2 order by id desc limit 4");

    $count_campaigns = mysqli_num_rows($sql_campaigns);

    if ($count_campaigns > 0) {
        ?>
        <h4 class="aside-cat-head"><?=$lang4?></h4>
        <div class="aside-inner">
            <div class="aside-blog-list">
                <ul>
                    <?php
                    while ($row_campaigns = mysqli_fetch_assoc($sql_campaigns)) {
                        ?>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <a href="#"><img class="img-responsive"
                                                     src="<?= SITE_PATH ?>/images/news/<?= $row_campaigns['image_small'] ?>"></a>
                                </div>
                                <div class="col-xs-9">
                                    <span class="a-date"><?= date("d.m.Y", $row_campaigns['datetime']) ?></span> <span
                                            class="a-heading"><a
                                                href="<?= $site ?>/xeber/<?= slugGenerator($row_campaigns['name']) . '-' . $row_campaigns["id"] ?>"><?= decode_text($row_campaigns['name'], true) ?></a></span>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }

    $sql_popular = mysqli_query($db, "select * from news where lang='$lang_name' AND active=1 AND `type`=3 order by id desc limit 4");

    $count_popular = mysqli_num_rows($sql_popular);

    if ($sql_popular > 0) {
        ?>
        <h4 class="aside-cat-head"><?=$lang5?></h4>
        <div class="aside-inner">
            <div class="aside-blog-list">
                <ul>
                    <?php
                    while ($row_popular = mysqli_fetch_assoc($sql_popular)) {
                        ?>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <a href="#"><img class="img-responsive"
                                                     src="<?= SITE_PATH ?>/images/news/<?= $row_popular['image_small'] ?>"></a>
                                </div>
                                <div class="col-xs-9">
                                    <span class="a-date"><?= date("d.m.Y", $row_popular['datetime']) ?></span> <span
                                            class="a-heading"><a
                                                href="<?= $site ?>/xeber/<?= slugGenerator($row_popular['name']) . '-' . $row_popular["id"] ?>"><?= decode_text($row_popular['name'], true) ?></a></span>
                                </div>
                            </div>
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
</div>
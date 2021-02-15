<div class="menu">
    <div class="row">
        <nav class="col-md-12">
            <ul class="nav nav-justified hidden-sm hidden-xs top-nav">
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
                            <ul class="dropdown-menu" data-dropdown-in="zoomIn" data-dropdown-out="zoomOut">
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
            </ul>
        </nav>
    </div>
</div>
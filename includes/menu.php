<div class="header-menu-area header-menu-blue theme-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-lg-8">
                <div class="header__menu menu-dark">
                    <nav id="mobile-menu" style="display: block;">
                        <ul>
                            <?php
                            $sql = mysqli_query($db, "select * from menus where parent_id=0 and active=1 order by position");
                            $sql_services = mysqli_query($db, "select * from services where active=1 order by position");
                            $sql_methods = mysqli_query($db, "select * from methods where active=1 order by position");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $sub_sql = mysqli_query($db, "select * from menus where parent_id='$row[id]' and active=1 order by position");
                                $sub_count = mysqli_num_rows($sub_sql);

                                if ($sub_count > 0 && ($row['link'] != 'xidmetler' && $row['link'] != 'metodlar')) {
                                    $sub_menu_delimeter = " + ";
//                                    $sub_menu_delimeter = "";
                                    $sub_menu = true;
                                } else {
                                    $sub_menu_delimeter = "";
                                    $sub_menu = false;
                                }

                                if ($row["link"] != '' && $row["link"] != '##') $href = $site . '/' . $row["link"];
                                elseif ($row["link"] == '##') $href = 'javascript::void(0);';
                                else $href = $site . '/pages/' . slugGenerator($row["name_" . $lang_name], '-', true, $lang_name) . '-' . $row["id"];

                                echo '<li><a href="' . $href . '">' . $row["name_" . $lang_name] . $sub_menu_delimeter . '</a>';

                                if ($sub_menu == true) {
                                    echo '<ul class="submenu">';

                                    if ($row['link'] == 'xidmetler') {
                                        while ($row_services = mysqli_fetch_assoc($sql_services)) {
                                            $href = $site . '/xidmet/' . slugGenerator($row_services["name_" . $lang_name], '-', true, $lang_name) . '-' . $row_services["id"];
                                            echo '<li><a href="' . $href . '">' . $row_services["name_" . $lang_name] . '</a></li>';
                                        }
                                    } elseif ($row['link'] == 'metodlar') {
                                        while ($row_methods = mysqli_fetch_assoc($sql_methods)) {
                                            $href = $site . '/metod/' . slugGenerator($row_methods["name_" . $lang_name], '-', true, $lang_name) . '-' . $row_methods["id"];
                                            echo '<li><a href="' . $href . '">' . $row_methods["name_" . $lang_name] . '</a></li>';
                                        }
                                    } else {
                                        while ($row2 = mysqli_fetch_assoc($sub_sql)) {
                                            if ($row2["link"] != '') $href = $site . '/' . $row2["link"];
                                            else $href = $site . '/pages/' . slugGenerator($row2["name_" . $lang_name], '-', true, $lang_name) . '-' . $row2["id"];

                                            echo '<li><a href="' . $href . '">' . $row2["name_" . $lang_name] . '</a></li>';
                                        }
                                    }

                                    echo '</ul>';
                                }
                                echo '</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="header-right f-right">
                    <div class="header-social-icons f-right d-none d-lg-block p-0">
                        <ul>
                            <li><a href="<?=$info_contacts["facebook"]?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?=$info_contacts["youtube"]?>"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="<?=$info_contacts["instagram"]?>"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mobile-menu mobile-menu-blue"></div>
            </div>
        </div>
    </div>
</div>

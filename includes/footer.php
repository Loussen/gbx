<footer>
    <div class="footer-top primary-bg footer-map pos-rel pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.6538641521597!2d49.83991911528301!3d40.41651817936523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d9a1dba80bf%3A0x75c3a357a5ff838e!2sMedEra%20Hosp%C4%B1tal!5e0!3m2!1sen!2s!4v1608049350332!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4" style="margin-top: 30px;">
                    <div class="footer-widget mb-30">
                        <div class="footer-title">
                            <h3><?=$lang3?></h3>
                        </div>

                        <div class="footer-menu">
                            <h5 style="color: #899dab; line-height: 1.5;"><?=$info_contacts['text_'.$lang_name]?></h5>
<!--                            <ul>-->
<!--                                --><?php
//                                    $sql_count=mysqli_num_rows(mysqli_query($db,"select * from menus where (link!='' or parent_id>0) and link!='home' and active=1"));
//
//                                    $count_footer_menu = round($sql_count/2);
//                                    $sql=mysqli_query($db,"select * from menus where (link!='' or parent_id>0) and link!='home' and active=1 order by position LIMIT 0,$count_footer_menu");
//
//                                    while($row=mysqli_fetch_assoc($sql))
//                                    {
//                                        if($row["link"]!='') $href=$site.'/'.$row["link"];
//                                        else $href=$site.'/pages/'.slugGenerator($row["name_".$lang_name],'-',false,$lang_name).'-'.$row["id"];
//                                        ?>
<!--                                        <li><a href="--><?//=$href?><!--">--><?//=$row['name_'.$lang_name]?><!--</a></li>-->
<!--                                        --><?php
//                                    }
//                                ?>
<!--                            </ul>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 d-md-none d-lg-block" style="margin-top: 30px;">
                    <div class="footer-widget mb-30">
                        <div class="footer-title">
                            <h3><?=$lang37?></h3>
                        </div>

                        <div class="footer-menu">
                            <h5 style="color: #899dab;"><?=$info_contacts['mobile']?></h5>
<!--                            <ul>-->
<!--                                --><?php
//                                    $sql=mysqli_query($db,"select * from menus where (link!='' or parent_id>0) and link!='home' and active=1 order by position LIMIT $count_footer_menu,$count_footer_menu");
//
//                                    while($row=mysqli_fetch_assoc($sql))
//                                    {
//                                        if($row["link"]!='') $href=$site.'/'.$row["link"];
//                                        else $href=$site.'/pages/'.slugGenerator($row["name_".$lang_name],'-',false,$lang_name).'-'.$row["id"];
//                                        ?>
<!--                                        <li><a href="--><?//=$href?><!--">--><?//=$row['name_'.$lang_name]?><!--</a></li>-->
<!--                                        --><?php
//                                    }
//                                ?>
<!--                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-25 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer-copyright text-center">
                        <p class="white-color">© <?=date("Y")?> ramazannasirli.az - <?=$lang28?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
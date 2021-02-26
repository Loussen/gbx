<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3>Check-Up</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <center>
                <div id="my-slider3" style="align-items: center;">
                    <div class="ism-slider" data-play_type="loop" id="my-slider3">
                        <ol>
                            <?php
                                $sql_checkup = mysqli_query($db, "SELECT * FROM checkup WHERE active=1");

                                while($row_checkup = mysqli_fetch_assoc($sql_checkup))
                                {
                                    ?>
                                    <li><a href="<?=$row_checkup['url']?>" <?=$row_checkup['target']?>><img src="<?=SITE_PATH?>/images/checkup/<?=$row_checkup['image']?>" class="checkup_img"/></a></li>
                                    <?php
                                }
                            ?>
                        </ol>
                    </div>
                </div>
                </center>
            </div>

        </div>
    </div>
</div>
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
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-right: 0% !important;">
                    <!-- Indicators -->
                    <?php
                    $sql_checkup = mysqli_query($db, "SELECT * FROM checkup WHERE active=1");

                    $count = mysqli_num_rows($sql_checkup);
                    ?>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php

                        $j = 1;
                        while($row_checkup = mysqli_fetch_assoc($sql_checkup))
                        {
                            ?>
                            <div class="item <?=($j==1) ? 'active' : ''?>">
                                <img src="<?=SITE_PATH?>/images/checkup/<?=$row_checkup['image']?>">
                            </div>
                            <?php

                            $j++;
                        }

                        ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="top: 50%;">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="top: 50%;">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </center>
            </div>
        </div>
    </div>
</div>
<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3><?=$info_menu['name_'.$lang_name]?></h3>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <img class="img-responsive img-thumbnail ifw mb-15" src="<?=SITE_PATH?>/images/news/<?=$info_data['image']?>">
                    <h5 class="b-heading"><?=decode_text($info_data['name'],true)?></h5>
                    <span class="b-date"><i aria-hidden="true" class="fa fa-calendar"></i> <?=date("d.m.Y", $info_data['datetime'])?></span>
                    <span class="b-views"><i aria-hidden="true" class="fa fa-eye"></i> <?=$info_data['read_count']?></span>
                    <?=decode_text($info_data['full_text'],true)?>

                </div>
            </div>


        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
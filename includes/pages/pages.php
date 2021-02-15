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
                <div class="col-md-12">
                    <?=decode_text($info_menu['text_'.$lang_name],true)?>
                </div>
            </div>
        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
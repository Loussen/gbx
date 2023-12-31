<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3>Əlaqə</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="mapCanvas" class="map-canvas"></div>
                </div>
            </div>

            <div class="row cnt-det">
                <div class="col-sm-12 col-md-7 mb-15">
                    <div class="alert alert-success success_contact" style="display: none;"><?=$lang48?></div>
                    <div class="alert alert-warning error_contact" style="display: none;"><?=$lang9?></div>
                    <form id="contact-form" class="form form-gbx" action="#">
                        <h4 class="contact-head">Bizə yazın!</h4>
                        <div class="row">
                            <div class="col-xs-6 col-md-6 form-group">
                                <input class="form-control" id="name" name="name" placeholder="<?=$lang35?>" type="text" autocomplete="off" />
                            </div>
                            <div class="col-xs-6 col-md-6 form-group">
                                <input class="form-control" id="email" name="email" placeholder="<?=$lang36?>" type="email" autocomplete="off" />
                            </div>
                        </div>
                        <textarea class="form-control" id="message" name="message" placeholder="<?=$lang37?>" rows="3" autocomplete="off" minlength="10"></textarea>
                        <br />
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <button class="btn btn-more btn-sm" type="submit"><?=$lang47?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-5 mb-15">
                    <div class="contact-info">
                        <h4 class="contact-head">Əlaqə</h4>
                        <p><i aria-hidden="true" class="fa fa-phone"></i> <?=$info_contacts['phone']?><p>
                        <p><i aria-hidden="true" class="fa fa-phone"></i> <?=$info_contacts['phone2']?><p>
                        <p><i aria-hidden="true" class="fa fa-mobile"></i> <?=$info_contacts['mobile']?><p>
                        <p><i aria-hidden="true" class="fa fa-map-marker"></i> <?=$info_contacts['text_'.$lang_name]?><p>
                        <p><i aria-hidden="true" class="fa fa-envelope"></i> <?=$info_contacts['email']?><p>
                        <p><i aria-hidden="true" class="fa fa-envelope"></i> <?=$info_contacts['email2']?><p>
                        <p><i aria-hidden="true" class="fa fa-globe"></i> <?=$info_contacts['website']?><p>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
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
                    <form id="contact" method="post" class="form form-gbx" role="form">
                        <h4 class="contact-head">Bizə yazın!</h4>
                        <div class="row">
                            <div class="col-xs-6 col-md-6 form-group">
                                <input class="form-control" id="name" name="name" placeholder="Ad, Soyad" type="text" required autofocus />
                            </div>
                            <div class="col-xs-6 col-md-6 form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
                            </div>
                        </div>
                        <textarea class="form-control" id="message" name="message" placeholder="Mesaj" rows="3"></textarea>
                        <br />
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <button class="btn btn-more btn-sm" type="submit">Göndər</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-5 mb-15">
                    <div class="contact-info">
                        <h4 class="contact-head">Əlaqə</h4>
                        <p><i aria-hidden="true" class="fa fa-phone"></i> <?=$info_contacts['phone']?><p>
                        <p><i aria-hidden="true" class="fa fa-phone"></i> <?=$info_contacts['phone2']?><p>
                        <p><i aria-hidden="true" class="fa fa-map-marker"></i> <?=$info_contacts['address']?><p>
                        <p><i aria-hidden="true" class="fa fa-envelope"></i> <?=$info_contacts['mail']?><p>
                        <p><i aria-hidden="true" class="fa fa-envelope"></i> <?=$info_contacts['mail2']?><p>
                        <p><i aria-hidden="true" class="fa fa-globe"></i> <?=$info_contacts['website']?><p>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
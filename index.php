<?php

$start = microtime(true);

require_once "admin_gt7751/pages/__includes/config.php";

if(!isset($_GET["get_lang_name"])){
    $actual_link = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $new=str_replace($site,$site.'/az',$actual_link);
    $new=str_replace('www.','',$new);
    header("Location: $new");
    exit;
}

if (isset($_GET["do"])) $do = safe($_GET["do"]); else $do = 'home';
$do = str_replace("../", "", $do);
$do = str_replace("./", "", $do);
if (!is_file("includes/pages/" . $do . ".php")) $do = 'home';
$info_home_menu = mysqli_fetch_assoc(mysqli_query($db, "select * from menus where link='home' and active=1"));
$info_contacts = mysqli_fetch_assoc(mysqli_query($db, "select * from contacts"));
$info_description = mysqli_fetch_assoc(mysqli_query($db, "select * from description"));

$blogArr = [1 => 'xeberler', 2 => 'kampaniyalar', 3 => 'populyar-meqaleler'];
$doctorArr = [1 => 'all', 2 => 'bolme-uzre', 3 => 'ixtisas-uzre', 4 => 'qonaq-hekimler'];

$Name = 'name_' . $lang_name;
require_once "includes/controller.php";
?>
<!DOCTYPE html>
<html lang="az">
<head>
    <?php require_once "includes/head.php"; ?>
</head>
<body>
<?php require_once "includes/post_get_proceses.php"; ?>

<?php require_once "includes/top.php" ?>


<div class="container" style="padding: 0 30px;background-color: #fff;border: 1px solid #eee;margin-top: 10px;border-radius: 20px 20px 0 0;border-bottom: none; <?=($do == 'home') ? 'border-radius: 20px 20px 0 0;' : 'margin-bottom: 10px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; border-bottom: 1px solid #eee;'?>">
    <div class="main-wrapper">
        <div class="header">
            <div class="top-head">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo">
                            <a href="<?=SITE_PATH?>">
                                <img src="<?= SITE_PATH ?>/assets/img/logos/logo-web.svg">
                            </a>
                            <a href="http://www.jointcommissioninternational.org/about-jci/jci-accredited-organizations/?c=Azerbaijan" target="_blank">
                                <img width="90" src="<?= SITE_PATH ?>/assets/img/jci.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row pdtb">
                            <div class="col-sm-6">
                                <div id="custom-search-input">
                                    <form action="<?=SITE_PATH?>/axtarish" method="GET">
                                    <div class="input-group col-md-12">
                                        <input class="form-control" name="search" placeholder="<?=$lang1?>..."
                                               type="text"> <span class="input-group-btn"><button
                                                    class="btn btn-info btn-lg" type="submit"><span
                                                        class="input-group-btn"><span class="input-group-btn"><span
                                                                class="input-group-btn"><span
                                                                    class="input-group-btn"><span
                                                                        class="input-group-btn"><span
                                                                            class="input-group-btn"><i
                                                                                class="glyphicon glyphicon-search"></i></span></span></span></span></span></span></button></span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="tel: +99422203"><img width="90" src="<?= SITE_PATH ?>/assets/img/alo1_2.svg"></a>
                                <ul class="phone-main">
                                    <li><a href="tel: <?=$info_contacts['phone']?>"><?=$info_contacts['phone']?></a></li>
                                    <li><a href="tel: <?=$info_contacts['phone2']?>"><?=$info_contacts['phone2']?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once "includes/menu.php"; ?>
            </div>
        </div>
    </div>
    <?php if ($do == 'home') require_once "includes/sliders.php"; ?>

    <?php if($do != 'home') require_once "includes/pages/" . $do . ".php"; ?>
</div>

<?php if($do == 'home') require_once "includes/pages/" . $do . ".php"; ?>


<?php require_once "includes/footer.php" ?>

<?php require_once "includes/js.php"; ?>

<?php
if (isFlash('errorMsg')) $errorMsg = getFlash('errorMsg');
if (isFlash('successMsg')) $successMsg = getFlash('successMsg');
if (isFlash('infoMsg')) $infoMsg = getFlash('infoMsg');

if ($errorMsg != '') $runJs .= "<script>getAlert('error','Uğursuz nəticə','" . $errorMsg . "');</script>";
if ($successMsg != '') $runJs .= "<script>getAlert('success','" . $lang65 . "','" . $successMsg . "');</script>";
if ($infoMsg != '') $runJs .= "<script>getAlert('info','İnformasiya','" . $infoMsg . "');</script>";
if (isset($runJs)) echo $runJs;
?>
<input type="hidden" value="<?= SITE_PATH ?>" id="baseurl"/>

</body>
</html>
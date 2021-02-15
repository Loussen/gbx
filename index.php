<?php

$start = microtime(true);

require_once "admin_gt7751/pages/__includes/config.php";

if (!isset($_GET["get_lang_name"])) {
    $actual_link = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $new = str_replace($site, $site . '/az', $actual_link);
    $new = str_replace('www.', '', $new);
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


<div class="container">
    <div class="main-wrapper">
        <div class="header">
            <div class="top-head">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="logo">
                            <img src="<?= SITE_PATH ?>/assets/img/logos/logo-web.png">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row pdtb">
                            <div class="col-sm-8">
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <input class="form-control" placeholder="Həkim, xidmət, xəstəlik, check-up..."
                                               type="text"> <span class="input-group-btn"><button
                                                    class="btn btn-info btn-lg" type="button"><span
                                                        class="input-group-btn"><span class="input-group-btn"><span
                                                                class="input-group-btn"><span
                                                                    class="input-group-btn"><span
                                                                        class="input-group-btn"><span
                                                                            class="input-group-btn"><i
                                                                                class="glyphicon glyphicon-search"></i></span></span></span></span></span></span></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <ul class="phone-main">
                                    <li>+994 22 255 38 38</li>
                                    <li>+994 22 255 83 83</li>
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
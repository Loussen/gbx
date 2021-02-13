<?php

$start=microtime(true);

require_once "admin_gt7751/pages/__includes/config.php";

if(!isset($_GET["get_lang_name"])){
	$actual_link = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$new=str_replace($site,$site.'/az',$actual_link);
	$new=str_replace('www.','',$new);
	header("Location: $new");
	exit;
}

if(isset($_GET["do"])) $do=safe($_GET["do"]); else $do='home';
$do=str_replace("../","",$do); $do=str_replace("./","",$do);
if(!is_file("includes/pages/".$do.".php")) $do='home';
$info_home_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='home' and active=1"));
$info_contacts=mysqli_fetch_assoc(mysqli_query($db,"select * from contacts"));
$info_description=mysqli_fetch_assoc(mysqli_query($db,"select * from description"));
$Name='name_'.$lang_name;
require_once "includes/controller.php";
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<?php require_once "includes/head.php"; ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRFTZLW"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php require_once "includes/post_get_proceses.php"; ?>
    <main>
        <?php require_once "includes/top.php" ?>

        <?php require_once "includes/pages/".$do.".php"; ?>

        <?php require_once "includes/footer.php" ?>
    </main>

	<?php require_once "includes/js.php"; ?>

	<?php
	if(isFlash('errorMsg')) $errorMsg=getFlash('errorMsg');
	if(isFlash('successMsg')) $successMsg=getFlash('successMsg');
	if(isFlash('infoMsg')) $infoMsg=getFlash('infoMsg');

	if($errorMsg!='') $runJs.="<script>getAlert('error','Uğursuz nəticə','".$errorMsg."');</script>";
	if($successMsg!='') $runJs.="<script>getAlert('success','".$lang65."','".$successMsg."');</script>";
	if($infoMsg!='') $runJs.="<script>getAlert('info','İnformasiya','".$infoMsg."');</script>";
	if(isset($runJs)) echo $runJs;
	?>
	<input type="hidden" value="<?=SITE_PATH?>" id="baseurl" />

</body>
</html>
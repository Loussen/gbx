<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="description" content="<?=$siteDescription?> - Gəncə Beynəlxalq Xəstəxanası"/>
<meta name="keywords" content="<?=$siteKeywords?> - Gəncə Beynəlxalq Xəstəxanası"/>
<meta name="og:title" content="<?=$siteTitle?> - Gəncə Beynəlxalq Xəstəxanası"/>
<meta name="og:description" content="<?=$siteDescription?> - Gəncə Beynəlxalq Xəstəxanası"/>
<meta name="og:keywords" content="<?=$siteKeywords?> - Gəncə Beynəlxalq Xəstəxanası"/>
<meta name="og:image" content="<?=$siteImage?>"/>
<meta content="Fuad Hasanli | fhesenli92@gmail.com" name="author">
<title><?=$siteTitle?></title>

<link href="<?=SITE_PATH?>/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?=SITE_PATH?>/assets/fonts/fonts.css" rel="stylesheet">
<link href="<?=SITE_PATH?>/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=SITE_PATH?>/assets/css/hover.css" rel="stylesheet">
<link href="<?=SITE_PATH?>/assets/css/sidenav.css" rel="stylesheet">
<link href="<?=SITE_PATH?>/assets/css/animate.css" rel="stylesheet">
<link href="<?=SITE_PATH?>/assets/css/bootstrap-select.css" rel="stylesheet">
<link rel="shortcut icon" href="<?=SITE_PATH?>/assets/img/logos/favicon.ico">
<?php
    if($do == 'photogallery')
    {
        ?>
        <link rel="stylesheet" href="<?=SITE_PATH?>/assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?=SITE_PATH?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?=SITE_PATH?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <?php
    }

    if($do == 'checkup')
    {
        ?>
        <link href="<?=SITE_PATH?>/assets/css/one2.css" rel="stylesheet">
        <link href="<?=SITE_PATH?>/assets/css/my-slider3.css" rel="stylesheet">
        <?php
    }
?>
<link href="<?=SITE_PATH?>/assets/css/style.css" rel="stylesheet"><!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

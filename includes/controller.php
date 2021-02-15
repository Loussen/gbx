<?php
$errorMsg=''; $successMsg=''; $infoMsg=''; $runJs='';

if($do=='bloq'){
    $type = safe($_GET['type']);

    if(in_array($type,$blogArr)) {
        $typeIndex = array_search ($type, $blogArr);
        $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='info/$type' "));
        $siteTitle=$info_menu["name_".$lang_name];
        $siteDescription=substr_(decode_text($info_menu["text_".$lang_name],true,true),0,250);
        $siteKeywords=$info_description["keywords_".$lang_name];
        $siteImage=SITE_PATH.'/images/menus/'.$info_menu["image"];

        if($info_menu['parent_id']>0) {
            $parentExistId = $info_menu['parent_id'];
        }
    } else {
        header('Location: '.$site);
        die();
    }
}
elseif($do=='xeber'){
	$id=intval($_GET["id"]);
	$info_data=mysqli_fetch_assoc(mysqli_query($db,"select * from news where id='$id' "));
	if(mysqli_num_rows(mysqli_query($db,"select id from news where id='$id' "))==0) {header("Location: $site"); exit();}
	$siteTitle=decode_text($info_data["name"],true,true);
	$siteDescription=substr_(decode_text($info_data["full_text".$lang_name],true,true),0,250);
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/images/'.$info_data['image_medium'];

	if($info_data['type'] == 2) {
	    $link = 'kampaniyalar';
    } elseif($info_data['type'] == 3) {
	    $link = 'populyar-meqaleler';
    } else {
	    $link = 'xeberler';
    }

    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='info/$link' "));

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='sections'){
	$info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='bolmeler' "));
	$siteTitle=$info_menu["name_".$lang_name];
	$siteDescription=substr_(decode_text($info_menu["text_".$lang_name],true,true),0,250);
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/images/menus/'.$info_menu["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='section'){
    $id=intval($_GET["id"]);
    $info_data=mysqli_fetch_assoc(mysqli_query($db,"select * from sections where id='$id' AND active=1 "));
    if(mysqli_num_rows(mysqli_query($db,"select id from sections where id='$id' AND active=1 "))==0) {header("Location: $site"); exit();}
    $siteTitle=decode_text($info_data["name_".$lang_name],true,true);
    $siteDescription=substr_(decode_text($info_data["text_".$lang_name],true,true),0,250);
    $siteKeywords=$info_description["keywords_".$lang_name];

    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='bolmeler' "));

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='pages'){
	$menu_id=intval($_GET["menu_id"]);
	$info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where id='$menu_id' and active=1 "));
	if(intval($info_menu["id"])==0) {header("Location: $site"); exit();}
	
	$siteTitle=$info_menu["name_".$lang_name];
	$siteDescription=substr_(decode_text($info_menu["text_".$lang_name],true,true),0,250);
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/images/menus/'.$info_menu["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='elaqe'){
	$info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='elaqe' "));
	$siteTitle=$info_menu["name_".$lang_name];
	$siteDescription=$info_description["description_".$lang_name];
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/assets/img/logo-rentit.png';

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='albom'){
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='albom'"));
    $siteTitle=$info_menu["name_".$lang_name];
    $siteDescription=substr_(decode_text($info_menu["text_".$lang_name],true,true),0,250);
    $siteKeywords=$info_description["keywords_".$lang_name];
    $siteImage=SITE_PATH.'/images/menus/'.$info_menu["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='fotoqalereya'){
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='albom' "));

    $id=intval($_GET["id"]);
    $info_data=mysqli_fetch_assoc(mysqli_query($db,"select * from photo_albums where id='$id' "));
    if(mysqli_num_rows(mysqli_query($db,"select id from photo_albums where id='$id' "))==0) {header("Location: $site"); exit();}
    $siteTitle=$info_data["name_".$lang_name];
    $siteDescription=substr_(decode_text($info_data["text_".$lang_name],true,true),0,250);
    $siteKeywords=$info_description["keywords_".$lang_name];
    $siteImage=SITE_PATH.'/images/photo_albums/'.$info_data["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='service'){
    $id=intval($_GET["id"]);
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='xidmetler' and active=1 "));
    $info_service=mysqli_fetch_assoc(mysqli_query($db,"select * from services where id='$id' and active=1 "));
    if(intval($info_menu["id"])==0 || intval($info_service['id'])==0) {header("Location: $site"); exit();}

    $siteTitle=$info_menu["name_".$lang_name]." - ".$info_service["name_".$lang_name];
    $siteDescription=substr_(decode_text($info_service["full_text_".$lang_name],true,true),0,250);
    $siteKeywords=$info_description["keywords_".$lang_name];
    $siteImage=SITE_PATH.'/images/services/'.$info_service["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='services'){
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='xidmetler'"));
    $siteTitle=$info_menu["name_".$lang_name];
    $siteDescription=substr_(decode_text($info_menu["text_".$lang_name],true,true),0,250);
    $siteKeywords=$info_description["keywords_".$lang_name];
    $siteImage=SITE_PATH.'/images/menus/'.$info_menu["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
else{
	$siteTitle=$info_description["title_".$lang_name];
	$siteDescription=$info_description["description_".$lang_name];
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/assets/img/logo/logo_new.png';

    $parentExistId = 0;
}
?>
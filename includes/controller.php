<?php
$errorMsg=''; $successMsg=''; $infoMsg=''; $runJs='';

if($do=='blog'){
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
elseif($do=='news'){
	$id=intval($_GET["id"]);
	$info_data=mysqli_fetch_assoc(mysqli_query($db,"select * from news where id='$id' "));
	if(mysqli_num_rows(mysqli_query($db,"select id from news where id='$id' "))==0) {header("Location: $site"); exit();}
	$siteTitle=decode_text($info_data["name"],true,true);
	$siteDescription=substr_(decode_text($info_data["full_text".$lang_name],true,true),0,250);
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/images/'.$info_data['image_medium'];

    $query = mysqli_query($db,"update news set read_count=read_count+1 WHERE id='$id' AND active=1");

	if($info_data['type'] == 2) {
	    $link = 'kampaniyalar';
        $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='info/$link' "));
    } elseif($info_data['type'] == 3) {
	    $link = 'populyar-meqaleler';
        $info_menu['name_'.$lang_name] = $lang5;
    } elseif($info_data['type'] == 4) {
        $link = 'vakansiyalar';
        $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='info/$link' "));
    } else {
	    $link = 'xeberler';
        $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='info/$link' "));
    }

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
elseif($do=='albums'){
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='albomlar'"));
    $siteTitle=$info_menu["name_".$lang_name];
    $siteDescription=substr_(decode_text($info_menu["text_".$lang_name],true,true),0,250);
    $siteKeywords=$info_description["keywords_".$lang_name];
    $siteImage=SITE_PATH.'/images/menus/'.$info_menu["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='photogallery'){
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='albomlar' "));

    $id=intval($_GET["id"]);
    $info_data=mysqli_fetch_assoc(mysqli_query($db,"select * from photo_albums where id='$id' "));
    if(mysqli_num_rows(mysqli_query($db,"select id from photo_albums where id='$id' "))==0) {header("Location: $site"); exit();}
    $siteTitle=$info_menu['name_'.$lang_name]." - ".$info_data["name_".$lang_name];
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
elseif($do=='doctor'){
    $id=intval($_GET["id"]);
    $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='hekimlerimiz/all' and active=1 "));
    $info_doctor=mysqli_fetch_assoc(mysqli_query($db,"select * from doctors where id='$id' and active=1 "));
    if(intval($info_menu["id"])==0 || intval($info_doctor['id'])==0) {header("Location: $site"); exit();}

    $siteTitle=$info_menu["name_".$lang_name]." - ".$info_doctor["name_".$lang_name];
    $siteDescription=$info_doctor["name_".$lang_name];
    $siteKeywords=$info_description["keywords_".$lang_name];
    $siteImage=SITE_PATH.'/images/doctors/'.$info_doctor["image"];

    if($info_menu['parent_id']>0) {
        $parentExistId = $info_menu['parent_id'];
    }
}
elseif($do=='doctors')
{
    $type = safe($_GET['type']);

    if(in_array($type,$doctorArr)) {
        $doctorTypeIndex = array_search ($type, $doctorArr);

        switch ($doctorTypeIndex)
        {
            case 2:
                $title=$lang32;
                $placeholder=$lang31.'...';
                $column="s.name_".$lang_name;
                $column1=$column;
                $doctor_status="0";
                break;
            case 3:
                $title=$lang33;
                $placeholder=$lang34.'...';
                $column="p.name_".$lang_name;
                $column1=$column;
                $doctor_status="0";
                break;
            case 4:
                $title=$lang41;
                $placeholder=$lang12.'...';
                $column="d.name_".$lang_name;
                $column1="left(".$column.",1)";
                $doctor_status="1";
                break;
            default:
                $title=$lang40;
                $placeholder=$lang12.'...';
                $column="d.name_".$lang_name;
                $column1="left(".$column.",1)";
                $doctor_status="0";
        }

        $info_menu=mysqli_fetch_assoc(mysqli_query($db,"select * from menus where link='hekimlerimiz/$type' and active=1 "));
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
else{
	$siteTitle=$info_description["title_".$lang_name];
	$siteDescription=$info_description["description_".$lang_name];
	$siteKeywords=$info_description["keywords_".$lang_name];
	$siteImage=SITE_PATH.'/assets/img/logo/logo_new.png';

    $parentExistId = 0;
}
?>
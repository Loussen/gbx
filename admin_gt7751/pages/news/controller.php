<?php
if(!defined('db_name')) { header("Location: ../../"); exit(); die(); }
include "pages/__tools/some_params.php";
if($edit>0 && mysqli_num_rows(mysqli_query($db,"select id from $do where id='$edit' "))==0) { header("Location: index.php?do=$do"); exit(); die(); }

$imageFolder='../images/'.$do;
checkFolderIsset($imageFolder);

//

//$sql_replace = mysqli_query($db, "SELECT id,image,album_id,image_small FROM photo_albums_gallery");
//
//while($row_replace = mysqli_fetch_assoc($sql_replace))
//{
//    $explode = explode('/',$row_replace['image']);
//    $imageName = end($explode);
//    if(!file_exists("../images/photo_albums_gallery/".$imageName))
//    {
//        $name = $imageName;
//        copy("../images/".$row_replace['image'],"../images/photo_albums_gallery/".$name);
//    }
//    else
//    {
//        $name = time()."_".$imageName;
//        copy("../images/".$row_replace['image'],"../images/photo_albums_gallery/".$name);
//    }
//
//    $explode_small = explode('/',$row_replace['image_small']);
//    $imageName_small = end($explode_small);
//    if(!file_exists("../images/photo_albums_gallery/thumb_".$imageName_small))
//    {
//        $name_small = $imageName_small;
//        copy("../images/".$row_replace['image_small'],"../images/photo_albums_gallery/thumb_".$name_small);
//    }
//    else
//    {
//        $name_small = time()."_".$imageName_small;
//        copy("../images/".$row_replace['image_small'],"../images/photo_albums_gallery/thumb_".$name_small);
//    }
//
//    mysqli_query($db,"update photo_albums_gallery set `image`='$name' where id='$row_replace[id]' ");
//    mysqli_query($db,"update photo_albums_gallery set `image_small`='$name_small' where id='$row_replace[id]' ");
//}
//

if(isset($_GET["Type"])) $Type=safe($_GET["Type"]); else $Type=0;
if(isset($_GET["category_id"])) $category_id=intval($_GET["category_id"]); else $category_id=0;
if(isset($_GET["author_id"])) $author_id=intval($_GET["author_id"]); else $author_id=0;

if(isset($_POST["search_from"])){
	$datas_post=array('search_from','search_to');
	include "pages/__tools/check_post_datas.php";
	
	$hideForm='hide';
	
	if($search_from!=""){
		$search_from=explode("/",$search_from);
		$search_from=mktime(00,00,01,$search_from[1],$search_from[0],$search_from[2]);
	} else $search_from=0;
	
	if($search_to!=""){
		$search_to=explode("/",$search_to);
		$search_to=mktime(23,59,59,$search_to[1],$search_to[0],$search_to[2]);
	} else $search_to=0;
}
else{
	$search_from=0;
	$search_to=0;
}

if($search_from>0) $addQ.=" and datetime>='$search_from' ";
if($search_to>0) $addQ.=" and datetime<='$search_to' ";

// For paginator
$query_count="select id from $do where id>0 ";
if($category_id>0) $query_count.=" and category_id='$category_id' ";
if($author_id>0) $query_count.=" and author_id='$author_id' ";
if($Type==1) $query_count.=" and author_id>0 "; else $query_count.=" and author_id=0 ";

if(isset($_POST["submit_insert_update"]) && check_csrf_(safe($_POST["csrf_"]),$do) )
{
	$datas_post=array('type','datetime','name','short_text','full_text','lang');
	include "pages/__tools/check_post_datas.php";
	$hour=explode(":",$hour);
	if(!isset($category_id)) $category_id=0;
	if(!isset($flash)) $flash=0;
	
	if($datetime!=""){
		$datetime=explode("/",$datetime);
		$datetime=mktime($hour[0],$hour[1],date("s"),$datetime[1],$datetime[0],$datetime[2]);
	}
	else $datetime=$time;
	
	if(!$type > 0) $error='Tip daxil edilməyib.';
	if($lang == '') $error='Dil daxil edilməyib.';
	if($name == '') $error='Başlıq daxil edilməyib.';

	if($error==''){
		
		if($edit>0) mysqli_query($db,"update $do set `type`='$type',datetime='$datetime',`name`='$name',short_text='$short_text',full_text='$full_text',lang='$lang' where id='$edit' ");
		else mysqli_query($db,"insert into $do (lang,datetime,`name`,short_text,full_text,`type`) values ('$lang','$datetime','$name','$short_text','$full_text',$type) ");
		$ok="Məlumatlar uğurla yadda saxlanıldı.";
		$hideForm='hide';
		
		if($edit>0) $data_id=$edit; else $data_id=mysqli_insert_id($db);
		$uploadedFile=fileUpload('image');
		$uploadedFile_m=fileUpload('image_medium');
		$uploadedFile_s=fileUpload('image_small');
		if($uploadedFile!=''){
			makeThumb($imageFolder.'/'.$uploadedFile,$imageFolder.'/'.$uploadedFile,800,300);
			makeThumb($imageFolder.'/'.$uploadedFile_m,$imageFolder.'/'.$uploadedFile_m,600,400);
			makeThumb($imageFolder.'/'.$uploadedFile_s,$imageFolder.'/'.$uploadedFile_s,120,120);
		}
	}
}
elseif($delete>0 && mysqli_num_rows(mysqli_query($db,"select id from $do where id='$delete' "))>0)
{
	$info=mysqli_fetch_assoc(mysqli_query($db,"select * from $do where id='$delete' "));
	if(in_array('important',$get_table_name_columns) && $info["important"]==1) $error="Bu məlumatı silmək olmaz.";
	else{
		if(isset($imageFolder)) deleteOldFiles($do,$delete,$imageFolder);
		mysqli_query($db,"delete from $do where id='$delete' ");
		$ok="Məlumat silindi.";
		include "pages/__tools/reposition.php";
	}
}
include "pages/__tools/position_changer.php";

$information=mysqli_fetch_assoc(mysqli_query($db,"select * from $do where id='$edit' "));
?>
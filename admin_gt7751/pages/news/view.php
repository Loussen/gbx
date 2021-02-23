<?php
if(!defined('db_name')) { header("Location: ../"); exit(); die(); }
include "controller.php";
$page_title="Xəbərlər";
?>
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title"><?php echo $page_title?></h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php"><?php echo $mainSection?></a></li>
				<li><a href="<?php echo addFullUrl(array('add'=>0,'edit'=>0,'delete'=>0))?>" class="li_active"><?php echo $page_title?></a></li>
				<?php include "pages/__tools/print_button.php"; ?>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<?php
				include "form.php";
				include "pages/__tools/all_check_buttons.php";
				?>
				
				<div class="table-responsive dataTables_wrapper <?php echo unCurrentClass()?>">
					<form method="post" action="" class="print_hide filter_blok">
						
						<div class="form-group row <?php if($settings_inner["category_available"]==0) echo 'hide'; ?>">
							<label for="example-text-input" class="col-md-2 col-form-label">Kateqoriyalar:</label>
							<div class="col-md-10">
								<select class="form-control" onchange="MM_jumpMenu('parent',this,0)">
									<option value="<?php echo addFullUrl(array('category_id'=>0,'add'=>0,'edit'=>0))?>">Bütün</option>
									<?php
									$sql=mysqli_query($db,"select id,$Name from categories order by $Name");
									while($row=mysqli_fetch_assoc($sql)){
										if($category_id==$row["id"]) $selected='selected="selected"'; else $selected='';
										echo '<option value="'.addFullUrl(array('category_id'=>$row["id"],'add'=>0,'edit'=>0)).'" '.$selected.' >'.decode_text($row[$Name]).'</option>';
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group row <?php if($Type==0) echo 'hide'; ?>">
							<label for="example-text-input" class="col-md-2 col-form-label">Müəlliflər:</label>
							<div class="col-md-10">
								<select class="form-control" onchange="MM_jumpMenu('parent',this,0)">
									<option value="<?php echo addFullUrl(array('author_id'=>0,'add'=>0,'edit'=>0))?>">Bütün</option>
									<?php
									$sql=mysqli_query($db,"select id,$Name from authors order by $Name");
									while($row=mysqli_fetch_assoc($sql)){
										if($author_id==$row["id"]) $selected='selected="selected"'; else $selected='';
										echo '<option value="'.addFullUrl(array('author_id'=>$row["id"],'add'=>0,'edit'=>0)).'" '.$selected.' >'.decode_text($row[$Name]).'</option>';
									}
									?>
								</select>
							</div>
						</div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Dillər:</label>
                            <div class="col-md-10">
                                <select class="form-control" onchange="MM_jumpMenu('parent',this,0)">
                                    <option value="<?php echo addFullUrl(array('lang_filter'=>'all','add'=>0,'edit'=>0))?>">Bütün</option>
                                    <?php
                                    $sql=mysqli_query($db,"select id,`name` from langs order by `position`");
                                    while($row=mysqli_fetch_assoc($sql)){
                                        if($_GET['lang_filter']==$row["name"]) $selected='selected="selected"'; else $selected='';
                                        echo '<option value="'.addFullUrl(array('lang_filter'=>$row["name"],'add'=>0,'edit'=>0)).'" '.$selected.' >'.decode_text($row['name']).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
						
					</form>
		
					<table class="table table-striped">
						<thead>
							<tr class="auto_resize">
								<th><?php echo $input_allcheckbox?> Adı</th>
								<th>Tip</th>
								<th>Böyük Şəkil</th>
								<th>Orta Şəkil</th>
								<th>Kiçik Şəkil</th>
								<th class="print_hide">Alətlər</th>
							</tr>
						</thead>
						<tbody>
						<?php
                        $orderBy = 'order by id desc';
						$query=str_replace("select id ","select * ",$query_count);
						if($_GET[lang_filter] != 'all' && isset($_GET[lang_filter]))
						    $query.= "and lang='$_GET[lang_filter]'";

						$query.=" $orderBy limit $start,$limit";
						$sql=mysqli_query($db,$query);
						while($row=mysqli_fetch_assoc($sql))
						{
							$image=createFileView($imageFolder,$row["image"]);
							$image_medium=createFileView($imageFolder,$row["image_medium"]);
							$image_small=createFileView($imageFolder,$row["image_small"]);

							$addButtons=array('<a href="index.php?do=news_gallery&parent_id='.$row["id"].'" data-toggle="tooltip" data-original-title="Qalereya" class="m-r-10"><i class="fa fa-photo fa-lg"></i></a>');
							echo '<tr>
									<td>'.checkbox_row($row["id"]).' '.strip_tags(decode_text($row['name'],true)).'</td>
									<td>'.$newsType[$row['type']].'</td>
									<td>'.$image.'</td>
									<td>'.$image_medium.'</td>
									<td>'.$image_small.'</td>
									<td class="print_hide">'.rowButtons().'</td>
								</tr>';
						}
						?>
						</tbody>
					</table>
					<?php include "pages/__tools/paginator.php"; ?>
				</div>
				
			</div>
		</div>
	</div>
	
</div>
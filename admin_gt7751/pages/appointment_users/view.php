<?php
if(!defined('db_name')) { header("Location: ../"); exit(); die(); }
include "controller.php";
$page_title="Müayinə yazılanlar";
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
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:30%"><?php echo $input_allcheckbox?> Adı</th>
								<th style="width:25%">Email</th>
								<th style="width:25%">Mobil</th>
								<th style="width:20%" class="print_hide">Alətlər</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$query=str_replace("select id ","select * ",$query_count);
						$query.=" $orderBy limit $start,$limit";
						$sql=mysqli_query($db,$query);
						while($row=mysqli_fetch_assoc($sql))
						{
							if($row["seen_by_admin"]=="0") $image='<i class="fa fa-envelope fa-lg"></i>'; else $image='<i class="fa fa-envelope-o fa-lg"></i>';
							
							$addButtons=array('<a href="'.addFullUrl(array('view'=>$row["id"],'add'=>0,'delete'=>0,'edit'=>0,'up'=>0,'down'=>0,'delete_file'=>0)).'" data-toggle="tooltip" data-original-title="Oxu" class="m-r-10">'.$image.'</a>');
							echo '<tr>
									<td>'.checkbox_row($row["id"]).' '.decode_text($row["name"]).'</td>
									<td>'.decode_text($row["surname"]).'</td>
									<td>'.decode_text($row["phone"]).'</td>
									<td class="print_hide">'.rowButtons($addButtons,false).'</td>
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
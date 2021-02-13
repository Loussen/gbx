<?php if(!defined('db_name')) { header("Location: ../../"); exit(); die(); } ?>

<?php include "pages/__tools/add_new_link.php"; ?>
<?php include "pages/__tools/lang_tabs.php"; ?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="tab-content">
		<div class="form-group row hide">
			<label for="example-text-input" class="col-md-2 col-form-label">Əsas xəbərin İD-sini daxil edin:</label>
			<div class="col-md-10">
				<input name="gundem" class="form-control" type="text" value="<?php echo decode_text($information["gundem"]);?>" />
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_arge';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil Ar-Ge (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_kalite';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil Kalite (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_marka';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil Markalarımız (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_footer';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil Footer (1810x380):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_about';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil hakkımızda büyük (1000x370):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_about1';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil hakkımızda 1 (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_about2';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil hakkımızda 2 (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_about3';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil hakkımızda 3 (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_contact';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil İletişim (1000x240):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_sunar1';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil sunar 1 (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_sunar2';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil sunar 2 (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
		
		<?php
		$current_file=''; $column_nm='image_sunar3';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],0,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil sunar 3 (600x600):</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>
	
		<?php
		$sql=mysqli_query($db,"select id,name from langs order by position");
		while($row=mysqli_fetch_assoc($sql))
		{
			echo '<div role="tabpanel" class="tab-pane" id="tab_lang'.$row["id"].'">';
				/*
				echo '
				<div class="form-group row">
					<label for="example-text-input" class="col-md-2 col-form-label">Sual:</label>
					<div class="col-md-10">
						<input name="question_'.decode_text($row["name"]).'" class="form-control" type="text" value="'.decode_text($information["question_".$row["name"]]).'" />
					</div>
				</div>
				';
				*/
			echo '</div>';
		}
		?>
		
		<?php $submit_value='Yadda saxla'; include "pages/__tools/submit_button.php"; ?>
	</div>
</form>
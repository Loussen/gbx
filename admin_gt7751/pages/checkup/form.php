<?php if(!defined('db_name')) { header("Location: ../../"); exit(); die(); } ?><?php $t_title_add="Əlavə et"; include "pages/__tools/add_new_link.php"; ?><?php include "pages/__tools/lang_tabs.php"; ?><form action="" method="post" enctype="multipart/form-data" class="<?php echo $hideForm?>">	<div class="tab-content">				<div class="form-group row">			<label for="example-text-input" class="col-md-2 col-form-label">URL:</label>			<div class="col-md-10">				<input name="url" class="form-control" type="text" value="<?=decode_text($information["url"])?>" placeholder="http://example.com" />			</div>		</div>				<div class="form-group row">			<label for="example-text-input" class="col-md-2 col-form-label">Açılış növü:</label>			<div class="col-md-10">				<select name="target" class="form-control">					<option value="">Həmin pəncərədə</option>					<option value="1" <?php if($information["target"]!='') echo 'selected="selected"'; ?>>Yeni pəncərədə</option>				</select>			</div>		</div>				<?php		$current_file=''; $column_nm='image';		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],$edit,$column_nm);		?>		<div class="form-group row">			<label for="example-text-input" class="col-md-2 col-form-label">Şəkil:</label>			<div class="col-md-10">				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>			</div>		</div>				<?php $submit_value='Yadda saxla'; include "pages/__tools/submit_button.php"; ?>	</div></form>
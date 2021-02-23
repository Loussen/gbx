<?php if(!defined('db_name')) { header("Location: ../../"); exit(); die(); } ?>

<?php $t_title_add="Əlavə et"; include "pages/__tools/add_new_link.php"; ?>

<form action="" method="post" enctype="multipart/form-data" class="<?php echo $hideForm?>">
	<div class="tab-content">

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Dil:</label>
            <div class="col-md-10">
                <select required name="lang" class="form-control">
                    <option value="0">Seçin ...</option>
                    <?php
                    $sql=mysqli_query($db,"select id,name from langs order by position");
                    $inc=1;
                    while($row=mysqli_fetch_assoc($sql))
                    {
                        if($row['name']==$information["lang"]) $selected='selected="selected"'; else $selected='';
                        echo '<option value="'.$row['name'].'" '.$selected.'>'.decode_text($row['name']).'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Tip:</label>
			<div class="col-md-10">
				<select required name="type" class="form-control">
					<option value="0">Seçin ...</option>
					<?php
					foreach ($newsType as $keyType => $valType) {
						if($keyType==$information["type"]) $selected='selected="selected"'; else $selected='';
						echo '<option value="'.$keyType.'" '.$selected.'>'.decode_text($valType).'</option>';
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group row hide">
			<label for="example-text-input" class="col-md-2 col-form-label">Müəllif:</label>
			<div class="col-md-10">
				<select name="author_id" class="form-control">
					<option value="0"></option>
					<?php
					$sql=mysqli_query($db,"select id,$Name from authors order by $Name");
					while($row=mysqli_fetch_assoc($sql)){
						if($row["id"]==$information["author_id"]) $selected='selected="selected"'; else $selected='';
						echo '<option value="'.$row["id"].'" '.$selected.'>'.decode_text($row[$Name]).'</option>';
					}
					?>
				</select>

			</div>
		</div>

		<?php
		if($add==1){
			$datetime=date("d").'/'.date("m").'/'.date("Y");
			$hour=date("H:i");
		}
		else{
			$datetime=date("d/m/Y",$information["datetime"]);
			$hour=date("H:i",$information["datetime"]);
		}
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Tarix:</label>
			<div class="col-md-10">
				<div class="input-group">
					<input type="text" name="datetime" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" value="<?php echo $datetime?>" />
					<span class="input-group-addon"><i class="icon-calender"></i></span>
				</div>
			</div>
		</div>

		<div class="form-group row hide">
			<label for="example-text-input" class="col-md-2 col-form-label">Saat:</label>
			<div class="col-md-10">
				<div class="input-group clockpicker" data-autoclose="true">
					<input type="text" name="hour" class="form-control" value="<?php echo $hour?>">
					<span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
				</div>
			</div>
		</div>

		<?php
		$current_file=''; $column_nm='image';
		if($information[$column_nm]!="" && $edit>0) $current_file=createFileView($imageFolder,$information[$column_nm],$edit,$column_nm);

        $current_file_medium=''; $column_nm_medium='image_medium';
        if($information[$column_nm_medium]!="" && $edit>0) $current_file_medium=createFileView($imageFolder,$information[$column_nm_medium],$edit,$column_nm);

        $current_file_small=''; $column_nm_small='image_small';
        if($information[$column_nm_small]!="" && $edit>0) $current_file_small=createFileView($imageFolder,$information[$column_nm_small],$edit,$column_nm);
		?>
		<div class="form-group row">
			<label for="example-text-input" class="col-md-2 col-form-label">Böyük şəkil:</label>
			<div class="col-md-10">
				<input name="<?php echo decode_text($column_nm)?>" type="file" /> <?php echo $current_file?>
			</div>
		</div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Orta şəkil:</label>
            <div class="col-md-10">
                <input name="<?php echo decode_text($column_nm_medium)?>" type="file" /> <?php echo $current_file_medium?>
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Kiçik şəkil:</label>
            <div class="col-md-10">
                <input name="<?php echo decode_text($column_nm_small)?>" type="file" /> <?php echo $current_file_small?>
            </div>
        </div>

		<div class="form-group row hide">
			<label for="example-text-input" class="col-md-2 col-form-label">Flash:</label>
			<div class="col-md-10">
				<div class="checkbox checkbox-inverse pull-left margin_0">
					<input type="checkbox" id="flash_check" value="1" onclick="chbx_(this.id)" name="flash" <?php if($information["flash"]>0) echo 'checked="checked"'; ?> /> <label for="flash_check"></label>
				</div>
			</div>
		</div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Başlıq:</label>
            <div class="col-md-10">
                <input name="name" class="form-control" type="text" value="<?=strip_tags(decode_text($information["name"], true))?>" />
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Mətn <b>(Qısa izahı)</b>:</label>
            <div class="col-md-10">
                <textarea name="short_text" class="form-control" id="editor1"><?=decode_text($information["short_text"])?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Mətn <b>(Tam izahı)</b>:</label>
            <div class="col-md-10">
                <textarea name="full_text" class="form-control" id="editor2"><?=decode_text($information["full_text"])?></textarea>
            </div>
        </div>

		<?php $submit_value='Yadda saxla'; include "pages/__tools/submit_button.php"; ?>
	</div>
</form>
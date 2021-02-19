<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3><?= $title ?></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="custom-search-input" class="bg-s2">
                        <div class="input-group col-md-12 search_section">
                            <input class="form-control" placeholder="<?=$placeholder?>" type="text"> <span
                                    class="input-group-btn"><button class="btn btn-info btn-lg" type="button"><span
                                            class="input-group-btn"><span class="input-group-btn"><span
                                                    class="input-group-btn"><span class="input-group-btn"><i
                                                            class="glyphicon glyphicon-search"></i></span></span></span></span></button></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="row-mas">
                        <?php
                        $sql_doctors = mysqli_query($db, "SELECT d.id,d.name_" . $lang_name . " as name,d.image,
							s.name_" . $lang_name . " bname,p.name_" . $lang_name . " pname,a.name_" . $lang_name . " aname,t.name_" . $lang_name . " tname,c.iso2,left(" . $column . ",1) as col," . $column1 . " col_name
							FROM doctors d
							LEFT JOIN sections s ON s.id=d.section_id
							LEFT JOIN academics a ON a.id=d.academy_id
							LEFT JOIN professions p ON p.id=d.profession_id
							LEFT JOIN doctor_types t ON t.id=d.section_type_id
							LEFT JOIN countries c on c.id=d.country	
							LEFT JOIN a_z az on hex(az.name_" . $lang_name . ")=hex(left(" . $column . ",1))	
							WHERE d.active=1 and d.guest=" . $doctor_status . "
							ORDER BY az.id,hex(" . $column . ")");

                        $i = 0;
                        $alpha = '';
                        while($row_doctors = mysqli_fetch_assoc($sql_doctors))
                        {
                            if	($alpha=="")
                            {
                                $i++;
                                $result.='
								<div class="item-unit">
									<div class="unit-box"> 
										<h4>'.$row_doctors['col_name'].'</h4>
										<ul class="units-list">';

                                $alpha=$row_doctors['col_name'];
                            }
                            else
                                if	($alpha!=$row_doctors['col_name'])
                                {
                                    $i++;

                                    $result.='
										</ul>
									</div>
								</div>
								<div class="item-unit">
									<div class="unit-box"> 
										<h4>'.$row_doctors['col_name'].'</h4>
										<ul class="units-list">';
                                    $i=1;

                                    $alpha=$row_doctors['col_name'];
                                }

                            $result.='<li><a href="'.$site.'/hekim/'.slugGenerator($row_doctors['name']) . '-' . $row_doctors["id"].'">'.$row_doctors['name'].'</a></li>';
                        }

                        if ($i>0)
                        {
                            $result.='
								</ul>
							</div>
						</div>';
                            $i=0;
                        }

                        echo $result;
                        ?>

                    </div>
                </div>

            </div>
        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
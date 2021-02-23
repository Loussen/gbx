<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3><?= $info_menu['name_' . $lang_name] ?></h3>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div id="custom-search-input" class="bg-s2">
                        <div class="input-group col-md-12 search_section">
                            <input class="form-control" placeholder="Bölmə adı..." type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="button">
                                    <span class="input-group-btn"><span class="input-group-btn"><span class="input-group-btn"><span class="input-group-btn"><i class="glyphicon glyphicon-search"></i></span></span></span></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="row-mas">
                        <?php
                        $sql = mysqli_query($db,"SELECT s.id,s.name_" . $lang_name . " as name,left(s.name_" . $lang_name . ",1) as col
							FROM sections s
							LEFT JOIN a_z az on hex(az.name_" . $lang_name . ")=hex(left(s.name_" . $lang_name . ",1))
							WHERE s.active=1
							ORDER BY az.id, s.position");

                        $i = 0;
                        $alpha = "";
                        $result = "";
                        while ($row = mysqli_fetch_assoc($sql)) {
                            if ($alpha == "") {
                                $i++;
                                $result .= '
								<div class="item-unit">
                                    <div class="unit-box">
                                        <h4>'.$row['col'].'</h4>
                                        <ul class="units-list">';

                                $alpha = $row['col'];
                            } else
                                if ($alpha != $row['col']) {
                                    $i++;

                                    $result .= '
										</ul>
									</div>
								</div>
								<div class="item-unit">
									<div class="unit-box"> 
										<h4>' . $row['col'] . '</h4>
										<ul class="units-list">';
                                    $i = 1;

                                    $alpha = $row['col'];
                                }

                            $result .= '<li><a href="'.$site.'/bolme/'.slugGenerator($row['name']).'-'.$row["id"].'">' . $row['name'] . '</a></li>';
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
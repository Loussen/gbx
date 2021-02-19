<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3><?= decode_text($info_data["name_" . $lang_name], true, true); ?></h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div aria-multiselectable="true" id="accordion" role="tablist">

                        <?php
                        if (trim($info_data['text_' . $lang_name]) != '') {
                            ?>
                            <div class="card acc-doc">
                                <div class="" id="headingTwo" role="tab">
                                    <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false"
                                                               class="collapsed" data-parent="#accordion"
                                                               data-toggle="collapse" href="#collapseTwo" role="button">Tibbi
                                            bölmə haqqında məlumat</a></h4>
                                </div>
                                <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo"
                                     role="tabpanel">
                                    <div class="acc-doc-body">
                                        <?= decode_text($info_data['text_' . $lang_name], true) ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if (trim($info_data['section_' . $lang_name]) != '') {
                            ?>
                            <div class="card acc-doc">
                                <div class="" id="headingThree" role="tab">
                                    <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false"
                                                               class="collapsed" data-parent="#accordion"
                                                               data-toggle="collapse" href="#collapseThree"
                                                               role="button">Müalicə
                                            edilən xəstəliklər</a></h4>
                                </div>
                                <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree"
                                     role="tabpanel">
                                    <div class="acc-doc-body">
                                        <?= decode_text($info_data['section_' . $lang_name], true) ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if (trim($info_data['operation_' . $lang_name]) != '') {
                            ?>
                            <div class="card acc-doc">
                                <div class="" id="headingFour" role="tab">
                                    <h4 class="panel-title"><a aria-controls="collapseFour" aria-expanded="false"
                                                               class="collapsed" data-parent="#accordion"
                                                               data-toggle="collapse" href="#collapseFour"
                                                               role="button">İcra
                                            edilən prosedur və əməliyyatlar</a></h4>
                                </div>
                                <div aria-labelledby="headingFour" class="panel-collapse collapse" id="collapseFour"
                                     role="tabpanel">
                                    <div class="acc-doc-body">
                                        <?= decode_text($info_data['operation_' . $lang_name], true) ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
            <?php
            $sql_consultant = mysqli_query($db, "SELECT d.id,d.section_id,d.profession_id,d.academy_id,d.section_type_id,d.country,d.name_" . $lang_name . " as name,d.image,t.name_" . $lang_name . " tname,c.iso2, a.name_" . $lang_name . " aname, p.name_" . $lang_name . " pname
				FROM doctors d
				LEFT JOIN sections s ON s.id=d.section_id
				LEFT JOIN academics a ON a.id=d.academy_id
				LEFT JOIN professions p ON p.id=d.profession_id	
				LEFT JOIN doctor_types t ON t.id=d.section_type_id
				LEFT JOIN countries c on c.id=d.country	
				WHERE d.active=1 and d.section_type_id=2 and d.section_id=" . $id . "
				order by d.name_" . $lang_name);

            $consultant_count = mysqli_num_rows($sql_consultant);

            if ($consultant_count > 0) {
                ?>
                <div class="row">
                    <div class="col-md-12 mb-15">
                        <div class="doc-list-head">
                            <h4>Konsultant həkimlər</h4>
                        </div>
                    </div>

                </div>
                <div class="row docs">
                    <?php
                    while ($row_consultant = mysqli_fetch_assoc($sql_consultant)) {
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 no-td">
                            <a href="<?= $site ?>/hekim/<?= slugGenerator($row_consultant['name']) . '-' . $row_consultant["id"] ?>">
                                <div class="doc-list-unit">
                                    <img class="img-responsive mb-15"
                                         src="<?= SITE_PATH ?>/images/doctors/<?= $row_consultant['image'] ?>">
                                    <div class="flag-box"><img
                                                src="<?= SITE_PATH ?>/assets/img/flags2/<?= $row_consultant['iso2'] . ".png" ?>">
                                    </div>
                                    <h5><?= $row_consultant['aname'] . " " . $row_consultant['name'] ?></h5>
                                    <p><?= $row_consultant['pname'] ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }

            $sql_doctors = mysqli_query($db, "SELECT d.id,d.section_id,d.profession_id,d.academy_id,d.section_type_id,d.country,d.name_" . $lang_name . " as name,d.image,t.name_" . $lang_name . " tname,c.iso2, a.name_" . $lang_name . " aname, p.name_" . $lang_name . " pname
				FROM doctors d
				LEFT JOIN sections s ON s.id=d.section_id
				LEFT JOIN academics a ON a.id=d.academy_id
				LEFT JOIN professions p ON p.id=d.profession_id	
				LEFT JOIN doctor_types t ON t.id=d.section_type_id
				LEFT JOIN countries c on c.id=d.country	
				WHERE d.active=1 and d.section_type_id=1 and d.section_id=" . $id . "
				order by d.name_" . $lang_name);

            $doctors_count = mysqli_num_rows($sql_doctors);

            if ($doctors_count > 0) {
                ?>
                <div class="row">
                    <div class="col-md-12 mb-15">
                        <div class="doc-list-head">
                            <h4>Həkimlər</h4>
                        </div>
                    </div>

                </div>
                <div class="row docs">
                    <?php
                    while ($row_doctors = mysqli_fetch_assoc($sql_doctors)) {
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 no-td">
                            <a href="<?= $site ?>/hekim/<?= slugGenerator($row_doctors['name']) . '-' . $row_doctors["id"] ?>">
                                <div class="doc-list-unit">
                                    <img class="img-responsive mb-15"
                                         src="<?= SITE_PATH ?>/images/doctors/<?= $row_doctors['image'] ?>">
                                    <div class="flag-box"><img
                                                src="<?= SITE_PATH ?>/assets/img/flags2/<?= $row_doctors['iso2'] . ".png" ?>">
                                    </div>
                                    <h5><?= $row_doctors['aname'] . " " . $row_doctors['name'] ?></h5>
                                    <p><?= $row_doctors['pname'] ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
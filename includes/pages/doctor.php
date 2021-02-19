<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-8 col-md-9">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3>Həkimlər</h3>
                    </div>
                </div>
                <?php
                $row_doctor = mysqli_fetch_assoc(mysqli_query($db, "SELECT d.id,d.section_id,d.profession_id,d.academy_id,d.section_type_id,d.country,d.name_" . $lang_name . " as name,d.image,t.name_" . $lang_name . " tname,c.iso2, a.name_" . $lang_name . " aname, p.name_" . $lang_name . " pname, s.name_".$lang_name." sname, s.id s_id, d.service_".$lang_name." service, d.operation_".$lang_name." operation
				FROM doctors d
				LEFT JOIN sections s ON s.id=d.section_id
				LEFT JOIN academics a ON a.id=d.academy_id
				LEFT JOIN professions p ON p.id=d.profession_id	
				LEFT JOIN doctor_types t ON t.id=d.section_type_id
				LEFT JOIN countries c on c.id=d.country	
				WHERE d.active=1 and d.id=" . $id));
                ?>
                <div class="col-sm-3">
                    <div class="doc-img"><img class="img-responsive" src="<?= SITE_PATH ?>/images/doctors/<?= $row_doctor['image'] ?>"></div>
                </div>
                <div class="col-sm-9">
                    <div class="doc-info">
                        <h4><?=$row_doctor['name']?></h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="col-sm-3"><strong>Status</strong></td>
                                    <td class="col-sm-9"><?=$row_doctor['tname']?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><strong>Elmi dərəcə</strong></td>
                                    <td class="col-sm-9"><?=$row_doctor['aname']?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><strong>İxtisas</strong></td>
                                    <td class="col-sm-9"><?=$row_doctor['pname']?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><strong>Tibbi bölmə</strong></td>
                                    <td class="col-sm-9">
                                        <a href="<?=$site."/bolme/".slugGenerator($row_doctor['sname']).'-'.$row_doctor["s_id"]?>"><?=$row_doctor['sname']?></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div aria-multiselectable="true" id="accordion" role="tablist">
                        <?php
                            if($row_doctor['service'])
                            {
                                ?>
                                <div class="card acc-doc">
                                    <div class="" id="headingTwo" role="tab">
                                        <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false"
                                                                   class="collapsed" data-parent="#accordion"
                                                                   data-toggle="collapse" href="#collapseTwo" role="button">Müalicə
                                                etdiyi xəstəliklər</a></h4>
                                    </div>
                                    <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo"
                                         role="tabpanel">
                                        <div class="acc-doc-body">
                                            <?=decode_text($row_doctor['service'],true)?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                            if($row_doctor['operation'])
                            {
                                ?>
                                <div class="card acc-doc">
                                    <div class="" id="headingThree" role="tab">
                                        <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false"
                                                                   class="collapsed" data-parent="#accordion"
                                                                   data-toggle="collapse" href="#collapseThree" role="button">Prosedur
                                                və Əməliyyatlar</a></h4>
                                    </div>
                                    <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree"
                                         role="tabpanel">
                                        <div class="acc-doc-body">
                                            <?=decode_text($row_doctor['operation'],true)?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                            $sql_educations = mysqli_query($db,"SELECT id,doctor_id,name_".$lang_name." name, period, profession_".$lang_name." profession, country_".$lang_name." country
                            FROM educations
                            WHERE active=1 and doctor_id=".$id."
                            ORDER BY id");

                            $count_educations = mysqli_num_rows($sql_educations);

                            $sql_works = mysqli_query($db,"SELECT id,doctor_id,name_".$lang_name." name, position_".$lang_name." position, country_".$lang_name." country, period
                                FROM works
                                WHERE active=1 and doctor_id=".$id."
                                ORDER BY id");

                            $count_works = mysqli_num_rows($sql_works);

                            $sql_conferences = mysqli_query($db,"SELECT c.doctor_id,c.name_".$lang_name." name, s.name_".$lang_name." sname, c.period, c.country_".$lang_name." country
                                    FROM conferences c
                                    LEFT JOIN conference_status s ON s.id=c.status_id AND s.active = 1
                                    WHERE c.active=1 and c.doctor_id=".$id."
                                    ORDER BY c.id");

                            $count_conferences = mysqli_num_rows($sql_conferences);

                            $sql_memberships = mysqli_query($db,"SELECT id,doctor_id,name_".$lang_name." name, period
                                        FROM membership
                                        WHERE active=1 and doctor_id=".$id."
                                        ORDER BY id");

                            $count_memberships = mysqli_num_rows($sql_memberships);
                        ?>


                    </div><!-- Nav tabs -->
                    <div class="card">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <?php
                                if($count_educations > 0)
                                {
                                    ?>
                                    <li class="active" role="presentation">
                                        <a aria-controls="home" data-toggle="tab" href="#home"
                                           role="tab"><strong>Təhsil</strong></a>
                                    </li>
                                    <?php
                                }

                                if($count_works > 0)
                                {
                                    ?>
                                    <li role="presentation">
                                        <a aria-controls="profile" data-toggle="tab" href="#profile"
                                           role="tab"><strong>Təcrübə</strong></a>
                                    </li>
                                    <?php
                                }

                                if($count_conferences > 0)
                                {
                                    ?>
                                    <li role="presentation">
                                        <a aria-controls="messages" data-toggle="tab" href="#messages" role="tab"><strong>Konfrans</strong></a>
                                    </li>
                                    <?php
                                }

                                if($count_memberships > 0)
                                {
                                    ?>
                                    <li role="presentation">
                                        <a aria-controls="settings" data-toggle="tab" href="#settings"
                                           role="tab"><strong>Üzvlük</strong></a>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul><!-- Tab panes -->
                        <div class="tab-content-doc tab-content">
                            <?php
                                if($count_educations > 0)
                                {
                                    ?>
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Müddət</th>
                                                    <th>Adı</th>
                                                    <th>İxtisas</th>
                                                    <th>Yer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    while($row_educations = mysqli_fetch_assoc($sql_educations))
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><?=$row_educations['period']?></td>
                                                            <td><?=$row_educations['name']?></td>
                                                            <td><?=$row_educations['profession']?></td>
                                                            <td><?=$row_educations['country']?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                }

                                if($count_works > 0)
                                {
                                    ?>
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Müddət</th>
                                                    <th>Adı</th>
                                                    <th>Vəzifə</th>
                                                    <th>Yer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row_works = mysqli_fetch_assoc($sql_works))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=$row_works['period']?></td>
                                                        <td><?=$row_works['name']?></td>
                                                        <td><?=$row_works['position']?></td>
                                                        <td><?=$row_works['country']?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                }

                                if($count_conferences > 0)
                                {
                                    ?>
                                    <div class="tab-pane" id="messages" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Tarix</th>
                                                    <th>Adı</th>
                                                    <th>Status</th>
                                                    <th>Yer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row_conferences = mysqli_fetch_assoc($sql_conferences))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=$row_conferences['period']?></td>
                                                        <td><?=$row_conferences['name']?></td>
                                                        <td><?=$row_conferences['sname']?></td>
                                                        <td><?=$row_conferences['country']?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                }

                                if($count_memberships > 0)
                                {
                                    ?>
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Başlama tarixi</th>
                                                    <th>Qurum</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row_memberships = mysqli_fetch_assoc($sql_memberships))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=$row_memberships['period']?></td>
                                                        <td><?=$row_memberships['name']?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "includes/right.php"; ?>
    </div>
</div>
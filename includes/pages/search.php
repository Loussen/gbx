<?php
$evval = array("'", "", "", '"', "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "<", ">", "?", ".", "/", "\\");
$sonra = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

$sub_query="";
//Axtarışın nəticələri

if(isset($_GET["search"]))
{
    $search = decode_text(safe($_GET["search"]));

    $key_word = explode(' ',str_replace($evval,$sonra,$search));

    $query = "SELECT name, id, catalog, position FROM (Select menus.name_".$lang_name." name, menus.id id, 'menus' catalog, menus.position position from menus where (name_".$lang_name." LIKE '%".$search."%' or text_".$lang_name." LIKE '%".$search."%') and active = 1
union
Select sections.name_".$lang_name." name, sections.id id, 'sections' catalog, sections.position position from sections where (name_".$lang_name." LIKE '%".$search."%' or text_".$lang_name." LIKE '%".$search."%' or section_".$lang_name." LIKE '%".$search."%' or operation_".$lang_name." LIKE '%".$search."%') and active = 1
union
Select 
    news.name name, news.id id,
    CASE
        WHEN type = 1 THEN 'news'
        WHEN type = 2 THEN 'campaign'
        WHEN type = 3 THEN 'popular'
        ELSE 'news'
    END AS catalog, datetime position
from news where (name LIKE '%".$search."%' or short_text LIKE '%".$search."%' or full_text LIKE '%".$search."%') and active = 1
union
Select doctors.name_".$lang_name." name, doctors.id id, 'doctors' catalog, doctors.position position from doctors
 LEFT JOIN sections s ON s.id = doctors.section_id
			LEFT JOIN academics a ON a.id = doctors.academy_id
			LEFT JOIN professions p ON p.id = doctors.profession_id
			LEFT JOIN doctor_types dt ON dt.id = doctors.section_type_id
			LEFT JOIN countries c ON c.id = doctors.country
 where (doctors.name_".$lang_name." LIKE '%".$search."%' or doctors.service_".$lang_name." LIKE '%".$search."%' or doctors.operation_".$lang_name." LIKE '%".$search."%' or s.name_".$lang_name." LIKE '%".$search."%' or a.name_".$lang_name." LIKE '%".$search."%' or p.name_".$lang_name." LIKE '%".$search."%' or dt.name_".$lang_name." LIKE '%".$search."%') and doctors.active = 1
union
Select photo_albums.name_".$lang_name." name, photo_albums.id id, 'photo' catalog, photo_albums.position position from photo_albums where (name_".$lang_name." LIKE '%".$search."%' or text_".$lang_name." LIKE '%".$search."%') and active = 1) x order by position
";

    $result_search = mysqli_query($db, $query);

    $limit=10;
    if(isset($_GET["page"])) $page=intval($_GET["page"]); else $page=1;
    $max_data=mysqli_num_rows($result_search);
    $max_page=ceil($max_data/$limit);
    if($page>$max_page) $page=$max_page;
    if($page<1) $page=1;
    $start=$page*$limit-$limit;

    $query .= "limit $start, $limit";

    $result_search = mysqli_query($db, $query);
}
?>
<div class="wrapper-1">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h3>Axtarış nəticələri</h3>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>"<?=$search?>" sözü üzrə axtarış nəticələri (<?=$max_data?> nəticə):</p>
                    <?php
                        while($row_search = mysqli_fetch_assoc($result_search))
                        {
                            ?>
                            <div class="search-result-box">
                                <a class="s-title" href="#"><?=$row_search['name']?></a>
                                <a class="s-url" href="#">www.link.com</a>
                                <span class="s-cat"><?=$row_search['catalog']?></span>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <?php
            if($max_data>$limit)
            {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    $show=6;
                    if($page>$show+1) echo '<li><a href="?search='.$search.'&page='.($page-1).'"><i class="fa fa-angle-double-left"></i></a></li>';

                    for($i=$page-$show;$i<=$page+$show;$i++)
                    {
                        if($i>0 && $i<=$max_page)
                        {
                            if($i==$page)
                            {
                                $class='active';
                                $href = 'javascript:void(0);';
                            }
                            else
                            {
                                $class='';
                                $href = '&page='.$i;
                            }

                            echo '<li class="'.$class.'"><a href="?search='.$search.$href.'">'.$i.'</a></li>';
                        }
                    }
                    if($page<$max_page-$show && $max_page>1) echo '<li><a href="?search='.$search.'&page='.($page+1).'"><i class="fa fa-angle-double-right"></i></a></li>';
                    ?>
                </ul>
                <?php
            }
            ?>

        </div>

    </div>
</div>
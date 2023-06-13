<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('../head.php');

$file_url = $site_url.'/data/community/'; // pc

//Community List
$list_sql = "select * from community_board_tbl order by id desc ";
$list_stt = $db_conn->prepare($list_sql);
$list_stt->execute();

?>

<link rel="stylesheet" type="text/css" href="../css/community.css" rel="stylesheet" />

<section id="community-page">
    <article class="banner max">
        <p class="title">COMMUNITY<br />
            <span class="sub-title">
                부동산 개발 컨셉에서<br class="mo-br480" /> 브랜딩까지
            </span>
        </p>
        <p class="sub-text">
            디벨로퍼, 시행사, 시공사, 건축사, 인테리어, 디자이너들의<br />
            플레이스 브랜딩 성공 파트너
        </p>
    </article>

    <article class="community-container">
        <aside class="max community-box-wrap">
            <!--  -->
            <?php
            $is_data = 0;
            while ($list_row = $list_stt->fetch()) {
                $is_data = 1;

                $file_sql = "select * from community_file_tbl where id = " .$list_row['thumb_file'];
                $file_stt = $db_conn->prepare($file_sql);
                $file_stt->execute();
                $file = $file_stt->fetch();
            ?>
            <div class="community-box" onclick="location.href='community-detail.php?id=<?= $list_row['id'] ?>'">
                <div class="thumb" style="background: url('<?= $file_url .$file[2] ?>')"></div>
                <div class="text-wrap">
                    <p class="sub-title">PLACE BRANDING</p>
                    <p class="title"><?= $list_row['title'] ?></p>
                    <p class="writer"><?= $list_row['writer'] ?></p>
                </div>
            </div>
            <?php } if ($is_data != 1) { ?>

            <?php } ?>
            <!--  -->
        </aside>
    </article>
</section>

<?php
include_once('../tale.php');
?>

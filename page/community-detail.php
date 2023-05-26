<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('../head.php');

//Community Detail
$id = $_GET['id'];
$detail_sql = "select * from community_board_tbl where id = " .$id;
$detail_stt = $db_conn->prepare($detail_sql);
$detail_stt->execute();
$detail = $detail_stt->fetch();
//View Count
$view_sql = "UPDATE community_board_tbl set view_cnt = view_cnt + 1 where id = " .$id;
$viewStmt = $db_conn->prepare($view_sql);
$viewStmt->execute();
//Prev Board
$prev_sql = "select * from community_board_tbl where id < " .$id ." order by id desc limit 1";
$prev_stt = $db_conn->prepare($prev_sql);
$prev_stt->execute();
$prev = $prev_stt->fetch();
if(!$prev){
    $prev_title = "이전 게시글이 없습니다.";
    $prev_href = "";
}else{
    $prev_title = $prev['title'];
    $prev_href = "href='community-detail.php?id={$prev['id']}'";
}
//Next Board
$next_sql = "select * from community_board_tbl where id > " .$id ." order by id ASC limit 1";
$next_stt = $db_conn->prepare($next_sql);
$next_stt->execute();
$next = $next_stt->fetch();
if(!$next){
    $next_title = "다음 게시글이 없습니다.";
    $next_href = "";
}else{
    $next_title = $next['title'];
    $next_href = "href='community-detail.php?id={$next['id']}'";
}


?>
<link rel="stylesheet" type="text/css" href="../css/community.css" rel="stylesheet" />
<script>
    /* 공유 상자 열기/닫기 */
    let openShareBox = false;
    function onShareBox() {
        document.querySelector(".share-hidden").classList.toggle("share-box");
        openShareBox = !openShareBox;
    }

    document.addEventListener('click', function (e) {
        if (openShareBox) {
            let share = e.target.closest('.share-wrap');
            if (!share) {
                document.querySelector(".share-hidden").classList.toggle("share-box");
                openShareBox = false;
            }
        }
    });

    /* 링크 복사 */
    function shareLink() {
        const textarea = document.createElement("textarea");
        document.body.appendChild(textarea);
        textarea.value = window.location.href;
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        alert('링크를 복사하였습니다');
    }
</script>

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

    <article class="community-container" id="community-detail">
        <aside class="board-wrap max">
            <div class="text-wrap">
                <p class="title"><?= $detail['title'] ?></p>
                <div class="sub-text-wrap">
                    <span><?= $detail['writer'] ?></span>
                    <span class="line">|</span>
                    <span><?= str_replace("-", ".", $detail['regdate']) ?></span>
                    <span class="line mo-480hidden">|</span>
                    <span class="mo-480hidden">조회수 <?= $detail['view_cnt'] ?></span>
                    <span class="line">|</span>
                    <div class="share-wrap">
                        <img onclick="onShareBox()" class="share-icon" src="<?php echo $site_url ?>/img/share.png" />
                        <div class="share-hidden">
                            <div>
                                <img src="<?php echo $site_url ?>/img/facebook.png" />
                                <span>페이스북</span>
                            </div>
                            <div>
                                <img src="<?php echo $site_url ?>/img/kakao.png" />
                                <span>카카오톡</span>
                            </div>
                            <div onclick="shareLink()">
                                <img src="<?php echo $site_url ?>/img/copy.png" />
                                <span>링크복사</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contents-wrap">
                <?= $detail['content_desc'] ?>
            </div>
            <div class="next-board">
                <div class="pre">
                    <div class="next">다음글</div>
                    <div class="title"><a <?php echo $next_href ?>><?php echo $next_title ?></a></div>
                    <?php if($next){ ?>
                        <div class="writer"><?= $next['writer'] ?></div>
                        <div class="date"><?= str_replace("-", ".", $next['regdate']) ?></div>
                    <?php } ?>
                </div>
                <div class="pre next">
                    <div class="next">이전글</div>
                    <div class="title"><a <?php echo $prev_href ?>><?php echo $prev_title ?></a></div>
                    <?php if($prev){ ?>
                    <div class="writer"><?= $prev['writer'] ?></div>
                    <div class="date"><?= str_replace("-", ".", $prev['regdate']) ?></div>
                    <?php } ?>
                </div>
            </div>
        </aside>
    </article>
</section>

<?php
include_once('../tale.php');
?>

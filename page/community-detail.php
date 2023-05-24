<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('../head.php');
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
                <p class="title">제목</p>
                <div class="sub-text-wrap">
                    <span>글쓴이 이름</span>
                    <span class="line">|</span>
                    <span>2023.05.23</span>
                    <span class="line mo-480hidden">|</span>
                    <span class="mo-480hidden">조회수 105</span>
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
                본문 글이 노출되는 영역입니다.
                본문 글이 노출되는 영역입니다.
                본문 글이 노출되는 영역입니다.
                본문 글이 노출되는 영역입니다.
            </div>
            <div class="next-board">
                <div class="pre">
                    <div class="next">다음글</div>
                    <div class="title">제목 dsdsd d sd s d sd d sd sd s</div>
                    <div class="writer">글쓴이</div>
                    <div class="date">2023.05.23</div>
                </div>
                <div class="pre next">
                    <div class="next">다음글</div>
                    <div class="title">제목 ds sd sd sd sd sd sd sd dd d d s d d</div>
                    <div class="writer">글쓴이</div>
                    <div class="date">2023.05.23</div>
                </div>
            </div>
        </aside>
    </article>
</section>

<?php
include_once('../tale.php');
?>
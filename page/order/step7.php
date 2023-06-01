<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />

<!-- 결제 정보 확인 -->
<section id="order-page">
    <div class="main-container">
        <article class="menu-box">
            <p class="title">주문하기</p>
            <div class="menu-text">
                <p class="menu">1. 부가서비스</p>
                <p class="menu">2. 규정 동의</p>
                <p class="menu">3. 약관 동의</p>
                <p class="menu">4. 정보 입력</p>
                <p class="menu">5. 결제</p>
                <p class="menu">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu click">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <article class="order-add-container order-container contact-form order-form" id="contact-page">
            <p class="title">부가서비스 자료 첨부</p>

            <!-- 네이밍 -->
            <p class="add-title">네이밍 Naming</p>
            <p class="sub-tit add-sub-title"><b>네이밍 개발</b>을 위해 아래 자료를 요청드립니다. 자료를 첨부하거나 내용을 적어주십시오.</p>
            <div class="input-info">
                <div class="input-box">
                    <div class="input-wrap">
                        <p class="input-title">좋은 느낌을 받은신 사례</p>
                        <textarea class="input-text" type="text" name="company"
                            placeholder="좋은 느낌을 받으신 사례, 원하시는 벤치마킹 등"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">네이밍 방향성에 대한 의견</p>
                        <textarea class="input-text" type="text" name="company"
                            placeholder="원하시는 네이밍 방향성 또는 사내에서 거론된 네이밍 검토 등"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">질문 있으시면 적어주세요</p>
                        <textarea class="input-text" type="text" name="company" placeholder="진행에 관련한 사항"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- 로고 디자인 -->
            <hr />
            <p class="add-title">로고 디자인 Logo Design</p>
            <p class="sub-tit add-sub-title"><b>로고 디자인</b>을 위해 아래 자료를 요청드립니다. 자료를 첨부하거나 내용을 적어주십시오.</p>
            <div class="input-info">
                <div class="input-box">
                    <div class="input-wrap">
                        <p class="input-title">좋은 느낌을 받은신 사례</p>
                        <textarea class="input-text" type="text" name="company"
                            placeholder="좋은 느낌을 받으신 사례, 원하시는 벤치마킹 등"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">로고 디자인 방향성에 대한 의견</p>
                        <textarea class="input-text" type="text" name="company"
                            placeholder="원하시는 네이밍 방향성 또는 사내에서 거론된 네이밍 검토 등"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">질문 있으시면 적어주세요</p>
                        <textarea class="input-text" type="text" name="company" placeholder="진행에 관련한 사항"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- 컨셉 영상 -->
            <hr />
            <p class="add-title">컨셉 영상 Concept Video</p>
            <p class="sub-tit add-sub-title"><b>컨셉 영상 제작</b>을 위해 아래 자료를 요청드립니다. 자료를 첨부하거나 내용을 적어주십시오.</p>
            <div class="input-info">
                <div class="input-box">
                    <div class="input-wrap">
                        <p class="input-title">좋은 느낌을 받은신 사례</p>
                        <textarea class="input-text" type="text" name="company"
                            placeholder="좋은 느낌을 받으신 사례, 원하시는 벤치마킹 등"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">로고 디자인 방향성에 대한 의견</p>
                        <textarea class="input-text" type="text" name="company"
                            placeholder="원하시는 네이밍 방향성 또는 사내에서 거론된 네이밍 검토 등"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">질문 있으시면 적어주세요</p>
                        <textarea class="input-text" type="text" name="company" placeholder="진행에 관련한 사항"></textarea>
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="next-btn">
                <!--부가 서비스가 있을 경우 : 다음으로 -->
                <p onClick="location.href ='<?php echo $site_url ?>/page/order/step8.php'">제출하기<img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>
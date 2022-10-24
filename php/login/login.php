<!-- 로그인 가입 팝업 -->
<div class="login__popup">
        <div class="login__inner">
            <div class="login__header">
                <h3>로그인</h3>
            </div>
            <div class="login__contents">
                <form name="login" action="../login/loginSave.php" method="post">
                    <!-- 폼테그 영역 설정 fieldset -->
                    <fieldset>
                        <legend>로그인 입력폼</legend>
                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="email" name="youEmail" id="youEmail" placeholder="이메일" class="input__style" required><!-- required 필수로 적어야 넘어감 -->
                        </div>
                        <div>
                            <label for="youPass">비밀번호</label>
                            <input type="password" name="youPass" id="youPass" placeholder="비밀번호" class="input__style" required>
                        </div>
                        <!-- a태그 만들 수 X -->
                        <button type="submit" class="input__button">로그인</button>
                    </fieldset>
                </form>
            </div>
            <div class="login__footer">
                <div class="btn">
                    <a href="#">회원가입</a>
                    <a href="#">아이디 찾기</a>
                    <a href="#">비밀번호 찾기</a>
                </div>
                <ul class="desc">
                    <li>비밀번호 분실시 책임은 본인에게 있습니다.</li>
                    <li>처음 만들어보는 로그인 페이지 랍니다. hahaha</li>
                    <li>개인정보유출 없도록 노력은 해볼게요</li>
                </ul>
                <button type="button" class="btn-close"><span>닫기</span></button>
            </div>
            
        </div>
    </div>
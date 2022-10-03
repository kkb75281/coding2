// 탭 메뉴
var tabBtn = $(".tab_btn > ul > li");
var tabCont = $(".tab_cont > ul");

tabCont.hide().eq(0).show();

tabBtn.click(function(e){
    e.preventDefault();

    // 대상을 정확히 누굴 선택했는지(target) 알고 싶으면 this 사용
    var target = $(this);
    // 몇번째를 클릭했는지(index) 확인하기 위해서 번호 매기기
    var index = target.index();
    
    // 앞에 class 있으니까 .쓰지 않음
    tabBtn.removeClass("active");
    // 선택한 target에는 active 추가
    target.addClass("active");
    tabCont.css("display","none");
    tabCont.eq(index).css("display","block");

});


// 슬라이드
const sliderWrap = document.querySelector(".slider__wrap");
const sliderImg = document.querySelector(".slider__img");       // 보여지는 영역
const sliderInner = document.querySelector(".slider__inner");   // 움직이는 영역
const slider = document.querySelectorAll(".slider"); 
const sliderBtn = document.querySelector(".slider__btn");    //버튼
const sliderBtnPrev = document.querySelector(".prev");       //왼쪽버튼
const sliderBtnNext = document.querySelector(".next");       //오른쪽버튼

let currentIndex = 0;                       //현재 이미지
let sliderCount = slider.length;            //이미지 갯수
let sliderWidth = sliderImg.offsetWidth;    //이미지 가로값

// 이미지 움직이는 영역
function gotoSlider(num){
    sliderInner.style.transition = "all 400ms";
    sliderInner.style.transform = "translateX("+ -sliderWidth * num +"px)";
    currentIndex = num;
}

// 왼쪽 버튼을 클릭했을 때
sliderBtnPrev.addEventListener("click", () => {
    let prevIndex = (currentIndex + (sliderCount -1)) % sliderCount
    // 4, 1, 2, 3, 4, 1, 2, ...
    gotoSlider(prevIndex);
});

// 오른쪽 버튼을 클릭했을 때
sliderBtnNext.addEventListener("click", () => {
    let nextIndex = (currentIndex + 1) % sliderCount
    // 1, 2, 3, 4, 0, 1, 2, ...
    gotoSlider(nextIndex);
});
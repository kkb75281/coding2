// 네비게이션
$(".nav > ul > li").mouseover(function(){
    // 전체 메뉴 내려오게 할거면 .nav > ul > li
    // 각각 메뉴별로 내려오게 할거면 this
    $(this).find(".subMenu").stop().slideDown(200);
});
$(".nav > ul > li").mouseout(function(){
    $(this).find(".subMenu").stop().slideUp(200);
});

// 이미지 슬라이드(상하)
// currentIndexs = 0; 첫번째 이미지 :0
// currentIndexs = 1; 두번째 이미지 :-426
// currentIndexs = 2; 세번째 이미지 :-852
// var currentIndex = 0;   // 첫번째 이미지

// setInterval(function(){
//     if(currentIndex < 2){
//         currentIndex++;
//     } else {
//         currentIndex = 0;
//     }

//     var slidePosition = currentIndex * (-426.66)+"px";

//     $(".slideList").animate({top: slidePosition},400);
// },3000);

// 이미지 슬라이드(좌우)
var currentIndex = 0;

setInterval(function(){
    if(currentIndex < 2){
        currentIndex++;
    } else {
        currentIndex = 0;
    }

    var slidePosition = currentIndex * (-1000)+"px";

    $(".slideList").animate({left: slidePosition},400);
},3000);

// 탭 메뉴
var tabBtn = $(".tab-btn > ul > li");
var tabCont = $(".tab-cont > div");

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

// 레이어 팝업
$("#content1 .right").click(function(){
    // $(".layer").show(300);
    $(".layer").slideDown(300);
    $(".layer_bg").show();
});
$(".layer .close").click(function(){
    // $(".layer").show(300);
    $(".layer").slideUp(300);
    $(".layer_bg").hide();
});
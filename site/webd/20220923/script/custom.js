//세로 메뉴
$(".nav > ul > li").hover(
    function(){
        $(this).find(".submenu").stop().slideDown();
    },function(){
        $(this).find(".submenu").stop().slideUp();
});

// slideList > slideImg (1) eq(0)
// slideList > slideImg (2) eq(1)
// slideList > slideImg (3) eq(2)

//이미지 슬라이드 
$(".slideList").children("div:gt(0)").hide();

var currentIndex = 0;
//var currentIndex = 1;
//var currentIndex = 2;

setInterval(function(){
    var next = (currentIndex + 1) % 3;
    $(".slideList").find("div").eq(currentIndex).fadeOut();
    $(".slideList").find("div").eq(next).fadeIn();
    
    console.log("currentIndex="+ currentIndex);
    console.log("next="+ next);
    //currentIndex = 0
    //next = 1
    
    currentIndex = next;
},3000);

// 탭 메뉴
var tabBtn = $(".tab > ul > li");
var tabCont = $(".tab > ul > li > ul");

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














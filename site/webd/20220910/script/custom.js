$(".nav > ul > li").mouseover(function(){
    $(this).find(".subMenu").stop().slideDown(200);
});

$(".nav > ul > li").mouseout(function(){
    $(this).find(".subMenu").stop().slideUp(200);
});


var currentIndex = 0;   //현재 이미지를 변수에 저장

setInterval(function(){
    if(currentIndex < 2){
        currentIndex++
    } else {
        currentIndex = 0;
    }
    var slidePosition = currentIndex * (-374)+"px";

    // console.log(slidePosition);
    $(".slideList").animate({top:slidePosition},400);
}, 3000);


// 탭 메뉴
var tabMenu = $(".notice");

tabMenu.find("ul > li > ul").hide();
tabMenu.find("ul > li.active > ul").show();

function tabList(e){
    e.preventDefault();
    // ul > li > a : this
    var target = $(this);
    target.next().show().parent("li").addClass("active").siblings("li").removeClass("active").find("ul").hide();
};

tabMenu.find("ul > li > a").click(tabList).focus(tabList);


// 팝업
$(".ad").click(function(){
    $(".layer_bg").css("display","block");
});
$(".layer .close").click(function(){
    $(".layer_bg").css("display","none");
});
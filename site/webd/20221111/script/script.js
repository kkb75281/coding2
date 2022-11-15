$(function () {
  //header menu
  $("header nav >ul").mouseenter(function () {
    $("ul.menu__sub").slideDown(300);
  });

  $("header nav >ul").mouseleave(function () {
    $("ul.menu__sub").stop().slideUp(300);
  });

  //slide
  setInterval(function () {
    $(".slide__wrap").animate({ "margin-top": "-300" }, function () {
      $(".slide:first").appendTo(".slide__wrap");
      $(".slide__wrap").css({ "margin-top": "0" });
    });
  }, 3000);

  //tab
  $(".tabMenu li").click(function () {
    var idx = $(this).index();

    $(".tabItem >*").hide().removeClass("on");
    $(".tabItem >*").eq(idx).show().addClass("on");

    $(".tabMenu li").removeClass("on");
    $(this).addClass("on");
  });

  //popUpBox
  $(".notice li:nth-child(1)").click(function () {
    $(".popUpBox").show();
  });

  $(".popUpBox button").click(function () {
    $(".popUpBox").hide();
  });
});

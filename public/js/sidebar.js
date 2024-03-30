$(function () {
    "use strict";
    
    var url = window.location.href;
    var path = url.substring(url.lastIndexOf("/") + 1);
    var element = $(".menu-inner a[href*='" + path + "']").closest('.menu-item');
    
    element.addClass("active");
    
    element.parentsUntil(".menu-inner").each(function () {
      if ($(this).is("li")) {
        $(this).addClass("active");
        $(this).find("a:first").addClass("active");
      } else if ($(this).is("ul")) {
        $(this).addClass("in");
      }
    });
    
    $(".menu-item a").on("click", function (e) {
      if (!$(this).hasClass("active")) {
        $("ul", $(this).parents("ul:first")).removeClass("in");
        $("a", $(this).parents("ul:first")).removeClass("active");
        $(this).next("ul").addClass("in");
        $(this).addClass("active");
        $(this).scroll();
      } else if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this).parents("ul:first").removeClass("active");
        $(this).next("ul").removeClass("in");
      }
    });
    
    $(".menu-item > li > a.has-arrow").on("click", function (e) {
      e.preventDefault();
    });
  });
  
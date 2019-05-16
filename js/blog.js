$(function(){
    //文章选中时改变颜色
    $('.right li').hover(function(){
        $(this).siblings().css("opacity","0.3");  
    },function(){
        $('.right li').css("opacity","1");
    });

});
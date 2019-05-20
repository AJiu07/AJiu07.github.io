$(function(){
    //文章选中时改变颜色
    $('.right li').hover(function(){
        $(this).siblings().css("opacity","0.3");  
    },function(){
        $('.right li').css("opacity","1");
    });

    // $('.name').
    $.get("blog.php",function(data){
        date = JSON.parse(data);
        $.each(data, function (i, item) {  
            //访问每一个的属性，根据属性拿到值
            alert(item.studentName);  
             //将拿到的值显示到jsp页面
             $('#name').val(item.studentName);
        }); 
    });
});
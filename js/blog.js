$(function(){
    //文章选中时改变颜色
    $('.right li').hover(function(){
        $(this).siblings().css("opacity","0.3");  
    },function(){
        $('.right li').css("opacity","1");
    });

    // $('.name').
    $.get("blog.php",function(data){
        data = JSON.parse(data);
        let html = "";
        data.forEach(function(element, index) {
             html += "<li>";
             html += "<div class='pl'>";
             html += "<img src='img/6.png'>";
             html += "<p class='name'>" + element.username + "</p>"
             html += "<p class='content'>" + element.password +"</p>";
             html += "</div>";
             html += "</li>";
        });
        $("#person_list").html(html);

    }); 
});
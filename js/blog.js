$(function(){
    //文章选中时改变颜色
    $('.right li').hover(function(){
        $(this).css("opacity","1");
    },function(){
        $('.right li').css("opacity","0.3");
    });


    $.get("../../php/blog.php",function(data){
        data = JSON.parse(data);
        var html = "";
        data.forEach(function(element, index) {
             html += "<li>";
             html += "<div class='pl'>";
             html += "<img src='img/6.png'>";
             html += "<p class='name'>" + element.username + "</p>";
             html += "<p class='content'>" + element.email + "</p>";
             html += "</div>";
             html += "</li>";
        });
        $("#person_list").html(html);

    });


    // $.ajax({
    //   url:"blog.php",
    //   success:function(data){
    //       data = JSON.parse(data);
    //       let html = '';
    //       data.forEach(function(element,index){
    //         html += "<li>";
    //         html += "<div class='pl'>";
    //         html += "<img src='img/6.png'>";
    //         html += "<p class='name'>" + element.username + "</p>";
    //         html += "<p class='content'>" + element.emaile + "</p>";
    //         html += "</div>";
    //         html += "</li>";
    //       });
    //       $('#person_list').html(html);
    //   }
    // });
    // alert('yolo');
});

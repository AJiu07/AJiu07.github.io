$(function(){
    //文章选中时改变颜色
    $('.right li').hover(function(){
      $(this).css("opacity","1");
  },function(){
      $('.right li').css("opacity","0.3");
  });
    /* .left部分遍历留言 */
    $.get("../php/message.php",function(data){
      data = JSON.parse(data);
      let html = "";
      for(let i = 0; i < 4;i++){
        html += "<li>";
        html += "<div class='pl'>";
        html += "<img src='img/6.png'>";
        html += "<h3 class='name'>" + data[i].name + "</h3>";
        html += "<br>";
        html += "<p class='content'>" + data[i].content + "</p>";
        html += "</div>";
        html += "</li>";
    }
    $("#person_list").html(html);
});

    /* 右侧浏览博客部分 */
    $.get('../php/blog.php',function(data){
        data = JSON.parse(data);
        let html = '';
        for(let i = 0; i < data.length;i++){
            html += "<li>";
            html += "<a href='../blog-add.html?id=" + data[i].id + "' >";
            html += "<h1 class='title'>" + data[i].title + "</h1>";
            html += "<content>" + data[i].content + "</content>";
            html += "<p>" + data[i].registration + "发布 | 条评论</p>";
            html += "<img src='img/3.jpg'>";
            html += "</a>";
            html += "</li>";
            console.log(data[i].id);
        }
        $("#blog").html(html);

     });

    /* 回到顶部 */
    $(window).scroll(function(){
        if ($(window).scrollTop() > 1000){
            $(".back-top").css('display','block');
        }else{
            $(".back-top").css('display','none');
        }
    });
    $('.back-top').click(function(){
        //var scrollTop  = document.documentElement.scrollTop||document.body.scrollTop;
        $('body,html').animate({scrollTop:0},1000);
    });
    
});
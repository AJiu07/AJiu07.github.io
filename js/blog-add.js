
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

$(function(){

    /* 留言显示部分 */
    $('.tb').hover(function(){
        $('.message').show(1000);
        $('.message-ly').show(2500);
        $('.exit').show(1000);
        $('.tb').hide(5000);
    });
    $('.exit').click(function(){
        $('.exit').hide(2500);
        $('.message').hide(2500);
        $('.message-ly').hide(1000);
        $('.tb').show(3000);
    });

    /* .left部分遍历留言 */
    $.get("../php/message.php",function(data){
      data = JSON.parse(data);
      let html = "";
      for(let i = 0; i < 4;i++){
        html += ""
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

    /* 右侧文章部分 */
    $.get('../php/blog.php',function(data){
        data = JSON.parse(data);
        /* 将后台data倒叙排列 */
        data.reverse();
        let html = '';
        /* 调用getQueryVariable方法 提取URL中的id */
        let id = getQueryVariable('id');
            html += "<h1 class='title'>" + data[id-1].title + "</h1>";  /* data下标从0开始，id从1开始，id-1匹配data下标 */
            html += "<content>" + data[id-1].content + "</content>";
            html += "<p>" + data[id-1].registration + "发布 | 条评论</p>";
        $("#blog-b").html(html);
    });

    $('.next').click(function(){
        let id = getQueryVariable('id');
        let Id = id-1;
        if(Id !== 0){
            window.location.href = '../blog-add.html?id=' + Id + '';
        }else{
            alert('最后一篇啦');
        }
        
    });
});


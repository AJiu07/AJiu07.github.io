//已有x人留言
function getJsonLength(jsonData){
  var jsonLength = 0;
  for(var item in jsonData){
   jsonLength++;
 }
 return jsonLength;
}

/* 留言用户名，内容邮箱验证 */
function nameVerify(name){
  if(!name.val()){
    alert('想背着骂我?');
    return false;
  }else{
    if(name.val().length >= 15){
      alert('你输那么长想干嘛? 给你15个字表演');
      return false;
    }
  }
}
function emailVerify(email){
  if(!email.val()){
    alert('怕我邮件轰炸你嘛？');
    return false;
  }else{
    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    if(!reg.test(email.val())){
      alert("邮箱格式不正确");
      return false;
    }
  }
}


$(function(){
  /* .left部分遍历留言 */
  $.get("../php/message.php",function(data){
    data = JSON.parse(data);    
    var html = "";

    for(var i = 0; i < 4;i++){
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

  /* .right部分遍历留言 */
  $.get("../php/message.php",function(data){
    data = JSON.parse(data);
    var html = "";
    data.forEach(function(element, index) {
      html += "<div class='ly'>";
      html += "<img src='img/6.png'>";
      html += "<h2>"+ element.name +"</h2>";
      html += "<p>"+ element.content +"</p>";
      html += "</div>";
    });
    $('.comment').html(html);
  });

  $.get("../php/message.php",function(data){
    data = JSON.parse(data);
    var _contact_num = getJsonLength(data);
    $('#message-ly').text("已有"+ _contact_num +"人留言");
  });


  $('#y1').blur(function(){
      nameVerify($('#y1'));
  });
  $('#y3').blur(function(){
      emailVerify($('#y3'));
  });
});

$(function(){
    //滚动浏览器导航部分背景颜色
    $(document).ready(function(){
        //在文档加载完毕后执行
        $(window).scroll(function(){
            //开始监听滚动条
            //获取当前滚动条高度
            var topp = $(document).scrollTop();
                //判断如果滚动条大于10则改变.header背景色
                if(topp > 10){
                    $('.header').css("background-color","#ACD6FF");
                    $('.my').css("background-color","#ACD6FF");
                }else {
                    $('.header').css("background-color","transparent");
                    $('.my').css("background-color","transparent");
                }
            });
    });

    //自适应导航栏
    $('.my').click(function(){
            $('.dh1').toggle();
        });

    //滚动浏览器时调整h1位置
    $(document).ready(function(){
        //在文档加载完毕后执行
        $(window).scroll(function(){
            //开始监听滚动条
            //获取当前滚动条高度
            var topp = $(document).scrollTop();
                //判断如果滚动条大于10则改变.header背景色
                if(topp > 400){
                    $('.banner').css("top","27%");
                }else {
                    $('.banner').css("top","50%");
                }
            });
    });

    $('.blog-bg').hover(function(){
        $('.blog-bg a').css({
            background: "#F9F900",
            color: "#6C3365"
        });
    },function(){
        $('.blog-bg a').css({
            background: "#6C3365",
            color: "#fff"
        });
    });
});  
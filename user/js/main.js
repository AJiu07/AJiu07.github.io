$(function(){
	$('#my').click(function(){
		$('.header').css("display",'none');
		$('.banner').show(3000);
	});
	$('#My').click(function(){
		$('.banner').css("display",'none');
		$('.header').show(3000);
	});

//遮罩层移动
// $(document).ready(function(){
// 	var css = {left:2000};		
// 	$('#demo').animate(css,20000,rowBack);		
// 	function rowBack(){			
// 		if(css.left===200)				
// 			css.left=2000;			
// 		else if(css.left===2000)				
// 			css.left=200;			
// 		$('#demo').animate(css,20000,rowBack);		
// 	}
// });




});
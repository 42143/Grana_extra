$(document).ready(function(){
	$(".get").click(function(){
		$(".Screen1").hide();	
		$(".Screen3").hide();
		$(".Screen4").hide();
		$(".Screen2").show();
	});
	$(".logo").click(function(){
		$(".Screen2").hide();
		$(".Screen4").hide();
		$(".Screen1").show();
		$(".menu").show();
		$(".close").hide();
		$(".create_project").hide();
		$(".nickname").hide();
		$(".Screen3").hide();
		$(".Screen1").show();
	});
	$(".register").click(function(){
		$(".Screen1").hide();
		$(".Screen3").show();	
	});
	
	//$(".btn_register").click(function(){
		//$(".Screen3").hide();
		//$(".Screen4").show();
		//$(".menu").hide();
		//$(".close").show();
		//$(".nickname").show();
			
	//});
});
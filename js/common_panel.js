$(document).ready(function(){
	window.setTimeout(function(){
		setTimeout(function(){
			$("header").css({'opacity':'0.95','transition':'0.50s'});
			},1000);
	},100);
	$("html").css({'background':'#F7F8F9'});
	$(".menu").css({'display':'none'});
	$(".close").css({'display':'block'});
	$(".create_project").css({'display':'block'});
	$(".nickname").css({'display':'block','margin-left':'-110px'});
	$(".btn_edit_profile").css({'display':'block'});
	$(".edit_profile").css({'display':'none'});
	$(".btn_account").css({'display':'block'});
	$(".btn_my_projects").css({'display':'block'});
	$(".btn_my_proposals").css({'display':'block'});
	$(".btn_contractor").css({'display':'block'});
		$(".btn_contractor").click(function(){
			$(".create_projects").css({'height':'1000px'});
		});
	$("footer").css({'position':'absolute','top':'1050px','height':'100px'});
	$(".map_site").css({'display':'block','border-bottom':'solid 1px #F7F8F9'});
	$(".menu_language").css({'margin-top':'5px'});
	$(".logo").click(function(){
		//$(location).attr("href","panel.php");
		location.href="panel.php";
	});
	$(".btn_create_project").css({'display':'block'});
	$(".btn_edit_profile").click(function(){
		$(".profile_main").css({'display':'none'});
		$(".edit_profile").css({'display':'block'});
		$(".lists_search_project").css({'height':'705px'});
		$(".profile").css({'height':'810px'});
		$(".lists_recent_projects").css({'height':'750px'});
			//alert(profileHeight);
	});			
		$(".btn_account_basic").click(function(){
			$(".btn_account_basic").css({'background':'#00CC66','color':'#fff'});
			$(".icon0").hide();
			$(".icon1").show();
			$(".icon2").show();
			$(".icon3_white0").show();
			$(".icon3_white1").hide();
			$(".icon3_white2").hide();
			$(".btn_account_classic").css({'background':'#fff','color':'#FF6600'});
			$(".btn_account_premier").css({'background':'#fff','color':'#199ED8'});
		});
		$(".btn_account_classic").click(function(){
			$(".btn_account_classic").css({'background':'#FF6600','color':'#fff'});
			$(".icon1").hide();
			$(".icon0").show();
			$(".icon2").show();
			$(".icon3_white1").show();
			$(".icon3_white0").hide();
			$(".icon3_white2").hide();
			$(".btn_account_basic").css({'background':'#fff','color':'#00CC66'});
			$(".btn_account_premier").css({'background':'#fff','color':'#199ED8'});
		});
		$(".btn_account_premier").click(function(){
			$(".btn_account_premier").css({'background':'#199ED8','color':'#fff'});
			$(".icon2").hide();
			$(".icon0").show();
			$(".icon1").show();
			$(".icon3_white2").show();
			$(".icon3_white0").hide();
			$(".icon3_white1").hide();
			$(".btn_account_basic").css({'background':'#fff','color':'#00CC66'});
			$(".btn_account_classic").css({'background':'#fff','color':'#FF6600'});
		});
			
	$(".btn_modify_name").click(function(){
		$(".fix_name").hide();
		$(".btn_modify_name").hide();
		$(".modify_name").show();
	});	
	$(".btn_modify_password").click(function(){
		$(".fix_password").hide();
		$(".btn_modify_password").hide();
		$(".modify_password").show();
		$("br").show();
	});	
	$(".add_bank_account").click(function(){
		$(".bank_account_setup").show();
		$(".add_bank_account").hide();
	});
	
	$(".g_btn_card").hover(function(){
		$(".btn_card").css({'fill':'#00BA4A','cursor':'pointer','transition':'0.50s','-webkit-transition':'0.50s'});	
	},function(){
		$(".btn_card").css({'fill':'#000'});
	});
	$(".g_btn_card").click(function(){
		$(".payment_method_choice").hide();
		$(".card").show();
	});
	$(".g_btn_billet").hover(function(){
		$(".btn_billet").css({'fill':'#00BA4A','cursor':'pointer','transition':'0.50s','-webkit-transition':'0.50s'});	
	},function(){
		$(".btn_billet").css({'fill':'#000'});
	});
	
	$(".btn_hire_classic").click(function(){
		$(".purchase_upgrade").hide();
		$(".upgrade_classic").show();
		$(".upgrade_show_classic").show();
	});
	$(".btn_hire_premium").click(function(){
		$(".purchase_upgrade").hide();
		$(".upgrade_premium").show();
		$(".upgrade_show_premium").show();
	});
	
	
	
	
	
	
	//if(profileHeight <= 897 || createprojectsHeight <= 610){
			//$(".profile").css({'height': +610+'px'});	
			//
			//$("footer").css({'top': +footerHeight+'px'});
		//}else{
			//$(".profile").css({'height': +650+'px'});
			//$(".create_projects").css({'height': +700+'px'});
			//$("footer").css({'top': +1500+'px'});
		//}
	
});
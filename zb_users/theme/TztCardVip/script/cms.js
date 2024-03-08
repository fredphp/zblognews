/* 原创QQ：726662013，请勿删除 */

function tzt_dialog(id) {
	let $dialog = $("#"+id);
	$dialog.addClass('show');
	$('.mask').show();
}

function tzt_toast(msg,state,time) {
	let $toast = $("#Toast");
	if(state=='0'){
		$toast.find('.icon').addClass('icon-error');
	} else if(state=='1'){
		$toast.find('.icon').addClass('icon-yes');
	} else if(state=='2'){
		$toast.find('.icon').addClass('icon-reload loading');
	} else if(state=='3'){
		$toast.find('.icon').addClass('icon-warning');
	}
	$toast.fadeIn(100).find('.tips').html(msg);
	setTimeout(function () {
		$toast.fadeOut(100);
	}, time);
}

function tzt_night(){
	let $theme = $('body').attr('data-skin');
	if($theme=='dark'){
		$('body').attr('data-skin','white');
		zbp.cookie.set('night','white',365);
		$('.skin').removeClass('icon-sun').addClass('icon-moon');
	}else{
		$('body').attr('data-skin','dark');
		$('.skin').removeClass('icon-moon').addClass('icon-sun');
		zbp.cookie.set('night','dark',365);
	}
}

function tzt_cookie_del(id) {
	zbp.cookie.set(id,'',365);
	window.location.reload();
}

function comment_reply(id,name) {
	let $id = id;
	let $frm = $('#divCommentPost');
	let $val =  $("#txaArticle");
	$("#inpRevID").val($id);
	$("#DialogComment").addClass('show');
	$('#comment-box').before($frm);
	$("#cancel-reply,.mask").show();
	if(name){
		$val.focus().val("@"+name+"：");
	}
	$('#cancel-reply,.submit').click(function() {
	  $("#inpRevID").val(0);
	  $("#DialogComment").removeClass('show');
	  $('#comment-post').before($frm);
	  $('#cancel-reply,.mask').hide();
	  $("#cmt"+$id).css("background-color","#fef5e1");
	  $val.val("");
	});
}

function tzt_topup(){
	$("html, body").animate({
		scrollTop: 0
	}, 400);
	return true;
}

$(function(){

	$(".tzt-nav-menu li a,.tzt-tabbar-box li a").each(function() {
		if(this.href==document.location.toString().split("#")[0]){$(this).parent("li").addClass("active");return false;}
	});

	$('.headeropen').on('click', function() {
		let $dialog = $(this).parent();
		if($dialog.hasClass('show')){
			$dialog.addClass('hide').removeClass('show');
			$(this).find('.icon').addClass('icon-right').removeClass('icon-left');
			$(this).addClass('show');
			if($(window).width() <= '768'){
				$('.mask').hide();
			}
		}else if($dialog.hasClass('hide')){
			$dialog.addClass('show').removeClass('hide');
			$(this).find('.icon').addClass('icon-left').removeClass('icon-right');
			$(this).removeClass('show');
			if($(window).width() <= '768'){
				$('.mask').show();
			}
		}else{
			$dialog.addClass('hide').removeClass('show');
			$(this).find('.icon').addClass('icon-right').removeClass('icon-left');
			$(this).addClass('show');
			if($(window).width() <= '768'){
				$('.mask').show();
			}
		}
	});

	if($(window).width() <= '1200'){
		$('.tzt-header').addClass('hide').removeClass('show');
		$('.headeropen').addClass('show').find('.icon').addClass('icon-right').removeClass('icon-left');

	}

	$('.nav-tabs').each(function(){
		$(this).find('li').click(function() {
			var $id = $(this).find('a').attr('data-toggle');
			$(this).addClass('active').siblings().removeClass('active');
			$(this).parent().parent().parent().find('#'+$id).addClass('active').siblings().removeClass('active');
		});
	});

	$(".owl-carousel").each(function(){
		let $that = $(this);
		let $owldata = {"items":$that.attr('data-items'),"auto":$that.attr('data-auto')||false,"page":$that.attr('data-page')||false,"pagenum":$that.attr('data-pagenum')||false,"nav":$that.attr('data-nav')||false,"type":$that.attr('data-type')||false};
		if($owldata.nav){ $owldata.nav = true;}
		if($owldata.auto){ $owldata.auto = true;}
		if($owldata.page){ $owldata.page = true;}
		if($owldata.pagenum){ $owldata.pagenum = true;}
		$(this).owlCarousel({
			items: eval($owldata.items),
			navigation: $owldata.nav,
			autoHeight: true,
			autoPlay: $owldata.auto,
			pagination: $owldata.page,
			paginationNumbers: $owldata.pagenum,
			transitionStyle: $owldata.type,
		});
	});

	var $theme = zbp.cookie.get('night');
	if($theme){
		$('body').attr('data-skin',$theme);
		if($theme=='dark'){
			$('.skin').removeClass('icon-moon').addClass('icon-sun');
		}else{
			$('.skin').removeClass('icon-sun').addClass('icon-moon');
		}
	}

	var $webbg = zbp.cookie.get('webbg');
	if($webbg){
		$('.tzt-web_bg').css("background-image", $webbg);
	}

	$('.tzt-theme-bg').each(function(){
		$(this).on('click', function() {
			let $webbg = $(this).attr('data-id');
			zbp.cookie.set('webbg',$webbg,365);
			tzt_toast('操作成功','1',1000);
			$('.tzt-web_bg').css("background-image", $webbg);
			$('.tzt-dialog,.tzt-toast').removeClass('show');
			$('.mask').hide();
		});
	});
	$('.text-btn-on').on('click', function() {
		$(this).parent().hide();
		$(this).parent().parent().find('.cont-text').show();
	});
	$('.text-btn-off').on('click', function() {
		$(this).parent().hide();
		$(this).parent().parent().find('.cont-text_no').show();
	});

	$('.dialogclose,.mask').on('click', function() {
		$('.tzt-dialog,.tzt-toast').removeClass('show');
		$('.tzt-header').addClass('hide').removeClass('show');
		$('.headeropen').addClass('show').find('.icon').addClass('icon-right').removeClass('icon-left');
		$('.mask').hide();
	});

	$scrollTopLink = $("a.backtop");
	$(window).scroll(function() {
		500 < $(this).scrollTop() ? $scrollTopLink.css("display", "") : $scrollTopLink.css("display", "none");
	});
	$scrollTopLink.on("click", function() {
		$("html, body").animate({
			scrollTop: 0
		}, 400);
		return true;
	});
});


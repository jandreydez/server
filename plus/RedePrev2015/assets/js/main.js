$(function(){
	setTimeout(function(){
		var bHeight = $('.banner-top-content-in').height();
		$(window).scroll(function() {
			if($(window).scrollTop() >= bHeight){
				$('.side-menu.fixed').css('display','block');
			}
			else{
				$('.side-menu.fixed').css('display','none');
			}

		});
	},100);

	$('.pages-content div:first-child span').addClass('active');
	$('.pages-content div span').click(function(){
		$('.pages-content div span').removeClass('active');
		$(this).addClass('active');
		var id = $(this).attr('name');
		$('.pages-content div span[name='+id+']').addClass('active');
		$('.post-content-wrapper .box').removeClass('active1');
		$('.post-content-wrapper .box[name='+id+']').addClass('active1');
	});

	$('.post-content-wrapper .box:first-child').addClass('active1');











	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:0,
	    nav:true,
	    autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:false,
	    items:1
	});
	
	if ($(window).width() < 768) {
		$('.prev-post a,.next-post a,.prev-post-2,.next-post-2').html('');
	}

	$('#menu-toggle-wrapper-2').click(function(){
		$('#navigationmobile').show('fade');
	});
	$('.closemenumobile').click(function(){
		$('#navigationmobile').hide('fade');
	});

	$('.next-post a,.next-post-2').append('<div class="triangulonext"></div>');
	$('.prev-post a,.prev-post-2').append('<div class="trianguloprev"></div>');

	$(".fancybox").fancybox();
	
	var height = $(window).height();
	$('.errorpage').css('height',height);
	$('.patrocinio a').each(function() {
  		$(this).attr('target','_blank');
	});

	setTimeout(function(){
		$('.single').css('overflow','visible');
	},100);
	if ( $.browser.msie ) {
		$('.select').css('background-image','none');
		$('.select select').css('padding','4px 4px 4px 4px');
	}
	setTimeout(function(){
		$('.fadebg').hide('fade');
	},500);


	$('.singlepagelight a img').each(function() {
		//$(this).parent('a').attr('rel','lightbox');
		$(this).parent('a').addClass('fancybox');
	});

	$('#dash .banner-top-content').css('height',height);
	$('#dash .banner-top-content .banner-top-content-in img').css('height',height+'px !important');
	
	setTimeout(function(){
		
		var wTitlebanner = $('.title-banner div').css('width');
		var wDatebanner = $('.date-banner div').css('width');
		if(wTitlebanner >= wDatebanner){
			$('.banner-text-content').css('width',wTitlebanner);
		}
		else{
			$('.banner-text-content').css('width',wDatebanner);
		}
	},500);

	$('#menu-toggle-wrapper.outhome').click(function(){
		$('#side-bar').animate({width:270});
		$('#menu-toggle-wrapper.outhome').hide('fade');
		$('.logo').hide('fade');
		$('.logo2').show('fade');
		$('#navigation').show('fade');
		$('#navigation .oculto').show('fade');
		$('#side-footer .oculto').show('fade');
		$('#navigation li,#navigation li:first-child,#navigation li:last-child').css('border-color','#EBEBEB');
	});
	$('.side-content,.page-main,#side-inner,.banner-sideshadow').click(function(){
		$('#side-bar').animate({width:60});
		$('#menu-toggle-wrapper.outhome').show('fade');
		$('.logo.home').show('fade');
		$('.logo2').hide('fade');
		$('#side-bar.close #navigation').hide('fade');
		$('#side-bar.close #navigation .oculto').hide('fade');
		$('#side-footer .oculto').hide('fade');
		$('#navigation li,#navigation li:first-child,#navigation li:last-child').css('border-color','transparent');
	});

	$('.select select').change(function() {
	    var url;
    	$(".select select option:selected").each(function(){
      		url = $(this).attr('name');
    	});
		if(url != null){
    		window.location = url;
		}
	}).trigger( "change" );
});
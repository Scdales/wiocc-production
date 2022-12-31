$(document).ready(function() {


	var allPanels = $('.accordion > dd').hide();

	$('.accordion > dt > a').click(function() {
		$('.accordion > dt > a').removeClass('active');
		$(this).addClass('active');
		$this = $(this);
		$target =  $this.parent().next();

		if(!$target.hasClass('active')){
			allPanels.removeClass('active').slideUp();
			$target.addClass('active').slideDown();
		}

		return false;
	});

	$('.menu-trigger').click(function () {
		$('body').toggleClass('nav-open');
	});

	$('.menu-open-over').click(function () {
		$('body').removeClass('nav-open');
	});

	$('.close-modal').click(function () {
		$('.download-modal').fadeOut();
	});
	$("select").change(function () {
		var str = "";
		str = $(this).find("option:selected").text();
		$(this).parent().find(".out").text(str);
	});

	$("select").each(function(index, el){
		var str = "";
		str = $(this).find("option").first().text();
		$(this).parent().find(".out").text(str);
	});// Custom select ends

	$('.bxslider').bxSlider({
        adaptiveHeight: true,

	});

	$('.testimony-list').bxSlider({
		 mode:'horizontal',
         speed:1000,
        pause: 7000,
        preloadImages: 'visible',
		video:false,

	});


	$('.tab-menu li a').click(function() {
		var parentDIv = $(this).attr('rel');
		$('.tab-menu li a').removeClass('active');

		$(".excerpt").each(function(index, val) {
			/ iterate through array or object /
			if($(this).is(':visible')){
				$(this).hide();
			}
		});

		$("#"+parentDIv).show();
		$(this).addClass('active');
	});

	$(".tab-menu li a").first().trigger('click');

	$('.cd-search-trigger, .search-overlay').on('click', function(event){
		event.preventDefault();
		toggleSearch();
		$('.input-side input[type="text"]').focus();
	});

    $('ul.mobi-nav').find('.level-0').each(function(i, obj) {
		if($(obj).hasClass('has-dropdown')) {
			$(obj).find('a').first().click(function (e) {
			    e.preventDefault();
                if($(obj).hasClass('inner')==false) {
					$(obj).children('ul.sub-menu').each(function () {
						if ($(obj).children('ul.sub-menu').is(':visible')) {
							$(obj).children('ul.submenu').slideUp('slow');
							$(obj).children('ul.submenu').removeClass('open');
						}
					});

					if ($(obj).find('.sub-menu').is(':visible')) {
						$(obj).find('.sub-menu').slideUp('slow');
						$(obj).removeClass('open');
					} else {
						$(obj).children('.sub-menu').slideDown('slow');
						$(obj).addClass('open');
                        $(this).unbind('click').click();
					}
				}

			})
		}
    });
    $('ul.mobi-nav').find('.level-1').each(function(i, obj) {
        $(this).click(function (){
            $(this).addClass('open');
            $(this).children('ul.inner-sub-menu').each(function () {
                if($(this).children('ul.inner-sub-menu').is(':visible')){
                    $(this).children('ul.inner-submenu').slideUp('slow');
                    $(this).children('ul.inner-submenu').removeClass('open');
                }
            });

            if($(this).find('.inner-sub-menu').is(':visible')){
                $(this).find('.inner-sub-menu').slideUp('slow');
                $(this).removeClass('open');
            }else{
                $(this).children('.inner-sub-menu').slideDown('slow');
                $(this).addClass('open');
            }

        })
    });

    $('.download-sheet').click(function (e) {
    	e.preventDefault();
        $('.download-modal').show();
    });

    $('.close').click(function (){
        $('.download-modal').fadeOut();
        location.reload();
    });

    $('.single-network').find('.main-container').css('z-index','unset');
    $('.single-network').find('.navi-container').css('z-index','unset');

	$('.js-modal-trigger').click(function(e) {
		e.preventDefault();
		let target = $(this).attr('href');
		$(target).show();
	});

}); //Document.ready ends

function toggleSearch(type) {
	if(type=="close") {
		//close serach
		$('body').removeClass('search-open');
		$('.cd-search-trigger').removeClass('search-is-visible');
	} else {
		//toggle search visibility
		$('body').toggleClass('search-open');
		$('.cd-search-trigger').toggleClass('search-is-visible');
	}
}

$(window).on("load", function() {
    $('.story-image, .story-excerpt, .member-detail, .excerpt, .prevu_kit, .career-posting, .match-height, .colocation-listings li, .aside .single-news').matchHeight();
});

$(window).scroll(function () {
	if ($(document).scrollTop() > 90) {
		$(".header").addClass("header-fixed");
	} else {
		$(".header").removeClass("header-fixed").stop(true, false).removeAttr("style");
	}
});//window.scroll ends;





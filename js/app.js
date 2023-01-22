$('form#contact_form').validate({
	rules: {}, submitHandler: function (form) {
		$.ajax({
			url: $('form#contact_form').attr('action'),
			data: $('form#contact_form').serialize(),
			type: "POST",
			cache: false,
			error: function (err) {
				var response = JSON.parse(err.responseText);
				$('.notification').html(response.message).fadeIn();
			},
			success: function (data) {
				var response = JSON.parse(data);
				console.log(response.message);
				$('#contact_form').fadeOut();
			},
			complete: function () {
				$('.notification').fadeIn();

				$('form#contact_form').trigger("reset");
			}
		});
	}
});
var response_data ={};
$('form#download-form').validate({
    rules: {}, submitHandler: function (form) {
        $.ajax({
            url: $('form#download-form').attr('action'),
            data: $('form#download-form').serialize(),
            type: "POST",
            cache: false,
            error: function (err) {
            	//console.log(error)
                var response = JSON.parse(err.responseText);
                $('.notification').html(response.message).fadeIn();
            },
            success: function (data) {
            	console.log('data');
                var response = JSON.parse(data);
                console.log(response.message);
                response_data.link = response.fileLink;
            },
            complete: function (smh) {
                console.log('SMH:', smh);
                $('.notification').fadeIn();
                $('#form-div').empty();
                window.location = response_data.link;
            }
        });
    }
});
/*

(function($) {

	var allPanels = $('.accordion > dd').hide();

	$('.accordion > dt > a').click(function() {
		allPanels.slideUp();
		$(this).parent().next().slideDown();
		return false;
	});

})(jQuery);
*/
$('.faq-header li a').click(function() {
	var parentDIv = $(this).attr('rel');
	$('.faq-header li a').removeClass('active');

	$(".accordion").each(function(index, val) {
		/ iterate through array or object /
		if($(this).is(':visible')){
			$(this).hide();
		}
	});

	$("#"+parentDIv).show();
	$(this).addClass('active');
});

$(".faq-header li a").first().trigger('click');

window.onresize = function(event)
{

}


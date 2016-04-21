var jQuery_1_8_2 = $.noConflict();
(function ($, undefined) {
	$(function () {
		var form = $('#login-form');
			
		if (form.length > 0) {
			form.validate({
				errorPlacement: function (error, element) {
					error.insertAfter(element.parent());
				},
				onkeyup: false,
				errorClass: "err",
				wrapper: "em"
			});
		}
		
		var groups = $('.group', form).filter(function(){
			return !$(this).hasClass('submit');
		}).click(function(){
			$(groups).removeClass('active');
			$(this).addClass('active');
		});
		$('#name').trigger('click').trigger('focus');
		
	});
})(jQuery_1_8_2);


$(document).ready(function() {

		var id = '#dialog';

//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();

//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
		$('#mask').fadeIn(500);
		$('#mask').fadeTo("slow",0.9);

//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();

//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);

//transition effect
		$(id).fadeIn(2000);

//if close button is clicked
		$('.window .close').click(function (e) {
//Cancel the link behavior
			e.preventDefault();

			$('#mask').hide();
			$('.window').hide();
		});

//if mask is clicked
		$('#mask').click(function () {
			$(this).hide();
			$('.window').hide();
		});

	});

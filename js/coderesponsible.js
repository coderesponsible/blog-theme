(function($) {
  'use strict';

  var mobileBreak = '480';
  var inbetween = '600';
  var tabletBreak = '880';

  $(window).bind('resize', checkWindowSize);
	function checkWindowSize(e) {
		console.log('resize');
		var windowWidth = $(window).width();
		if(windowWidth >= inbetween){
			$('#main-nav').show();
			$('#searchform').show();
		}
		if(windowWidth < inbetween){
			$('#main-nav').hide();
			$('#searchform').hide();
		}
	}
	checkWindowSize();
	
	/* ===================== Form Validation Start ===================== */
	var RegEx = {
		name: /^[A-Za-z ,'-]{1,25}$/,
		email: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
		postalcode: /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z][ -.]*[0-9][A-Z][0-9]$/i,
		message: /./
	};
	
	var errorMsg = {
		name: 'Name',
		email: 'Valid Email Required'
	};
	
	//validate email address
	$(function() {
		$('.email-submit').on('click', function(e){	
			var field = $('#email-address').attr('name');
			if (RegEx[field] !== undefined ) {
				if(!RegEx[field].test($('#email-address').val()) || $('#email-address').val() === ''){
					$(this).siblings('span.error-message').html(errorMsg[field]);
					e.preventDefault();
				}else{
					$('#email-address').siblings('span.error-message').fadeOut();
					$('#email-address').siblings('span.error-message').html('');
					var emailAddress = 'email=' + $('#email-address').val();
					//submit email address
					$.ajax({
						type: 'POST',
						url: 'http://coderesponsible.com/dev/wp-content/themes/cr-2012/email-submit.php',
						data: emailAddress,
						cache: false,

						success: function(){
							$('#email-address').val('');
						}
					});
					return false;
				}
			}

		});
	});
	
	$('#email-address').on('blur', function(e){	
		var field = $('#email-address').attr("name");
		if (RegEx[field] !== undefined ) {
			if(!RegEx[field].test($('#email-address').val()) || $('#email-address').val() === ''){
				$(this).siblings('span.error-message').html(errorMsg[field]);
				e.preventDefault();
			}else{
				$('#email-address').siblings('span.error-message').fadeOut();
				$('#email-address').siblings('span.error-message').html('');
			}
		}
	});
	
	// modal windows
	$('a[name=modal]').on('click' , function(e) {
		
		var id = $(this).attr('href');
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    $('#mask').show();   
    var winH = $(window).height();
    var winW = $(window).width();
		$(id).css('top', ( $(window).height() - $(id).height() ) / 2+$(window).scrollTop() + 'px');
		$(id).css('left', ( $(window).width() - $(id).width() ) / 2+$(window).scrollLeft() + 'px');
    $(id).fadeIn();
		e.preventDefault();
		return false;
		
	});
	
	//if close button is clicked
  $('.window .close').on('click', function (e) {
    //Cancel the link behavior
    e.preventDefault();
    $('#mask, .window').hide();
  });

	//if mask is clicked
	$('#mask').on("click", function (e) {
    //Cancel the link behavior
    e.preventDefault();
    $('#mask, .window').hide();
  });

  // Add class for skip link
  $('section h2 a:first').addClass('article-title');

	//skip link
	$('.main-content-link').on('click', function(){
		$('a.article-title').focus();
		$('a.article-title').attr('tabindex',0);
		return false;
	});
	
	// slideout
	$('a[name=slideout]').on('click', function(e) {
		var id = $(this).attr('href');
    $(id).slideDown();
		
		e.preventDefault();
		return false;
	});
	
	//if close button is clicked
  $('.slideout .close').on('click', function (e) {
		$(this).parent().slideUp();
		
		e.preventDefault();
		return false;
  });
	
	// Mobile/Tablet navigation menu
	$('#menu-link').on('click', function(){
		if($('#main-nav').is(':visible')){
			$('#main-nav').slideUp();
		}else{
			$('#main-nav').slideDown();
		}
	});

	// Mobile/Tablet navigation search
	$('#search-link').on('click', function(){
		if($('#searchform').is(':visible')){
			$('#searchform').slideUp();
		}else{
			$('#searchform').slideDown();
		}
	});

	//Event Tracking

	// Buttons in content
	$('.content a.button').on('click', function(){
		var dataAction = $(this).html();
		var dataLabel = $(this).attr('href');
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});

	// Social Media
	//sidebar
	$('#sidebar .rss').on('click', function(){
		var dataAction = 'Social Sidebar';
		var dataLabel = 'RSS';
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});
	$('#sidebar .twitter').on('click', function(){
		var dataAction = 'Social Sidebar';
		var dataLabel = 'Twitter';
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});
	$('#sidebar .facebook').on('click', function(){
		var dataAction = 'Social Sidebar';
		var dataLabel = 'Facebook';
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});
	//footer
	$('#footer .rss').on('click', function(){
		var dataAction = 'Social Sidebar';
		var dataLabel = 'RSS';
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});
	$('#footer .twitter').on('click', function(){
		var dataAction = 'Social Sidebar';
		var dataLabel = 'Twitter';
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});
	$('#footer .facebook').on("click", function(){
		var dataAction = 'Social Sidebar';
		var dataLabel = 'Facebook';
		_gaq.push(['_trackEvent', 'Click Event', dataAction, dataLabel]);
	});
}(jQuery));


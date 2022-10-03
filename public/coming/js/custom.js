$(function() {
	window.scrollReveal = new scrollReveal();
	"use strict";
	
	// PreLoader
	$(window).load(function() {
		$(".loader").fadeOut(400);
	});

	// Backstretchs
	// $("#header").backstretch("coming/images/1199967846278282.XQOu3L51Gv9WYeNf9QFP_height640.png");
	// $("#services").backstretch("coming/images/1199967846278282.XQOu3L51Gv9WYeNf9QFP_height640.png");
	$("#contact").backstretch("coming/images/1.jpg");
	
	// Countdown
	$('.countdown').downCount({
		date: '12/12/2014 12:00:00',
		offset: +10
	});			
    
});
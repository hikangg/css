/* main.js */
var ratings = {};
var rdata;
$(document).ready(function(){
	$('#client-slides').slidesjs({
		width: 304,
		height: 197,
		navigation: {
			active: false
		},
		pagination: {
			active: false
		},
		play: {
			active: false,
			effect: 'fade',
			interval: 5000,
			auto: true
		},
		effect: {
			fade: {
				speed: 500
			}
		}
	});
	
	$('#top-slides').slidesjs({
		width: 775,
		height: 220,
		navigation: {
			active: false
		},
		pagination: {
			active: false
		},
		play: {
			active: false,
			effect: 'fade',
			interval: 5000,
			auto: true
		},
		effect: {
			fade: {
				speed: 500
			}
		}
	});
	
	$('.side-form').validate({
			rules: {
				'client-name': "required",
				'client-phone': "required",
				'client-name': "required",
				'client-deadline': "required",
				'client-email': {
					required: true,
					email: true
				}
			}
	});
	
	$('#client-deadline').datepicker({
	      showOn: 'both',
	      buttonImage: '../img/calendar.gif',
	      buttonImageOnly: true
	});
	
	$.getJSON('ratings/rating.php', function(data) {
		rdata = data;
		// render ratings
		renderRatings();
		
	});
	
	
//	function doStuff(event, yourchoice)
//	{
//		alert('You chose ' + yourchoice);
//		v.lock();
//	}
	
});


function renderRatings() {
	$('#bg .rating').each(function(){
		var key = $(this).attr('id');
		// check
		var min = (key in rdata)?Math.ceil(rdata[key]['score']/rdata[key]['votes']):1;
		var vc = (key in rdata)?rdata[key]['votes']:0;
//		console.log(rdata[key]['votes']);
		if(key in ratings) {
			ratings[key].reset();
		} else {
			var v = new jVote(key, {max:5,min:min,click:doStuff,labels:[1,2,3,4,5]});
			ratings[key] = v;
		}
		// update votes count
		$('.votes span', $(this).parent()).text(vc);
		// show rating
		$(this).parent().show();
	});
}

function doStuff(event, rate) {
	// get .rating
	var p = $(event.target).closest('.rating');
	var rating_id = $(p).attr('id');
	
	$.post('ratings/rating.php', {id:rating_id, score: rate}, function(data) {
		rdata = jQuery.parseJSON(data);
		//
		renderRatings();
	});
	
	// lock
	ratings[rating_id].lock();
}

/* end */
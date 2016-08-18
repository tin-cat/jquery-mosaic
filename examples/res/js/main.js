function showSource(url) {
	$('#source').html('<div class="background"></div><div class="button close">close</div><iframe src="' + url + '?view_source" frameborder=0 border=0></iframe>');
	$('body').css('overflow', 'hidden');
	$('#source').show();
	$('#source > .background').on('click', function() { closeSource(); });
	$('#source > .button.close').on('click', function() { closeSource(); });
	$(document).keyup(function(e){
		if(e.keyCode === 27)
			closeSource();
	});
}

function closeSource() {
	$(document).unbind('keyup');
	$('#source').html('');
	$('#source').hide();
	$('body').css('overflow', 'auto');
}
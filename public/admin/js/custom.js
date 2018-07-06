$(document).ready(function(){
	$('body, html').on('click', '.dropdown', function(e){
		$(this).addClass('open')
		$(this).find('.dropdown-toggle').attr('aria-expanded', true)
	})

	$('body, html').on('click', '.checkall', function(e){
		var table = $(e.target).closest('table');
		$('td input:checkbox',table).prop('checked',this.checked);
	})
});
$(document).ready(function(){
	$('ul.tabs li a:first').addClass('Tabactive');
	$('.secciones article').hide();
	$('.secciones article:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('Tabactive');
		$(this).addClass('Tabactive');
		$('.secciones article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});
});
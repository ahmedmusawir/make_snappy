jQuery(document).ready(function($) {

	// alert('whats up');
	// console.log('whats up');
	// $('#home').on('click', function () {
		// $('ul.navbar-nav li').css('border', '1px solid red');
		// alert('whats up');
	// });
		// $('.logout').on('click', function (event) {
			// event.preventDefault();
			// $('body').load('/laravel/makesnappy/public/users/logout');
			// window.location.reload(true);
		// });


	$('ul.navbar-nav li').on('click', function (event) {

		event.preventDefault();
		$('li.active').removeClass('active');
		$(this).addClass('active');

		var link = $(this).find('a').attr('href');
		// var laravel_link = link.substr(23);
		var logout = link.indexOf("logout");

		// console.log(logout);

		if(logout < 0){
			// $('#content').load( laravel_link + ' #content');
			$('#content').load( link + ' #content');
		} else {
			// $('body').load( laravel_link );
			$('body').load( link );
		}

	});

});
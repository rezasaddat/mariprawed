$(document).ready(function(){

	var last_p = getCookie("page");

	if (last_p == "" || last_p == null){
		page = 'application/views/Front/landing_page.php';
	}else{
		page = getCookie("page");
	}

	$('#content').fadeOut(1000, function(){
		$(this).scrollTop(0);
		$('#content').load(''+page+'').fadeIn('slow');
		$('#footcopy').fadeIn('slow');
	});
});

$('#search').on('change', function(){
	var page = "application/views/Front/ahp_result.php";
	$('#content').fadeOut(100, function(){
		$(this).scrollTop(0);
		$('#content').load(page).fadeIn('slow');
	});
	return false;
});

$('.home').click(function(){
	setCookie('page', "application/views/Front/landing_page.php",365);
	window.location.reload();
	return false;
});

$('.navmenu').click(function(){
	var id_tempat = $(this).attr('data');
	console.log(id_tempat);
	// setCookie("page", page, 365);
	// $('#content').fadeOut(100, function(){
	// 	$(this).scrollTop(0);
	// 	$('#content').load(page).fadeIn('slow');
	// });
	return false;
});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

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
	});

	price();
});

function price() {

	$('#to').on('change', function(){
		from =$('#from').val();
		to = $('#to').val();

		setCookie('from', from, 1);
		setCookie('to', to, 1);

		$(this).scrollTop(0);
  		$('#content').load("application/views/Front/ahp_result.php").fadeIn('slow');
	});	


}

function checkall() {
  // Get the checkbox
  var checkBox = document.getElementById("all");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
  	setCookie('searchall', 'all', 1);
    $(this).scrollTop(0);
  	$('#content').load("application/views/Front/ahp_result.php").fadeIn('slow');
  } else {
    setCookie('searchall', 'null', 1);
    $(this).scrollTop(0);
  	$('#content').load("application/views/Front/ahp_result.php").fadeIn('slow');
  }
}

function checktema() {
	var yourArray = [];
	$("input:checkbox[name=tema]:checked").each(function(){
	    yourArray.push($(this).val());
	});

	if (yourArray != '') {
		setCookie('tema', yourArray, 1);
	}else{
		setCookie('tema', null, 1);
	}
	$('#content').load("application/views/Front/ahp_result.php").fadeIn('slow');
}

function checkdomisili() {
	var yourArray = [];
	$("input:checkbox[name=domisili]:checked").each(function(){
	    yourArray.push($(this).val());
	});

	if (yourArray != '') {
		setCookie('domisili', yourArray, 1);
	}else{
		setCookie('domisili', null, 1);
	}
	$('#content').load("application/views/Front/ahp_result.php").fadeIn('slow');
}

$('.home').click(function(){
	setCookie('page', "application/views/Front/landing_page.php",365);
	window.location.reload();
	return false;
});

$('.navmenu').click(function(){
	var id_tempat = $(this).attr('data');
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

function convertToRupiah(angka){
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
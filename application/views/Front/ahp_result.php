<div id="tempat" class="uk-grid-small uk-child-width-1-4@s uk-flex-left uk-text-left" uk-grid style="margin-top: 15px;">
    
    
</div>

<script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  var getall = getCookie('searchall');
  var from = getCookie('from');
  var to = getCookie('to');
  var getatema = getCookie('tema');
  var getadomisili = getCookie('domisili');

$(document).ready(function(){
  tempat();

  UIkit.notification({message: 'Loading...'});
  setTimeout(function(){
    load_page();
  }, 1500);

});

function tempat(){
  var url = window.location.href;
  $.ajax({
          url: url + "Front_end/tempat/"+getall+"/"+getadomisili+"/"+getatema+"/"+from+"/"+to,
          type: "GET",
          dataType:'json',
          // processData: false,
          // contentType: false,
          // cache:false,
      }).done(function (data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          if (data[i]['id']!= null) {

            $('#tempat').append('<div class="uk-card navmenu" data="'+data[i]['id']+'" style="cursor:pointer;">'+
                '<img src="upload/prawed/'+data[i]['gambar']+'">'+
                '<div class="uk-card" style="height:40px;background-color:#f3f3f3;color:#5a5a5a;font-size:12px;padding:10px">'+data[i]['nama_tempat']+'</div>'+
            '</div>');
          }
        }
    });
}

function load_page(){
  $('.navmenu').click(function(){
    var id_tempat = $(this).attr('data');
    // setCookie("page", page, 365);
    // $('#content').fadeOut(100, function(){
    //  $(this).scrollTop(0);
    //  $('#content').load(page).fadeIn('slow');
    // });
    return false;
  });
}
</script>


<div class="uk-text" uk-grid style="padding-left: 40px; padding-top: 40px;">
    <div class="uk-width-1-4@m" style="padding: 10px; ">
        <div class="uk-card ">
            <p id="descript"></p><hr>
        </div>
    </div>
    <div class="uk-width-expand@m" style="padding-right: 0; padding-left: 0;">
        <div class="uk-light">
            <div class="uk-position-relative uk-visible-toggle uk-light forwidth" uk-slideshow="animation: push; autoplay: false" style="width: 98%;">
                <ul class="uk-slideshow-items height-detail" id="morepict">
                    <li style="cursor: pointer;" id="utama" title="slide me for more picture">
                        
                    </li>

                    
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
        </div>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    var id_tempat = getCookie('id_tempat');

$(document).ready(function(){
  UIkit.notification({message: 'Loading...'});
  view_detail();

  setTimeout(function(){
    // load_page();
  }, 1500);

});

function view_detail(){
  var url = window.location.href;
  $.ajax({
          url: url + "Front_end/detail_tempat/"+id_tempat,
          type: "GET",
          dataType:'json',
      }).done(function (data) {
        console.log(data);
        rating = data[0]['rating'];
        rate = rating.replace('0','');
        $('#descript').append('<h3 style="margin-bottom: 0; margin-top: 0;"> '+data[0]['nama_tempat']+'('+data[0]['nama_tema']+')</h3>'+
                '<br><b><h4>'+convertToRupiah(data[0]['harga'])+'</h4></b>'+
                '<br><b> Rating : '+rate+'</b>'+
                '<br>'+data[0]['alamat']+', '+data[0]['nama_domisili']+'<br><br>'+

                'Contacts : '+data[0]['kontak']+'<br> More information : <br>'+data[0]['keterangan']);

        $('#utama').append('<img src="upload/prawed/'+data[0]['gdefault']+'" alt="" uk-cover>');

        for (var i = 0; i < data.length; i++) {
          if (data[i]['gambar']!= null) {

            $('#morepict').append('<li style="cursor: pointer;">'+
                            '<img src="upload/prawed/'+data[i]['gambar']+'" alt="" uk-cover>'+
                        '</li>');
          }
        }
    });
}
</script>
<h4>Find Alternative by AHP</h4>
<div class="uk-margin">
<label class="uk-form-label" for="id_dom">Domicile</label>
<div class="uk-form-controls">
  <select class="uk-select" name="id_dom" id="id_dom">
        <option disabled="" selected="" value="null">Choose domicile</option>
      <?php foreach ($domicile as $dom): ?>
        <option value="<?php echo $dom->id;?>"><?php echo $dom->nama_domisili;?></option>
      <?php endforeach ?>
  </select>
</div>
</div>

<div class="uk-margin">
<label class="uk-form-label" for="id_theme">Theme</label>
<div class="uk-form-controls">
  <select class="uk-select" name="id_theme" id="id_theme">
      <option disabled="" selected="" value="null">Choose theme</option>
      <?php foreach ($theme as $t): ?>
        <option value="<?php echo $t->id;?>"><?php echo $t->nama_tema;?></option>
      <?php endforeach ?>
  </select>
</div>
</div>
<button class="uk-button uk-button-primary uk-modal-close" type="button" onclick="Search_prawed()">Search</button>
<br><br>
<div id="result_search" style="display: none;">
    <h4>Result by AHP </h4>
    <div id="tempat" class="uk-grid-small uk-child-width-1-4@s uk-flex-left uk-text-left" uk-grid style="margin-top: 15px;">
    
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
function Search_prawed(){

  var domicile = $('#id_dom').val();
  var theme = $('#id_theme').val();

    $.ajax({
        url: "<?php echo base_url()?>" + "Alternatif/search_alternatif/"+domicile+"/"+theme,
        type: "POST",
        dataType:'json',
        processData: false,
        contentType: false,
        cache:false,
    }).done(function (data) {
      console.log(data);
        if (data.length > 0 ) {

            UIkit.notification({message: 'Data found.'});
            document.getElementById('result_search').style.display = "block";
            $('#tempat').replaceWith(' <div id="tempat" class="uk-grid-small uk-child-width-1-4@s uk-flex-left uk-text-left" uk-grid style="margin-top: 15px;"></div>');

            for (var i = 0; i < data.length; i++) {
              if (data[i]['id']!= null) {
                var rating = data[i]['rating'];
                var rate = rating.replace('0','');

                $('#tempat').append('<div class="uk-card navmenu" data="'+data[i]['id']+'" style="cursor:pointer;">'+
                    '<img src="upload/prawed/'+data[i]['gambar']+'">'+
                    '<div class="uk-card" style="height:40px;background-color:#f3f3f3;color:#5a5a5a;font-size:12px;padding:10px">'+data[i]['nama_tempat']+'<br> Rating : '+rate+'</div>'+
                '</div>');
              }
            }

        }else{
            UIkit.notification({message: 'Data not found.'});
        }
    });
    return false;
  
}
</script>
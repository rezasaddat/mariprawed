<h2 class="uk-modal-title">New Place Prawed</h2>
<?php echo form_open_multipart(site_url("Place_prawed/edit_exe/".$prawed->id), array("class" => "formValidate")) ?>
  <fieldset class="uk-fieldset">
      <div class="uk-margin">
          <label class="uk-form-label" for="place_name">Place name</label>
          <input class="uk-input" type="text" placeholder="Place Name" name="place_name" id="place_name" value="<?php echo $prawed->nama_tempat;?>">
      </div>

      <div class="uk-margin">
          <label class="uk-form-label" for="place_address">Place address</label>
          <div class="uk-form-controls">
            <input class="uk-input" type="text" placeholder="Place Address" name="place_address" id="place_address" value="<?php echo $prawed->alamat;?>">
          </div>
      </div>

      <div class="uk-margin">
          <label class="uk-form-label" for="place_contact">Contacts</label>
          <div class="uk-form-controls">
            <input class="uk-input" type="number" placeholder="Place Contacts" name="place_contact" id="place_contact" value="<?php echo $prawed->kontak;?>">
          </div>
      </div>

      <div class="uk-margin">
        <label class="uk-form-label" for="id_dom">Domicile</label>
        <div class="uk-form-controls">
          <select class="uk-select" name="id_dom" id="id_dom">
                <option disabled="" selected="">Choose domicile</option>
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
              <option disabled="" selected="">Choose theme</option>
              <?php foreach ($theme as $t): ?>
                <option value="<?php echo $t->id;?>"><?php echo $t->nama_tema;?></option>
              <?php endforeach ?>
          </select>
        </div>
      </div>

      <div class="uk-margin">
        <label class="uk-form-label" for="place_price">Price</label>
        <div class="uk-form-controls">
          <input class="uk-input money" type="text" placeholder="Place Price" name="place_price" id="place_price" value="<?php echo $prawed->harga;?>">
        </div>
      </div>

      <div class="uk-margin" uk-margin>
          <label class="uk-form-label" for="gambar">Picture</label>
          <div uk-form-custom="target: true">
              <input type="file" name="gambar" id="gambar" >
              <input class="uk-input uk-form-width-large" type="text" placeholder="<?php echo $prawed->gambar;?>">
          </div>
      </div>

      <div class="uk-margin">
        <label class="uk-form-label" for="place_info">Information</label>
        <div class="uk-form-controls">
          <textarea class="uk-input" name="place_info" id="place_info"><?php echo $prawed->keterangan;?></textarea>
        </div>
      </div>

  </fieldset>
    <a href="<?php echo base_url('Place_prawed');?>" class="uk-button uk-button-default uk-modal-close" type="button">Back</a>
    <button class="uk-button uk-button-primary uk-modal-close" type="submit">Submit</button>
<?php echo form_close() ?>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.money').mask("#,##0", {reverse: true});

    $("select[name=id_dom]").val('<?php echo $prawed->id_domisili?>').attr("selected");
    $("select[name=id_theme]").val('<?php echo $prawed->id_tema?>').attr("selected");
});
</script>
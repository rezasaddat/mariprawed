<div class="card-panel">
  <?php echo form_open_multipart(site_url("Domisili/edit_exe/".$domicile->id), array("class" => "formValidate")) ?>
      <h4 class="header ">Data Domicile</h4>
      <fieldset class="uk-fieldset">
          <div class="uk-margin">
            <label class="uk-form-label">Domicile name</label>
            <div class="uk-form-controls">
              <input class="uk-input" id="name_domicile" name="name_domicile" type="text" required value="<?php echo $domicile->nama_domisili;?>">
            </div>
          </div>

          <div class="uk-margin">
            <a class="uk-button uk-button-default" href="<?php echo base_url('Domisili');?>">Back</a>

            <button class="uk-button uk-button-default">Submit</button>
        </div>
      </fieldset>
  <?php echo form_close() ?>
</div>

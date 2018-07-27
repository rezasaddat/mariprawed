<div class="card-panel">
  <?php echo form_open_multipart(site_url("Theme_prawed/edit_exe/".$t_prawed->id), array("class" => "formValidate")) ?>
      <h4 class="header ">Data Theme prawed</h4>
      <fieldset class="uk-fieldset">
          <div class="uk-margin">
            <label class="uk-form-label">Theme prawed name</label>
            <div class="uk-form-controls">
              <input class="uk-input" id="nama_tema" name="nama_tema" type="text" required value="<?php echo $t_prawed->nama_tema;?>">
            </div>
          </div>

          <div class="uk-margin">
            <a class="uk-button uk-button-default" href="<?php echo base_url('Theme_prawed');?>">Back</a>

            <button class="uk-button uk-button-default">Submit</button>
        </div>
      </fieldset>
  <?php echo form_close() ?>
</div>

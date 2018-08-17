<div class="card-panel">
  <?php echo form_open_multipart(site_url("Kriteria/edit_exe/".$kriteria->id), array("class" => "formValidate")) ?>
      <h4 class="header ">Data kriteria</h4>
      <fieldset class="uk-fieldset">
          <div class="uk-margin">
            <label class="uk-form-label">Nama Kriteria</label>
            <div class="uk-form-controls">
              <input class="uk-input" id="nama_kriteria" name="nama_kriteria" type="text" required value="<?php echo $kriteria->nama_kriteria;?>">
            </div>
          </div>

          <div class="uk-margin">
            <a class="uk-button uk-button-default" href="<?php echo base_url('Kriteria');?>">Back</a>

            <button class="uk-button uk-button-default">Submit</button>
        </div>
      </fieldset>
  <?php echo form_close() ?>
</div>

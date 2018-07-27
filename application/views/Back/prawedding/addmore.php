<div class="uk-text-left" uk-grid>
    
    <div class="uk-width-expand">
          
        <?php echo form_open_multipart(site_url("Place_prawed/add_morepict/".$domicile->id), array("class" => "formValidate")) ?>
        <div class="uk-overflow-auto" id="data-picture">
          <div class="uk-margin" uk-margin>
              <label class="uk-form-label" for="gambar">Picture</label>
              <div uk-form-custom="target: true">
                  <input type="file" name="gambar[]" id="gambar" >
                  <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file">
              </div>
          </div>

        </div>

        <div class="uk-margin">
            <a href="<?php echo base_url('Place_prawed')?>" class="uk-button uk-button-default uk-modal-close" type="button">Back</a>
            <button class="uk-button uk-button-primary uk-modal-close" type="submit">Submit</button>
        </div>
        <?php echo form_close() ?>
    </div>

    <div class="uk-width-auto">
        <div class="uk-form-stacked">

          <ul class="uk-iconnav uk-iconnav-vertical" style="position: fixed; width: fit-content; margin-left: -45px;">
              <li>
                <a target="_blank" style="text-decoration: none;">
                  <span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span>
                  <span class="" id="addMore">Add</span>
                </a>
              </li>
          </ul>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $("#addMore").click(function(e) {
    e.preventDefault();
    $("#data-picture").append('<div class="uk-margin" uk-margin>'+
              '<label class="uk-form-label" for="gambar">Picture</label>'+
              '<div uk-form-custom="target: true">'+
                  '<input type="file" name="gambar[]" id="gambar" >'+
                  '<input class="uk-input uk-form-width-medium" type="text" placeholder="Select file">'+
              '</div>'+
          '</div>');
  });

});
</script>
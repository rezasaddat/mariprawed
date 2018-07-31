<div class="card-panel">
  <?php echo form_open_multipart(site_url("Account/edit_exe/".$account->id), array("class" => "formValidate")) ?>
      <h4 class="header ">Data Domicile</h4>
      <fieldset class="uk-fieldset">
          <div class="uk-margin">
              <input class="uk-input" type="text" placeholder="Username" name="Username" id="username" value="<?php echo $account->username;?>">
          </div>

          <div class="uk-margin">
              <input class="uk-input" type="password" placeholder="Name Domicile" name="password" id="password" value="<?php echo $account->password;?>">
          </div>

          <div class="uk-margin">
            <label class="uk-form-label" for="role">Role</label>
            <div class="uk-form-controls">
              <select class="uk-select" name="role" id="role">
                    <option disabled="" selected="">Choose Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Uknown</option>
              </select>
            </div>
          </div>

          <div class="uk-margin">
            <a class="uk-button uk-button-default" href="<?php echo base_url('Account');?>">Back</a>

            <button class="uk-button uk-button-default">Submit</button>
        </div>
      </fieldset>
  <?php echo form_close() ?>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

    $("select[name=role]").val('<?php echo $account->role?>').attr("selected");
});
</script>
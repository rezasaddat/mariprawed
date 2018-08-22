

<div class="uk-text-left" uk-grid>
    
    <div class="uk-width-expand">
          
            <div class="uk-overflow-auto">

            <table id="data-prawed" class="uk-table uk-table-divider uk-table-striped" cellspacing="0">
              <thead>
                  <tr>
                      <th style="width: 20%;">Picture</th>
                      <th>Place Name</th>
                      <th>Harga</th>
                      <th>Domisili</th>
                      <th>Theme</th>
                      <th>Rating</th>
                      <th></th>
                  </tr>
              </thead>

              <tbody>

              </tbody>

            </table>
          </div>
    </div>

    <div class="uk-width-auto">
        <div class="uk-form-stacked">

          <ul class="uk-iconnav uk-iconnav-vertical" style="position: fixed; width: fit-content; margin-left: -45px;">
              <li>
                <a target="_blank" style="text-decoration: none;">
                  <span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span>
                  <span class="" uk-toggle="target: #modal-example">Add</span>
                </a>
              </li>
          </ul>
        </div>
    </div>
</div>

<!-- This is the modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">New Place Prawed</h2>
        <form>
          <fieldset class="uk-fieldset">
              <div class="uk-margin">
                  <label class="uk-form-label" for="place_name">Place name</label>
                  <input class="uk-input" type="text" placeholder="Place Name" name="place_name" id="place_name">
              </div>

              <div class="uk-margin">
                  <label class="uk-form-label" for="place_address">Place address</label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" placeholder="Place Address" name="place_address" id="place_address">
                  </div>
              </div>

              <div class="uk-margin">
                  <label class="uk-form-label" for="place_contact">Contacts</label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="number" placeholder="Place Contacts" name="place_contact" id="place_contact">
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
                  <input class="uk-input money" type="text" placeholder="Place Price" name="place_price" id="place_price">
                </div>
              </div>

              <div class="uk-margin">
                <label class="uk-form-label" for="place_rating">Rating 1 - 5</label>
                <div class="uk-form-controls">
                  <input class="uk-input" type="number" placeholder="Place Rating" name="place_rating" id="place_rating">
                </div>
              </div>

              <div class="uk-margin" uk-margin>
                  <label class="uk-form-label" for="gambar">Picture</label>
                  <div uk-form-custom="target: true">
                      <input type="file" name="gambar" id="gambar" >
                      <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file">
                  </div>
              </div>

              <div class="uk-margin">
                <label class="uk-form-label" for="place_info">Information</label>
                <div class="uk-form-controls">
                  <textarea class="uk-input money" type="text" name="place_info" id="place_info"></textarea>
                </div>
              </div>

          </fieldset>
        </form>
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary uk-modal-close" type="button" onclick="add_place()">Submit</button>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.money').mask("#,##0", {reverse: true});

    table = $('#data-prawed').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "pageLength" : 5,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Place_prawed/prawed_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //first column / numbering column
            "orderable": true, //set not orderable
        },
        ],

    });
} );

function add_place(){
      var datasend = new FormData();

      datasend.append('place_name', $("#place_name").val());
      datasend.append('place_address', $("#place_address").val());
      datasend.append('place_contact', $("#place_contact").val());
      datasend.append('place_price', $("#place_price").val());
      datasend.append('place_rating', $("#place_rating").val());
      datasend.append('id_dom', $("#id_dom").val());
      datasend.append('id_theme', $("#id_theme").val());
      datasend.append('gambar', $("#gambar")[0].files[0]);
      datasend.append('place_info', $("#place_info").val());

      if ($("#place_name").val() != "" && $("#place_contact").val() != "" && $("#place_address").val() != "" && $("#place_price").val() != "") {
        $.ajax({
            url: "<?php echo base_url()?>" + "Place_prawed/add_",
            type: "POST",
            data: datasend,
            processData: false,
            contentType: false,
            cache:false,
        }).done(function (data) {
          console.log(data);
          $('#data-prawed').DataTable().ajax.reload();

          $("#place_name").val("");
          $("#place_price").val("");
          $("#place_contact").val("");
          $("#place_address").val("");
          $("#gambar").val("");
          $("#place_info").val("");

          UIkit.notification({message: 'Data has been add.'});
        });
        return false;
      }else{
        UIkit.notification({message: 'Canceled! You must completed insert data.'});
      }
      
  }
</script>
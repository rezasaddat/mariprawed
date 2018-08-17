

<div class="uk-text-left" uk-grid>
    
    <div class="uk-width-3-4">
          
            <div class="uk-overflow-auto">

            <table id="data-kriteria" class="uk-table uk-table-divider uk-table-striped" cellspacing="0">
              <thead>
                  <tr>
                      <th>Nama Kriteria</th>
                      <th>Prioritas</th>
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
              <li>
                <a href="<?php echo base_url('Kriteria/Hitung_ahp')?>" style="text-decoration: none;">
                  <span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span>
                  <span class="">Hitung kriteria</span>
                </a>
              </li>
          </ul>
        </div>
    </div>
</div>

<!-- This is the modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Kriteria Baru</h2>
        <form>
          <fieldset class="uk-fieldset">
              <div class="uk-margin">
                  <input class="uk-input" type="text" placeholder="Nama Kriteria" name="nama_kriteria" id="nama_kriteria">
              </div>
          </fieldset>
        </form>
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary uk-modal-close" type="button" onclick="add_kriteria()">Submit</button>
        </p>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    table = $('#data-kriteria').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "pageLength" : 5,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Kriteria/kriteria_list')?>",
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

function add_kriteria(){
      var datasend = new FormData();

      datasend.append('nama_kriteria', $("#nama_kriteria").val());

      if ($("#nama_kriteria").val() != "") {
        $.ajax({
            url: "<?php echo base_url()?>" + "Kriteria/add_",
            type: "POST",
            data: datasend,
            processData: false,
            contentType: false,
            cache:false,
        }).done(function (data) {
          console.log(data);
          $('#data-kriteria').DataTable().ajax.reload();

          $("#nama_kriteria").val("");

          UIkit.notification({message: 'Data has been add.'});
        });
        return false;
      }else{
        UIkit.notification({message: 'Canceled! You must enter name criteria.'});
      }
      
  }
</script>
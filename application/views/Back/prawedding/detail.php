<div class="uk-grid-small uk-child-width-1-4@s uk-flex uk-text-center" uk-grid>

        <div class="uk-card ">
            <img src="<?php echo base_url('upload/prawed/'.$prawed->gambar)?>" style="height: 150px;">
        </div>

        <?php foreach ($detail as $d): ?>
            <div class="uk-card ">
                <img src="<?php echo base_url('upload/prawed/'.$d->gambar)?>" style="height: 150px;">
            </div>
        <?php endforeach ?>
</div>

<div class="uk-grid-small uk-child-width-1-4@s uk-flex-left" uk-grid>
    <div class="uk-card ">
        <p>
            <h3 style="margin-bottom: 0"> <?php echo $prawed->nama_tempat;?></h3><br>
            Domicile : <?php echo $domisili;?><br>
            Theme prawed : <?php echo $theme;?><br>
            Address : <?php echo $prawed->alamat;?><br>
            Contacts : <?php echo $prawed->kontak;?><br>
            Price : <?php echo $this->template->convertrupiah($prawed->harga);?><br>
            About : <?php echo $prawed->keterangan;?><br>
        </p>
    </div>
</div>

<div class="uk-margin">
    <a href="<?php echo base_url('Place_prawed')?>" class="uk-button uk-button-default uk-modal-close" type="button">Back</a>
</div>
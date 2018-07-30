

<div class="uk-text" uk-grid>
    <div class="uk-width-1-3@m" style="padding-right: 0; background-color: whitesmoke;">
        <div class="uk-card ">
            <p>
                <h3 style="margin-bottom: 0; margin-top: 0;"> <?php echo $prawed->nama_tempat;?>(<?php echo $theme;?>)</h3>
                <br>

                <b><h4><?php echo $this->template->convertrupiah($prawed->harga);?></h4></b>
                <br>
                <?php echo $prawed->alamat;?>,
                <?php echo $domisili;?>
                <br><br>

                Contacts : <?php echo $prawed->kontak;?><br>
                More information : <br>
                <?php echo $prawed->keterangan;?><br>
            </p>
        </div>
    </div>
    <div class="uk-width-expand@m" style="padding-right: 0; padding-left: 0;">
        <div class="uk-light">
            <div class="uk-position-relative uk-visible-toggle uk-light forwidth" uk-slideshow="animation: push; autoplay: true">
                <ul class="uk-slideshow-items height-detail">
                    <li style="cursor: pointer;">
                        <img src="<?php echo base_url('upload/prawed/'.$prawed->gambar)?>" alt="" uk-cover>
                    </li>

                    <?php foreach ($detail as $d): ?>
                        <li style="cursor: pointer;">
                            <img src="<?php echo base_url('upload/prawed/'.$d->gambar)?>" alt="" uk-cover>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="uk-margin" style="float: right;">
    <a href="<?php echo base_url('Place_prawed')?>" class="uk-button uk-button-default uk-modal-close" type="button">Back</a>
</div>
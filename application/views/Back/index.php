<div class="uk-grid-collapse uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <div class="uk-background-muted uk-padding">Welcome to back-end MARIPRAWED</div>
    </div>
</div>

<div class="uk-grid-small uk-child-width-1-4@s uk-text-center" uk-grid>
    <?php foreach ($prawed as $d): ?>
	    <div>
	        <div class="uk-card-default" style="padding: 20px">
	        	<img src="<?php echo base_url('upload/prawed/'.$d->gambar)?>" style="height: 150px">
	        </div>
	    </div>
    <?php endforeach ?>
</div>
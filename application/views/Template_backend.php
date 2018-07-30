<!DOCTYPE html>
<html style="background-color: #f5f5f5">
  <head>
  	<title>PRAWEDDING</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uikit-rtl.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uikit.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/data-tables/css/jquery.dataTables.css">
  </head>

  <body >

    <div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>

      <div class="uk-padding tm-sidebar-left" style="position:fixed; border-right: 1px solid; width: 220px;background-color: #f5f5f5;">
          <div name="kolom1" class="uk-text-center">
            <!-- kolom 1 -->
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                  <li class="uk-active">
                    <img src="<?php echo base_url();?>assets/gambar/logo-mariprawed.png" alt="" style="width:100%;margin-left:-15px;margin-top:-25px;">
                  </li>
              </ul>
            </div>
            <hr>
            <div class="uk-form-stacked">

              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
              	<li>
                	<a href="">Accounts</a>
                </li>
                <li>
                	<a href="<?php echo base_url('Domisili') ?>">Domicile</a>
                </li>
                <li>
                	<a href="<?php echo base_url('Theme_prawed') ?>">Theme Prawed</a>
                </li>
                <li>
                	<a href="<?php echo base_url('Place_prawed') ?>">Prawedding place's</a>
                </li>
              </ul>
          	</div>
          	<hr>
          	<div class="uk-form-stacked">

              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>

                <li>
                	<a target="_blank" style="margin-top: 10px">
                    <span uk-icon="icon: sign-out" class="uk-margin-small uk-icon"></span>
                    <span class="" uk-toggle="target: #modal-example">sign out</span>
                  </a>
                </li>
              </ul>
          	</div>
      </div>
      <div class="row">
      	
    <div class="uk-container uk-container-small" style="margin-left: 200px;">
      <ul class="uk-breadcrumb">
	    <li><a href="#">Mariprawed</a></li>
	    <li><span><?php echo $title ?></span></li>
	</ul>
	</div>
	<hr>
    <div class="uk-section" style="padding-top: 0;">
	    <div class="uk-container uk-container-small" style="margin-left: 200px; max-width: 1200px;">
	    	<?php echo $content?>
	    </div>
	</div>
      </div>

  </div>

  </body>


<!-- footer page -->


</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/uikit.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/uikit-icons.min.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/data-tables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
        // $('#content').load("application/views/Front/landing_page.php");
});
</script>

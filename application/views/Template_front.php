<!DOCTYPE html>
<html>
  <head>
  	<title>PRAWEDDING</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uikit-rtl.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uikit.css">
  </head>

  <body>
    <!-- header page menu etc. -->

  			<!-- name header -->

  			<!-- modal wrap -->

<!-- content views  -->
  	<div id="content" class="content-com" hidden>
  	</div>

    <div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>

      <div class="uk-width-medium uk-padding tm-sidebar-left" style="position:fixed">
          <div name="kolom1" class="uk-text-center">
            <!-- kolom 1 -->
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                  <li class="uk-active">
                    <h2>MARIPRAWED</h2>
                  </li>
                  <li>
                    <div class="uk-margin">
                      <form class="uk-search uk-search-default">
                          <a href="" uk-search-icon></a>
                          <input class="uk-search-input" type="search" placeholder="Search...">
                      </form>
                  </div>
                </li>

                <li>
                  <h3 style="padding-top:35px;margin-bottom:0px;">FILTERS</h3>
                </li>
              </ul>
            </div>

            <div class="uk-form-stacked">

              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav style="font-size:12px;">
                <li>
                  <hr>
                  <b>TEMPAT</b>
                  <div class=" uk-grid" style="margin-bottom:5px">
                      <label><input class="uk-checkbox" type="checkbox"> Semua Tempat</label>
                      <form>
                          <input class="uk-input " type="text" placeholder="from..." style="height:30px;width:80px">
                          <label for="">-</label>
                          <input class="uk-input " type="text" placeholder="to..." style="height:30px;width:80px">
                      </form>
                  </div>
                </li>

                <li>
                  <hr>
                  <b>TEMA</b>
                  <div class=" uk-grid-small uk-width-small uk-grid" style="margin-bottom:5px">
                      <label><input class="uk-checkbox" type="checkbox"> Islami</label>
                      <label><input class="uk-checkbox" type="checkbox"> Casual</label>
                      <label><input class="uk-checkbox" type="checkbox"> Formal</label>
                      <label><input class="uk-checkbox" type="checkbox"> Budaya</label>
                  </div>
                </li>

                <li>
                  <hr>
                  <b>TEMPAT DAERAH</b>
                  <div class=" uk-grid-small uk-width-small  uk-grid" style="margin-bottom:5px">
                      <label><input class="uk-checkbox" type="checkbox"> Bandung Selatan</label>
                      <label><input class="uk-checkbox" type="checkbox"> Bandung Utara</label>
                      <label><input class="uk-checkbox" type="checkbox"> Bandung Timur</label>
                      <label><input class="uk-checkbox" type="checkbox"> Bandung Barat</label>

                  </div>
                </li>
              </ul>
          </div>
          <div name="kolom1" class="uk-text-center">
            <!-- kolom 1 -->
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                <li>
                  <h3 style="padding-top:35px;margin-bottom:0px">CONTACT</h3>
                  <div class="" style="margin-bottom:5px">
                      <a href="#"> <img src="<?php echo base_url();?>assets/image/youtube.png" alt="" style="width:8%"></a>
                      <a href="#"> <img src="<?php echo base_url();?>assets/image/twit.png" alt="" style="width:8%"></a>
                      <a href="#"> <img src="<?php echo base_url();?>assets/image/fb.png" alt="" style="width:8%"></a>
                      <a href="#"> <img src="<?php echo base_url();?>assets/image/ig.png" alt="" style="width:8%"></a>
                  </div>
                </li>
                <li>
                  <div class="uk-text-center" style="font-size:8px;">
                    <p>
                      Indonesia <br>
                      2018 Mariprawed, Inc. All Rights Reserved
                    </p>
                  </div>
                </li>
              </ul>
            </div>
      </div>
      <div class="uk-container uk-position-relative" style="padding-right: 0px;margin-left: 280px;">
          <div class="uk-background-primary" style="height:2000px">Expand</div>
      </div>
  </div>

  </body>


<!-- footer page -->


</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/uikit-icons.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/uikit.js"></script>
<script type="text/javascript">
$(document).ready(function(){
        $('#content').load("application/views/Front/landing_page.php").fadeIn('slow');
      $('#content').append('tadaaa  ');
});
</script>

<!DOCTYPE html>
<html>
  <head>
  	<title>PRAWEDDING</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uikit-rtl.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uikit.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery-ui.css">
  </head>

  <body>
    <!-- header page menu etc. -->

  			<!-- name header -->

  			<!-- modal wrap -->

<!-- content views  -->
  	<!-- <div id="content" class="content-com" hidden>
  	</div> -->

    <div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>

      <div class="uk-width-medium uk-padding tm-sidebar-left" style="position:fixed; padding: 40px 40px 40px 20px;">
          <div name="kolom1" class="uk-text-center">
            <!-- kolom 1 -->
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                  <li class="uk-active">
                    <img src="<?php echo base_url();?>assets/gambar/logo-mariprawed.png" alt="" style="width:100%;margin-left:-15px;margin-top:-25px;cursor: pointer;" class="home">
                  </li>
                <li>
                    <div class="uk-margin uk-text-left">
                      <div class="uk-search uk-search-default">
                          <a href="" uk-search-icon></a>
                          <input class="uk-search-input" type="text" name="search" id="search" placeholder="Search...">
                      </div>
                    </div>
                </li>

                <li>
                  <h3 style="padding-top:30px;margin-bottom:0px;">FILTERS</h3>
                </li>
              </ul>
            </div>

            <div class="uk-form-stacked">

              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav style="font-size:12px;">
                <li>
                  <hr>
                  <b>TEMPAT</b>
                  <div class=" uk-grid" style="margin-bottom:5px">
                      <label><input class="uk-checkbox" type="checkbox" id="all" onclick="checkall()"> Semua Tempat</label>
                      <form>
                          <input class="uk-input money" type="text" id="from" placeholder="Harga from..." style="height:30px;width:85px">
                          <label for="">-</label>
                          <input class="uk-input money2" type="text" id="to" placeholder="to..." style="height:30px;width:80px">
                      </form>
                  </div>
                </li>

                <li>
                  <hr>
                  <div class=" uk-grid-small uk-width-small uk-grid" style="margin-bottom:5px; width: 100%;">
                      <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true" style="margin-left: 15px;
                                                                                                   width: 100%;">
                        <li class="uk-parent">
                            <a><b>TEMA</b></a>
                            <ul class="uk-nav-sub" id="tema">
                                
                            </ul>
                        </li>
                    </ul>
                  </div>
                </li>

                <li>
                  <hr>
                  <div class=" uk-grid-small uk-width-small  uk-grid" style="margin-bottom:5px; width: 100%;">
                      <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true" style="margin-left: 15px;
                                                                                                   width: 100%;">
                          <li class="uk-parent">
                              <a><b>TEMPAT DAERAH</b></a>
                              <ul class="uk-nav-sub" id="domisili">
                                  
                              </ul>
                          </li>
                      </ul>
                  </div>
                </li>
                <li class="uk-text-center">
                  <a target="_blank" style="margin-top: 10px">
                    <span uk-icon="icon: sign-in" class="uk-margin-small uk-icon"></span>
                    <span class="" uk-toggle="target: #modal-example">sign in</span>
                  </a>
                </li>
              </ul>
          </div>
          <div class="uk-text-center">
              <!-- kolom 1 -->
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
              <li>
                <h3 style="margin-bottom:0px">CONTACT</h3>
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
                    <br><br>
                    Indonesia <br>
                    2018 Mariprawed, Inc. All Rights Reserved
                  </p>
                </div>
              </li>
              </ul>
          </div>
      </div>
      <div id="content" class="uk-container uk-position-relative" style="padding-right: 0px;margin-left: 280px;">
        <!--  -->
      </div>
  </div>

  </body>


<!-- footer page -->


</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/uikit.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/uikit-icons.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>


<script rel="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/loader.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  setCookie('domisili', 'null', 1);
  setCookie('tema', 'null', 1);
  setCookie('from', 'null', 1);
  setCookie('to', 'null', 1);

  $('.money').mask("#,##0", {reverse: true});
  $('.money2').mask("#,##0", {reverse: true});

  var data_autocomplete = [];
  $.ajax({
      url: "<?php echo site_url('Front_end/search/');?>",
      dataType: "json",
      success: function( data ) {
        for(var i in data) {    
            data_autocomplete.push({ 
                "id" : data[i].id,
                "value"  : data[i].nama_tempat,
            });
        }
      }
  });

  $('#search').autocomplete({
          source: data_autocomplete,
          select: function( event, ui ) {
            console.log(ui.item.id); 
              // setCookie("id_tempat",ui.item.id,365);
              // $(this).scrollTop(0);
              // $('#content').load("application/views/Front/ahp_result.php").fadeIn('slow');
          }
  });

  tema();
  domisili();
});

function tema(){
  var url = window.location.href;
  $.ajax({
          url: url + "Front_end/tema/",
          type: "GET",
          dataType:'json',
          processData: false,
          contentType: false,
          cache:false,
      }).done(function (data) {
        for (var i = 0; i < data.length; i++) {
          $('#tema').append('<li style="font-size:12px;"><input class="uk-checkbox" type="checkbox" id="tema" name="tema" value="'+data[i]['id']+'" onclick="checktema()"> '+data[i]['nama_tema']+'</li>');
        }
    });
}

function domisili(){
  var url = window.location.href;
  $.ajax({
          url: url + "Front_end/domisili/",
          type: "GET",
          dataType:'json',
          processData: false,
          contentType: false,
          cache:false,
      }).done(function (data) {
        for (var i = 0; i < data.length; i++) {
          $('#domisili').append('<li style="font-size:12px;"><input class="uk-checkbox" type="checkbox" id="domisili" name="domisili" value="'+data[i]['id']+'" onclick="checkdomisili()"> '+data[i]['nama_domisili']+'</li>');
        }
    });
}
</script>

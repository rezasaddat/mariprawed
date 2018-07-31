<div class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport">
    <div class="uk-position-bottom-center uk-position-small uk-visible@m">
        <span class="uk-text-small" style="color: white;">© 2018 MARIPRAWED - GetUikit - All rights reserved</span>
    </div>
    <div class="uk-width-medium uk-padding-small uk-card uk-card-default uk-card-body">

            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: user"></span>
                        <input class="uk-input uk-form-large" required placeholder="Username" type="text" id="username" name="username">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                        <input class="uk-input uk-form-large" required placeholder="Password" type="password" id="password" name="password">
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label><input class="uk-checkbox" type="checkbox" checked> Remember Me</label>
                </div>
                <div class="uk-margin">
                    <button onclick="login()" type="submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">LOG IN</button>
                </div>
            </fieldset>

        <div>
            <div class="uk-text-center">
                <a class="uk-link-reset uk-text-small" uk-toggle="target: #recover;animation: uk-animation-slide-top-small">Forgot your password?</a>
            </div>
            <div class="uk-margin-small-top" id="recover" hidden>
                    
                    <div class="uk-margin-small">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: mail"></span>
                            <input class="uk-input" placeholder="E-mail" required type="text">
                        </div>
                    </div>
                    
                    <div class="uk-margin-small">
                        <button type="submit" class="uk-button uk-button-primary uk-button-primary uk-width-1-1">SEND PASSWORD</button>
                    </div>

            </div>
        </div>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    var input = document.getElementById("username");
    var input = document.getElementById("password");

    input.addEventListener("keyup", function(event) {
    // Cancel the default action, if needed
        event.preventDefault();
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
        // Trigger the button element with a click
        var datasend = new FormData();

        datasend.append('username', $("#username").val());
        datasend.append('password', $("#password").val());

        $.ajax({
          url: "<?php echo base_url()?>" + "Login/Login",
          type: "POST",
          data: datasend,
          processData: false,
          contentType: false,
          cache:false,
        }).done(function (data) {

            if(data == 1){
                UIkit.notification({message: "Congratulations! you have login."});
                window.location.href = "<?php echo base_url('Admin')?>";
            }else{
                UIkit.notification({message: "Wrong! Please check username and password."});
            }

            });
            return false;
        }
    });
});

function login() {
    var datasend = new FormData();

    datasend.append('username', $("#username").val());
    datasend.append('password', $("#password").val());

    $.ajax({
      url: "<?php echo base_url()?>" + "Login/Login",
      type: "POST",
      data: datasend,
      processData: false,
      contentType: false,
      cache:false,
    }).done(function (data) {

        if(data == 1){
            UIkit.notification({message: "Congratulations! you have login."});
            window.location.href = "<?php echo base_url('Admin')?>";
        }else{
            UIkit.notification({message: "Wrong! Please check username and password."});
        }

        return false;
    });
}
</script>
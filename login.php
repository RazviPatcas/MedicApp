
<?php include('include/header.php');?>
<?php

    $page_name = "<i class='fa fa-sign-in'></i> Login";
?>
<?php include('include/nav.php');?>
<?php
    if (isset($_SESSION['patient_email'])) {header("Location: index.php");}
    if (isset($_SESSION['doctor_email'])) {header("Location: index.php");}
    ?>
<!-- Start Login Section -->
<div id="login-page">
    <div class="layer-stretch" style="background-image: url('public/uploads/slider-1.jpg')">
        <div class="layer-wrapper">
            <div class="layer-container">
                <form class="form-container" action="include/verify_user.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="15276e55e6cdfa6911f440f75f64501dc97cc6f4a19102dddb4c47f0c4dd1523ad639943996afef209d6a358056f3b3389a9bcb175b7413ef3547589673a2b7d">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-envelope-o"></i>
                        <input class="mdl-textfield__input" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="login-email">
                        <label class="mdl-textfield__label" for="login-email">Adresă de e-mail :<em> *</em></label>
                        <span class="mdl-textfield__error">Introdu o adresă de e-mail validă!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-ravelry"></i>
                        <div class="row form-input">
                            <div class="col-md-2">
                                <label style= "padding-top:5px;" for="">
                                    <p class="text-info"><b>Rol:</b></p> 
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input  type="radio" name="role" value="patient" id="gender-male" class="mdl-radio__outer-circle">
                                <label  for="gender-male"><span></span><p> Pacient </p></label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="role" value="doctor" id="gender-female" class="mdl-radio__outer-circle">
                                <label for="doctor"><span></span><p> Doctor </p></label>
                            </div>
                        </div>

                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-key"></i>
                        <input class="mdl-textfield__input" type="password" name="password" id="login-password">
                        <label class="mdl-textfield__label" for="login-password">Parolă <em> *</em></label>
                        <span class="mdl-textfield__error">Introdu o parolă valid (minim 6 caractere)!</span>
                        <a href="forget_pass.php" class="forgot-pass">Ai uitat parola?</a>
                    </div>
                    <div class="form-submit">
                        <button type="submit" name="login" id="login-submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill">Autentificare</button>
                    </div>
                    <div class="login-link">
                        <span class="paragraph-small">Nu aveți cont ?</span>
                        <a href="register.php">Înregistrează-te ca utilizator nou !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Login Section -->

<!-- Start Make an Appointment Modal -->
<?php include('include/make_appointment.php');?>
<!-- End Make an Appointment Section -->
<?php include('include/footer.php');?>


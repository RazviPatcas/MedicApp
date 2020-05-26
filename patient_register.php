<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php

    $page_name = "<i class='fa fa-registered'></i> Registration <span style='font-size: 18px;'> >>Patient </span> ";
    require ('class/patients.php');

?>
<?php include('include/nav.php');?>
<?php
    $patient = new patients();
    $patient->add();
?>  
    <br>
    <div class="page-ttl-name">
                <h1 style = "text-align:center; color:#32C1CE;" ><i class="fa fa-user-plus"></i> Înregistrare</h1>
            </div>
    <div id="login-page">
        <div class="layer-stretch" >
            <div class="layer-wrapper" style="background-image: url('public/uploads/slider-1.jpg');">
                <div class="layer-container " >
                 <form class="form-container" action="patient_register.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="15276e55e6cdfa6911f440f75f64501dc97cc6f4a19102dddb4c47f0c4dd1523ad639943996afef209d6a358056f3b3389a9bcb175b7413ef3547589673a2b7d">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user-o"></i>
                            <input class="mdl-textfield__input" type="text" name="firstname" pattern="[A-Z,a-z, ]*" id="register-first-name">
                            <label class="mdl-textfield__label" for="register-first-name">Nume <em> *</em></label>
                            <span class="mdl-textfield__error">Introdu numele !</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user-o"></i>
                            <input class="mdl-textfield__input" type="text" name="lastname" pattern="[A-Z,a-z, ]*" id="register-last-name">
                            <label class="mdl-textfield__label" for="register-last-name">Prenume <em> *</em></label>
                            <span class="mdl-textfield__error">Introdu prenumele!</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-envelope-o"></i>
                            <input class="mdl-textfield__input" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="register-email">
                            <label class="mdl-textfield__label" for="register-email">Adresă de e-mail <em> *</em></label>
                            <span class="mdl-textfield__error">Introdu o adresă de e-mail validă!</span>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-location-arrow"></i>
                            <label style="float:left;padding-top:5px;" for="location">Locație : </label>
                            <select style="padding-top:5px;" name="location" id="locationig" class="form-input" >
                                <option value="" class="">Selectează locația</option>
                                <?php
                                $sql = "SELECT * FROM locations ";
                                $result = $pdo->prepare($sql);
                                $result->execute();
                                $locations = $result->fetchAll(); // default value PDO::FETCH_obj

                                foreach ($locations as $location) {
                                    ?>
                                    <option class="text-capitalize" value="<?php echo $location->location_id; ?>"><?php echo $location->name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-plus-circle"></i>
                            <label style="float:left;padding-top:5px;" for="blood">Grupa de sânge :</label>
                            <select style="padding-top:5px;" name="blood" id="blood" class="form-input" >
                                <option  value="">Grupa de sânge </option>
                                <option value="O1">O1</option>
                                <option value="A2">A2</option>
                                <option value="B3">B3</option>
                                <option value="AB4">AB4</option>
                            </select>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-phone"></i>
                            <input class="mdl-textfield__input" type="text" name="mobile" pattern="[0-9]*" id="register-mobile">
                            <label class="mdl-textfield__label" for="register-mobile">Telefon <em> *</em></label>
                            <span class="mdl-textfield__error">Introdu un număr de telefon valid !</span>
                        </div>

                        <div class="row form-input">
                            <div class="col-md-4">
                                <label for=""><span></span><p class="text-info"><i class="fa fa-intersex text-success"> </i><b>  Sex : </b></p> </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="gender" value="Male" id="gender-male" class="mdl-radio__outer-circle">
                                <label for="gender-male"><span></span><p><i class="fa fa-mars"></i> Masculin </p></label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="gender" value="Female" id="gender-female" class="mdl-radio__outer-circle">
                                <label for="gender-female"><span></span><p><i class="fa fa-venus"></i> Feminin </p></label>
                            </div>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-key"></i>
                            <input class="mdl-textfield__input" type="text" name="username" id="register-username">
                            <label class="mdl-textfield__label" for="register-password">Nume de utilizator <em> *</em></label>
                            <span class="mdl-textfield__error">Introdu un nume de utilizator valid (minim 6 caractere)!</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-key"></i>
                            <input class="mdl-textfield__input" type="password" name="password" id="register-password">
                            <label class="mdl-textfield__label" for="register-password">Parolă <em> *</em></label>
                            <span class="mdl-textfield__error">Introdu o parolă valid (minim 6 caractere)!</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-key"></i>
                            <input class="mdl-textfield__input" type="password" name="confirmpassword" id="register-confirm-password">
                            <label class="mdl-textfield__label" for="register-confirm-password">Confirmă parola <em> *</em></label>
                            <span class="mdl-textfield__error">Parola nu se potrivește !</span>
                        </div>

                        <div class="login-condition">Dând clic pe creare cont, sunteți de acord cu <br /><a href="about.php">Termenii și condițiile noastre</a></div>
                        <div class="form-submit">
                            <button type="submit" id="register-submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill" name="register_patient">Crează cont</button>
                        </div>
                        <div class="login-link">
                            <span class="paragraph-small">Aveți deja un cont?</span>
                            <a href="login.php">Autentificare</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
<?php include('include/footer.php');?>
<?php ob_start(); ?>
<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
    require ('class/doctors.php');
//    require ('class/hospitals.php');
    require ('class/departments.php');


    $page_name = "<i class='fa fa-registered'></i> Registration <span style='font-size: 18px;'> >>Doctor ";
?>
<?php include('include/nav.php');?>
<p>
<?php
    $doctor = new doctors();
    $doctor->add();
?>
</p>
<div class="page-ttl-name">
                <h1 style = "text-align:center; color:#32C1CE;"><i class="fa fa-user-md"></i> Înregistrare</h1>
</div>
    <div id="login-page">
        <div class="layer-stretch" >
            <div class="layer-wrapper" style="background-image: url('public/uploads/slider-1.jpg');">
                <div class="layer-container " >
                    <form class="form-container" action="doctor_register.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="15276e55e6cdfa6911f440f75f64501dc97cc6f4a19102dddb4c47f0c4dd1523ad639943996afef209d6a358056f3b3389a9bcb175b7413ef3547589673a2b7d">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user-o"></i>
                            <input class="mdl-textfield__input" type="text" name="firstname" pattern="[A-Z,a-z, ]*" id="register-first-name">
                            <label class="mdl-textfield__label" for="register-first-name">Nume <em> *</em></label>
                            <span class="mdl-textfield__error">Introduceți numele !</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user-o"></i>
                            <input class="mdl-textfield__input" type="text" name="lastname" pattern="[A-Z,a-z, ]*" id="register-last-name">
                            <label class="mdl-textfield__label" for="register-last-name">Prenume <em> *</em></label>
                            <span class="mdl-textfield__error">Introduceți prenumele !</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-file-picture-o"></i>
                            <input class="mdl-textfield__input" type="file" name="photo" pattern="[A-Z,a-z, ]*" id="register-last-name">

                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-envelope-o"></i>
                            <input class="mdl-textfield__input" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="register-email">
                            <label class="mdl-textfield__label" for="register-email">Adresă de e-mail <em> *</em></label>
                            <span class="mdl-textfield__error">Introduceți o adresă de e-mail validă!</span>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-location-arrow"></i>
                            <label style="float:left;padding-top:5px;" for="location">Clinica/Spital : </label>
                            <select style="padding-top:4px;" name="hospital" id="hospital" class="form-input" >
                            
                                <option  class="text-capitalize text-info " >  Selectați opțiunile :</option>
                                <?php

                                $hsptl = new hospitals();
                                $result = $hsptl->all();
                                $hospitals = $result->fetchAll(); // default value PDO::FETCH_obj
                                foreach ($hospitals as $hospital) {
                                    ?>
                                    <option class="text-capitalize text-info" value="<?php echo $hospital->id; ?>"><?php echo $hospital->name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-location-arrow"></i>
                            <label style="float:left;padding-top:5px;" for="location">Departament : </label>
                            <select style="padding-top:4px;" name="department" id="department" class="form-input" >
                                <option class="text-capitalize text-info " >Selectați departament:</option>
                                <?php

                                $dpt = new departments();
                                $result = $dpt->all();
                                $departments = $result->fetchAll(); // default value PDO::FETCH_obj
                                foreach ($departments as $department) {
                                    ?>
                                    <option class="text-capitalize text-info" value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-graduation-cap"></i>
                            <input class="mdl-textfield__input" type="text" name="degree" pattern="[A-Z,a-z, ]*" id="register-last-name">
                            <label class="mdl-textfield__label" for="register-mobile">Studii <em> *</em></label>
                            <span class="mdl-textfield__error">Vă rugăm să introduceți studiile !</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-phone"></i>
                            <input class="mdl-textfield__input" type="text" name="mobile" pattern="[0-9]*" id="register-mobile">
                            <label class="mdl-textfield__label" for="register-mobile">Telefon <em> *</em></label>
                            <span class="mdl-textfield__error">Introduceți un număr de telefon valid !</span>
                        </div>

                        <div class="row form-input content-radio-container">
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
                            <span class="mdl-textfield__error">Introduceți un nume de utilizator valid (minim 6 caractere)!</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-key"></i>
                            <input class="mdl-textfield__input" type="password" name="password" id="register-password">
                            <label class="mdl-textfield__label" for="register-password">Parolă <em> *</em></label>
                            <span class="mdl-textfield__error">Introduceți o parolă valid (minim 6 caractere)!</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-key"></i>
                            <input class="mdl-textfield__input" type="password" name="confirmpassword" id="register-confirm-password">
                            <label class="mdl-textfield__label" for="register-confirm-password">Confirmă parola  <em> *</em></label>
                            <span class="mdl-textfield__error">Parola nu se potrivește !</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-key"></i>
                            <input class="mdl-textfield__input" type="paraf_code" name="paraf_code" id="register-username">
                            <label class="mdl-textfield__label" for="register-confirm-password">Cod parafă  <em> *</em></label>
                        </div>
 <!--                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                <i class="fa fa-key"></i>
                                <label class="mdl-textfield__label">Oră început:</label>
                                <input type="time" name="st" value="st" placeholder="">
                                <p class="content-input-error-name"></p>
                            </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                <i class="fa fa-key"></i>    
                                <label class="mdl-textfield__label" >Oră sfârșit:</label>
                                <input type="time" name="et" value="et" placeholder="">
                                <p class="content-input-error-name"></p>
                            </div>-->
                        <div class="login-condition">Dând clic pe creare cont, sunteți de acord cu<br /><a href="about.php">Termenii și condițiile noastre</a></div>
                        <div class="form-submit">
                            <button type="submit" id="register-submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill" name="register_doctor">Crează cont</button>
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

    <div id="appointment" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">Make An Appointment</h4>
                    <div class="appointment-hdr-back"><i class="fa fa-chevron-left"></i></div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="appointment-form">
                        <div class="appointment-part-1">
                            <div class="appointment-option">
                                <div class="appointment-option-department">
                                    <i class="fa fa-hospital-o" id="appointment-option-department"></i>
                                    <span class="mdl-tooltip mdl-tooltip--top" for="appointment-option-department">I Know Department</span>
                                </div>
                                <div class="appointment-option-doctor">
                                    <i class="fa fa-user-md" id="appointment-option-doctor"></i>
                                    <span class="mdl-tooltip mdl-tooltip--top" for="appointment-option-doctor">I Know Doctor</span>
                                </div>
                            </div>
                            <div class="appointment-invisible">
                                <input type="hidden" value="{&quot;id&quot;:1,&quot;name&quot;:&quot;Daniel Barnes&quot;,&quot;department&quot;:2,&quot;weekly&quot;:&quot;[\&quot;3\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-01-18, 2017-01-21, 2017-01-30, 2017-03-27, 2017-03-31\&quot;&quot;}" class="doctor-id-1 department-id-2" >
                                <input type="hidden" value="{&quot;id&quot;:3,&quot;name&quot;:&quot;Melissa Bates&quot;,&quot;department&quot;:1,&quot;weekly&quot;:&quot;[\&quot;1\&quot;,\&quot;2\&quot;,\&quot;6\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-04-13, 2017-04-14, 2017-04-20, 2017-07-07, 2017-07-08, 2017-07-14\&quot;&quot;}" class="doctor-id-3 department-id-1" >
                                <input type="hidden" value="{&quot;id&quot;:4,&quot;name&quot;:&quot;Cheri Aria&quot;,&quot;department&quot;:3,&quot;weekly&quot;:&quot;[\&quot;5\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-03-07, 2017-03-14, 2017-03-20, 2017-03-26\&quot;&quot;}" class="doctor-id-4 department-id-3" >
                                <input type="hidden" value="{&quot;id&quot;:5,&quot;name&quot;:&quot;Steve Soeren&quot;,&quot;department&quot;:2,&quot;weekly&quot;:&quot;[\&quot;0\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-02-16, 2017-03-14, 2017-03-17, 2017-03-23, 2017-03-31\&quot;&quot;}" class="doctor-id-5 department-id-2" >
                                <input type="hidden" value="{&quot;id&quot;:6,&quot;name&quot;:&quot;Theodore Bennett&quot;,&quot;department&quot;:4,&quot;weekly&quot;:&quot;[\&quot;0\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-02-15, 2017-02-16, 2017-03-07, 2017-03-15, 2017-03-23, 2017-03-31\&quot;&quot;}" class="doctor-id-6 department-id-4" >
                                <input type="hidden" value="{&quot;id&quot;:7,&quot;name&quot;:&quot;Barbara Baker&quot;,&quot;department&quot;:2,&quot;weekly&quot;:&quot;[\&quot;1\&quot;,\&quot;5\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-06-08, 2017-06-20, 2017-06-28, 2017-06-29\&quot;&quot;}" class="doctor-id-7 department-id-2" >
                                <input type="hidden" value="{&quot;id&quot;:8,&quot;name&quot;:&quot;Linda Adams&quot;,&quot;department&quot;:1,&quot;weekly&quot;:&quot;[\&quot;0\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25, 2017-06-16, 2017-06-21, 2017-06-26, 2017-07-11, 2017-07-14, 2017-07-20, 2017-07-31\&quot;&quot;}" class="doctor-id-8 department-id-1" >
                                <input type="hidden" value="{&quot;id&quot;:10,&quot;name&quot;:&quot;Vedhraj Jain&quot;,&quot;department&quot;:5,&quot;weekly&quot;:&quot;[\&quot;6\&quot;,\&quot;0\&quot;]&quot;,&quot;national&quot;:&quot;\&quot;2000-12-25\&quot;&quot;}" class="doctor-id-10 department-id-5" >
                            </div>
                            <input type="hidden" name="appointment_token" value="15276e55e6cdfa6911f440f75f64501dc97cc6f4a19102dddb4c47f0c4dd1523ad639943996afef209d6a358056f3b3389a9bcb175b7413ef3547589673a2b7d">
                            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label appointment-input">
                                <select class="mdl-selectfield__select" id="appointment-department" name="department">
                                    <option value=""></option>
                                    <option value="1">Gynaecology</option>
                                    <option value="2">Orthology</option>
                                    <option value="3">Dermatologist</option>
                                    <option value="4">Anaesthesia</option>
                                    <option value="5">Ayurvedic</option>
                                </select>
                                <label class="mdl-selectfield__label" for="appointment-department">Choose Department <em>*</em></label>
                            </div>
                            <div id="appointment-doctor-wrapper" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label appointment-input">
                                <select class="mdl-selectfield__select" id="appointment-doctor" name="doctor">
                                    <option value=""></option>
                                </select>
                                <label class="mdl-selectfield__label" for="appointment-doctor">Choose Doctor <em>*</em></label>
                            </div>
                            <div class="or-label">OR</div>
                            <div id="search-doctor" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ui-widget appointment-input">
                                <label class="mdl-textfield__label" for="appointment-search-doctor">I Know Doctor <em>*</em></label>
                                <input class="mdl-textfield__input" type="text" value="" id="appointment-search-doctor">
                            </div>
                            <div id="appointment-date-wrapper" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label appointment-input">
                                <input class="mdl-textfield__input" type="text" value="" id="appointment-date" readonly>
                                <label class="mdl-textfield__label" for="appointment-date">Choose Date <em>*</em></label>
                            </div>
                            <div class="appointment-slot">
                                <p>Choose Time Slot</p>
                            </div>
                            <div class="appointment-button">
                                <button id="appointment-continue" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill" disabled>Continue</button>
                            </div>
                        </div>
                        <div class="appointment-loading">
                            <div class="appointment-loading-gif"></div>
                        </div>
                        <div class="appointment-part-2">
                            <div class="appointment-enterd-value"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label appointment-input">
                                <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z, ]*" value="" id="appointment-name">
                                <label class="mdl-textfield__label" for="appointment-name">Name <em>*</em></label>
                                <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label appointment-input">
                                <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" id="appointment-email">
                                <label class="mdl-textfield__label" for="appointment-email">Email Address <em>*</em></label>
                                <span class="mdl-textfield__error">Please Enter Valid Email Address!</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label appointment-input">
                                <input class="mdl-textfield__input" type="text" pattern="[0-9]*" value="" id="appointment-mobile">
                                <label class="mdl-textfield__label" for="appointment-mobile">Mobile Number <em>*</em></label>
                                <span class="mdl-textfield__error">Please Enter Valid Mobile Number!</span>
                            </div>
                            <div class="appointment-button">
                                <button id="appointment-submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill">Finish</button>
                            </div>
                        </div>
                        <div class="appointment-success">
                            <p class="paragraph-medium">Hello <span id="appointment-success-name"></span></p>
                            <p class="appointment-success-descr paragraph-medium">
                                Your appointment for <span id="appointment-success-date"></span> at <span id="appointment-success-time"></span>
                                has been booked.							</p>
                            <div class="appointment-mail-icon"><i class="fa fa-envelope-o"></i></div>
                            <p class="paragraph-medium paragraph-black">For more information visit your mail box.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('include/footer.php');?>
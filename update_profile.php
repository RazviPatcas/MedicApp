
<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
$page_name = "<i class='fa fa-pencil-square-o'></i> My Profile<span style='font-size: 22px;color: #66bb6a'>>>Update</span>";
?>
<?php include('include/nav.php');?>

<div id="edit-profile-page" class="animated-wrapper " style="opacity: 1;background-color: #219aa5;">
    <div class="layer-stretch">
        <div class="row layer-wrapper text-center">
            <div class="col-md-8 form-full-container">
                <form action="include/update_profile.php" method="post" enctype="multipart/form-data">
                    <p class="sub-ttl">Actualizează informațiile profilului</p>
                    <?php
                    $sql = "SELECT * FROM patients where patient_id = {$_SESSION['patient_id']}";
                    $result = $pdo->prepare($sql);
                    $result->execute();
                    $doctors = $result->fetchAll();
                    foreach ($doctors as $doctor) {


                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-dirty is-upgraded"
                                 data-upgraded="MaterialTextfield">
                                <input class="mdl-textfield__input" type="text" name="firstname" pattern="[A-Z,a-z, ]*"
                                       value="<?php echo $doctor->first_name;?>" id="profile-first-name" readonly>
                                <label class="mdl-textfield__label" for="profile-first-name">Nume</label>
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-dirty is-upgraded"
                                 data-upgraded=",MaterialTextfield">
                                <input class="mdl-textfield__input" type="text" name="lastname" value="<?php echo $doctor->last_name;?>"
                                       pattern="[A-Z,a-z, ]*" id="profile-last-name" readonly="">
                                <label class="mdl-textfield__label" for="profile-last-name">Prenume</label>
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                        <div class="clearfix clear"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-dirty is-upgraded"
                                 data-upgraded=",MaterialTextfield">
                                <input class="mdl-textfield__input" type="text" name="email" value="<?php echo $doctor->email;?>"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="profile-email" readonly="">
                                <label class="mdl-textfield__label" for="profile-email">Email</label>
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-dirty is-upgraded"
                                 data-upgraded=",MaterialTextfield">
                                <input class="mdl-textfield__input" type="text" name="mobile" value="<?php echo $doctor->phone;?>"
                                       pattern="[0-9]*" id="profile-mobile">
                                <label class="mdl-textfield__label" for="profile-mobile">Telefon</label>
                                <span class="mdl-textfield__error">!</span>
                            </div>
                        </div>
                        <div class="clearfix clear"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded"
                                 data-upgraded=",MaterialTextfield"> Data nașterii
                                <input class="mdl-textfield__input" type="date" name="dob" value="<?php echo $doctor->dob;?>"
                                       id="">
                                <label class="mdl-textfield__label" for=""></label>
                            </div>
                        </div>
                        <div class="clearfix clear"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded"
                                 data-upgraded=",MaterialTextfield">Grupa de sânge
                                <input class="mdl-textfield__input" type="text" name="bloodgroup" value="<?php echo $doctor->blood_group;?>"
                                       id="profile-bg" readonly>
                                <label class="mdl-textfield__label" for="profile-bg"></label>
                            </div>
                        </div>
                        <div class="clearfix clear"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded"
                                 data-upgraded=",MaterialTextfield"> Orașul
                                <select name="location_id" id="">

                                    <?php

                                    $sql = "SELECT * FROM locations";
                                    $result = $pdo->prepare($sql);
                                    $result->execute();
                                    $loc = $result->fetchAll();
                                    foreach ($loc as $item) {
                                        ?>
                                        <option value="<?php echo $item->location_id;?>" <?php if ($item->location_id==$doctor->location_id) {echo "selected";} ?>><?php echo $item->name;?></option>
                                        <?php

                                }

                                ?>
                                </select>
                                <label class="mdl-textfield__label" for="profile-location"></label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded"
                                 data-upgraded=",MaterialTextfield">Starea actuală a bolii(opțional):
                                <input class="mdl-textfield__input hasDatepicker" type="text" name="condition" value="<?php echo $doctor->dob;?>"
                                       id="">
                                <label class="mdl-textfield__label" for=""></label>
                            </div>
                        </div>
                   <!--     <div class="clearfix clear"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded"
                                 data-upgraded=",MaterialTextfield">
                                <input class="mdl-textfield__input" type="text" name="country" value=""
                                       id="profile-country">
                                <label class="mdl-textfield__label" for="profile-country"></label>
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>-->
                    </div>
                    <div class="form-submit">
                        <button type="submit" id="edit-profile-submit" name="profile"
                                class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill"
                                data-upgraded=",MaterialButton,MaterialRipple">Actualizează<span
                                    class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                        </button>
                    </div>

                </form>


            </div>
            <div class="col-md-4">
                <form action="update_doctor_profile.php" method="post" class="form-full-container"
                      enctype="multipart/form-data">
                    <p class="sub-ttl">Schimbă parola</p>
                    <input type="hidden" name="id" value="<?php echo $doctor->Patient_id;?>">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded">
                            <input class="mdl-textfield__input" type="password" name="oldpassword" pattern="[A-Z,a-z, ]*" id="register-first-name">
                            <label class="mdl-textfield__label" for="oldpassword">Parola veche <em> *</em></label>
                            <span class="mdl-textfield__error">Introduceți parola veche !</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded" data-upgraded=",MaterialTextfield">
                        <input class="mdl-textfield__input" type="password" name="newpassword" pattern="[A-Z,a-z, ]*" id="register-first-name">
                        <label class="mdl-textfield__label" for="register-new-password">Parola nouă</label>
                        <span class="mdl-textfield__error">Introduceți parola nouă !</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input is-upgraded"
                         data-upgraded=",MaterialTextfield">
                        <input class="mdl-textfield__input" type="password" name="confirmpassword"
                               id="change-password-confirm">
                        <label class="mdl-textfield__label" for="register-confirm-password">Confirmă parola </label>
                        <span class="mdl-textfield__error">Minim 6 caractere</span>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" id="change-password-submit" name="profilepassword"
                                class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill"
                                data-upgraded=",MaterialButton,MaterialRipple">Schimbă parola<span
                                    class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                        </button>
                    </div>

                    <?php
                    }
                    if (isset($_POST['profile'])){
                        $id = $_POST['id'];
                        $prblm = $_POST['problems'];

                        $sql = "UPDATE patients SET `medical_report`='$prblm' where patient_id = $id";
                        $result = $pdo->prepare($sql);
                        $result->execute();
                    }
                    ?>
                </form>
                <?php
                if (isset($_POST['profilepassword'])){
                    $id = $_POST['id'];
                    $op = $_POST['oldpassword'];
                    $np = $_POST['newpassword'];
                    $cp = $_POST['confirmpassword'];

                    $sql = "SELECT * FROM patients where patienrt_id = $id";
                    $result = $pdo->prepare($sql);
                    $result->execute();
                    $doctors = $result->fetchAll();
                    foreach ($doctors as $doctor) {
                        if ($doctor->password == $op && $np == $cp){
                            $sql = "UPDATE patients SET `password`='$np' where patient_id = $id";
                            $result = $pdo->prepare($sql);
                            $result->execute();
                        }else echo "Parolele nu se potrivesc";
                    }
                }
                ?>


            </div>
        </div>
    </div>
</div><!-- End Edit Profile Section -->

<!-- Start Make an Appointment Modal -->
<?php include('include/make_appointment.php');?><!-- End Make an Appointment Section -->

<?php include('include/footer.php');?>
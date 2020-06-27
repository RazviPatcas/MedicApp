<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
    $page_name = "<i class='fa fa-address-card-o'></i> My Profile";
?>
<?php include('include/nav.php'); ?>
<?php
    session_start();
    require ('class/patients.php');

?>

<div id="profile-page" class="dtr-modal-background">
    <div class="layer-stretch" style="background-image: url('public/uploads/slider-1.jpg')">
        <div class="row layer-wrapper">
            <div class="col-md-6 profile-left">
                    <div class="profile-data">
                        <div class="profile-data-block">
                            <div class="profile-data-label">Nume</div>
                            <div class="profile-data-value"><?php echo $_SESSION['patient_first_name']." ".$_SESSION['patient_last_name'];?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Nume utilizator</div>
                            <div class="profile-data-value"><?php echo $_SESSION['patient_username']; ?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Email </div>
                            <div class="profile-data-value"><?php echo $_SESSION['patient_email']; ?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Telefon</div>
                            <div class="profile-data-value"><?php echo $_SESSION['patient_phone']; ?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Ziua de naștere</div>
                            <div class="profile-data-value"><?php echo $_SESSION['dob']; ?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Sex</div>
                            <div class="profile-data-value"><?php echo $_SESSION['gender']; ?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Grupa de sânge
                            </div>
                            <div class="profile-data-value"><?php echo $_SESSION['bld_grp']; ?></div>
                        </div>
                        <div class="profile-data-block">
                            <div class="profile-data-label">Locație</div>
                            <div class="profile-data-value text-capitalize">
                                <?php
                                    $pat = new patients();
                                    $rslr = $pat->location($_SESSION['location_id']);
                                    $locs = $rslr->fetchAll();
                                foreach ($locs as $loc) {
                                    echo $loc->name;
                                    }
                                ?>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="col-md-6 profile-left">
                    <div class="profile-data">
                        <div class="profile-data-block">
                            <div class="profile-data-label">Istoric medical </div>
                            <div class="profile-data-value">
                                <ul>
                                <?php
                                $medical_h = explode(',',$_SESSION['medical_history']);
                                foreach ($medical_h as $key => $item) {
                                    echo '<li>'.$item.'</li>';
                                    if ($key == count($medical_h) - 3){
                                        break;
                                    }
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                     <!--   <div class="profile-data-block">
                            <div class="profile-data-label">Despre</div>
                            <div class="profile-data-value"><?php
                                foreach ($medical_h as $key => $item) {

                                    if ($key == count($medical_h) - 2){
                                        echo $item;
                                    }
                                }
                                ?></div>
                        </div>-->
                        <div class="profile-data-block">
                            <div class="profile-data-label">Raport medical </div>
                            <div class="profile-data-value"><?php echo $_SESSION['medical_report']; ?></div>
                        </div>
                    </div>
            </div>
            <div class="col-md-12 profile-right">
                <div class="profile-edit text-center">
                    <div class="profile-edit-button">
                        <br>
                        <a href="update_profile.php" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-hover-success button-pill" style="color: #a94442">
                            Editează informațiile contului
                            <i class="fa fa-pencil-square-o"></i>
                            <span class="mdl-button__ripple-container">
                                <span class="mdl-ripple"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Section -->

<!-- Start Make an Appointment Modal -->
<?php include('include/make_appointment.php');?><!-- End Make an Appointment Section -->
<?php include('include/footer.php');?>
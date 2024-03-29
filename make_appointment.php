
<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php

$page_name = "<i class=\"fa fa-calendar-check-o\"></i> Make An Appointment";
?>
<?php include('include/nav.php');
require ('class/doctors.php');
require ('class/appointments.php');
require ('class/departments.php');
$dpt = new departments();

$result = $dpt->all();
$departments = $result->fetchAll();

session_start();
if (!isset($_SESSION['patient_email'])) {header("Location: login.php");}
if (isset($_SESSION['admin_email'])) {header("Location: admin/appointment_add.php");}

?>




<div id="appointment">
    <div class="container" style="background-color: #229AA5; height:700px;">
        <div class="layer-wrapper">
            <div class="col-12">
                <div style="height: 80px;">
                    <h1 class="text-center text-white text-uppercase" id="head"><b>Realizează programarea</b> <i class="fa fa-calendar"></i></h1>
                </div>
                <form class="form-container col-6" action="" method="post" enctype="multipart/form-data">

                    <div class="text-center mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-building"></i>
                        <select style="padding-top:7px;" name="ap_dpt" id="ap_dpt">
                            <option value="">Alege departamentul </option>
                            <?php
                            foreach ($departments as $key=>$department) {
                                ?>
                                <option value="<?php echo $department->id;?>" id="v"><?php echo $department->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-center mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon" id="doctor_change">
                        <i class="fa fa-user-md"></i>
                        <div id="ap">Selectează doctor</div>
                        <div id="ap_doctor"></div>

                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon form-bot-check" id="date">
                        <i class="fa fa-calendar"></i>
                        <input class="mdl-textfield__input text-center" type="date" name="sum" id="date1">
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon form-bot-check" id="location">
                        <i class="fa fa-calendar"></i>
                        <div id="doctor_loc"></div>

                    </div>

                    <div class="mdl-textfield mdl-textfield--floating-label form-input-icon form-bot-check" id="time_ap">
                        <i class="fa fa-clock-o"></i>
                        <div id="ap_time"></div>
                        <?php
                            
                            foreach ($departments as $key=>$department) {
                                ?>
                                <option value="<?php echo $department->id;?>" id="v"></option>
                                <?php
                            }
                            ?>
                    </div>
                    <input type="hidden" name="id" value="--><?php echo $_SESSION['patient_id']; ?><!--">
                    <div class="form-submit text-center" id="submit">
                        <input type="submit" name="appointment_submit" id="ap_sub" value="Confirmă programarea" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<?php //include('include/make_appointment.php');?>
<?php include('include/footer.php');?>
<script>

    $('#page>a').addClass('active');
</script>
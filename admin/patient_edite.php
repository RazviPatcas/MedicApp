
<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<?php require('class/patients.php')?>
<?php require('class/doctors.php')?>
<?php require('class/departments.php')?>

    <div class="page-container">
        <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
        <script src="public/js/jquery.fancybox.min.js"></script>
        <script>
            $('#patient').show();
            $('#patient-li>a').addClass('active');
            $("a.open-pdf").fancybox({
                'frameWidth': 800,
                'frameHeight': 800,
                'overlayShow': true,
                'hideOnContentClick': false,
                'type': 'iframe'
            });
        </script>

        <form action="patient_edite.php" method="post" enctype="multipart/form-data" siq_id="autopick_5272">
            <div class="page-hdr scroll-to-fixed-fixed" style="z-index: 9; position: fixed; top: 0px; margin-left: 0px; width: 920px; left: 60px;">
                <div class="row">
                    <div class="col-6 page-name">
                        <h1><i class="fa fa-users"></i>Editează pacient</h1>
                    </div>
                    <div class="col-4 page-menu" style="padding-right: 50px">
                        <a id="cancel" href="patient.php" data-toggle="tooltip" data-placement="left" title="" data-original-title="Înapoi la listă"><i class="fa fa-reply"></i></a>
                        <button type="submit" name="patient_update" data-toggle="tooltip" data-placement="left" title="" data-original-title="Salvează"><i class="fa fa-floppy-o"></i></button>
                    </div>
                </div>
            </div>
            <div style="display: block; width: 920px; height: 70px; float: none;"></div>
            <div class="content">
                <input type="hidden" name="_token" value="">
                <div class="row">
                    <?php
                        $patient=new patients();
//                        $patient->patient_update();
                        if (isset($_GET['id'])){$id = $_REQUEST['id'];}
                        if (isset($_POST['id'])){$id = $_REQUEST['id'];}

                        $rslt = $patient->find($id);
                        $patients = $rslt->fetchAll();
                        $patient->patient_update($id);
                        foreach ($patients as $patient) {

                    ?>
                    <div class="col-sm-8">
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Informații de bază</div>
                            <div class="content-block-main">
                                <div class="row content-input">
                                    <div class="col-sm-6">
                                        <label>
                                            <text>*</text>
                                            Nume : </label>
                                        <input type="text" class="input-text" name="firstname" value="<?php echo $patient->first_name;?>"
                                               placeholder="Nume" required="">
                                        <p class="content-input-error-name">Nume</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <text>*</text>
                                            Prenume : </label>
                                        <input type="text" class="input-text" name="lastname" value="<?php echo $patient->last_name;?>"
                                               placeholder="Prenume" required="">
                                        <p class="content-input-error-name">Prenume</p>
                                    </div>
                                </div>
                                <div class="row content-input">
                                    <div class="col-sm-6">
                                        <label>
                                            <text>*</text>
                                            Email : </label>
                                        <input type="email" class="input-email" name="email" value="<?php echo $patient->email;?>"
                                               placeholder="Email" required="">
                                        <p class="content-input-error-name">Email</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <text>*</text>
                                            Telefon : </label>
                                        <input type="number" class="input-mobile" name="mobile" value="<?php echo $patient->phone;?>"
                                               placeholder="Telefon" min="1" required="">
                                        <p class="content-input-error-name">Telefon</p>
                                    </div>
                                </div>
                               <!-- <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Parolă :</label>
                                    <input type="password" class="input-password" pattern=".{6,}"
                                           title="Minim 6 cuvinte" name="password"
                                           placeholder="Parolă" required="">
                                    <p class="content-input-error-name">Please enter password (minimum 6 words)!</p>
                                    <div class="content-description"></div>
                                </div>-->
                            </div>
                        </div>
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Alte detalii</div>
                            <div class="content-block-main">
                                <div class="row content-input">
                                    <div class="col-sm-6">
                                        <label>Data nașterii : </label>
                                        <input type="text" value="<?php echo $patient->dob;?>">
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                                <div class="row content-input">
                                    <div class="col-sm-6 text-capitalize">

                                        <label>
                                            <text>*</text>
                                            Adresa : </label>
                                        <select name="location" title="Select User Role" class="select-list" required=""
                                                id="ui-id-1" style="display: none;">
                                            <option value="">Selectează orașul</option>
                                            <?php
                                            $sql = "SELECT * FROM locations ";
                                            $result = $pdo->prepare($sql);
                                            $result->execute();
                                            $locations = $result->fetchAll(); // default value PDO::FETCH_obj
                                            foreach ($locations as $location) {
                                                ?>
                                                <option value="<?php echo $location->location_id;?>"
                                                    <?php if ($location->location_id==$patient->location_id) { echo "selected";}?> >
                                                    <?php echo $location->name; ?></option>

                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Grupa de sânge : </label>
                                        <select name="bloodgroup" title="Select User Role" class="select-list"
                                                required="" id="ui-id-1" style="display: none;">
                                            <option value="">Selectează grupa de sânge</option>
                                            <option value="A+" <?php if ($patient->blood_group=='A+'){echo 'selected';} ?>>O1</option>
                                            <option value="A-" <?php if ($patient->blood_group=='A-'){echo 'selected';} ?>>A2</option>
                                            <option value="B+" <?php if ($patient->blood_group=='B+'){echo 'selected';} ?>>B3</option>
                                            <option value="B-" <?php if ($patient->blood_group=='B-'){echo 'selected';} ?>>AB4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row content-input content-radio">
                                    <div class="col-sm-12">
                                        <label>Sex : </label>
                                        <div class="content-radio-container">
                                            <div>
                                                <input type="radio" name="gender" value="Male" id="gender-male" <?php if ($patient->gender == 'Male') echo 'checked'; ?>>
                                                <label for="gender-male"><span><i class="fa fa-check"></i></span>
                                                    <p>Masculin</p></label>
                                            </div>
                                            <div>
                                                <input type="radio" name="gender" value="Female" id="gender-female" <?php if ($patient->gender == 'Female') echo 'checked'; ?>>
                                                <label for="gender-female"><span><i class="fa fa-check"></i></span>
                                                    <p>Feminin</p></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Istoric medical</div>
                            <div class="content-block-main">
                                <div class="content-radio">
                                    <label>Se va completa în cazul în care pacientul a avut una sau mai multe afecțiuni de mai jos:</label>
                                    <div>
                                        <?php
                                        $md_rpt = explode(',',$patient->medical_history);
                                        $n = count($md_rpt);
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="Diabet"

                                                        <?php
                                                        foreach ($md_rpt as $item) {

                                                            if ($item =='Diabet') echo 'checked';
                                                        }
                                                        ?>

                                                           id="Diabet">
                                                    <label for="Diabet"><span><i class="fa fa-check"></i></span>
                                                        <p>Diabet</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="Presiune arterială"
                                                        <?php  foreach ($md_rpt as $item) {

                                                            if ($item=='Presiune arterială') echo 'checked';
                                                        }
                                                        ?>
                                                           id="high-blood-pressure">
                                                    <label for="Presiune arterială"><span><i
                                                                    class="fa fa-check"></i></span>
                                                        <p>Presiune arterială</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="Colesterol"
                                                        <?php
                                                        foreach ($md_rpt as $item) {
                                                            if ($item =='Colesterol') echo 'checked';
                                                        }?>
                                                           id="Colesterol">
                                                    <label for="Colesterol"><span><i
                                                                    class="fa fa-check"></i></span>
                                                        <p>Colesterol</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="Probleme cardiace"
                                                        <?php
                                                        foreach ($md_rpt as $item) {

                                                            if ($item=='Probleme cardiace') echo 'checked';
                                                        }?>
                                                           id="Probleme cardiace">
                                                    <label for="Probleme cardiace"><span><i class="fa fa-check"></i></span>
                                                        <p>Probleme cardiace</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="Astm bronșic" id="Astm bronșic"
                                                    <?php
                                                    foreach ($md_rpt as $item) {
                                                        if ($item == 'Astm bronșic') echo 'checked';
                                                    }?>>
                                                    <label for="Astm bronșic"><span><i class="fa fa-check"></i></span>
                                                        <p>Astm</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="kidney-disease"
                                                        <?php
                                                         foreach ($md_rpt as $item) {
                                                           if ($item == 'kidney-disease') echo 'checked';
                                                        }?>
                                                           id="kidney-disease">
                                                    <label for="kidney-disease"><span><i class="fa fa-check"></i></span>
                                                        <p>Cancer</p></label>
                                                </div>
                                            </div>
                                           <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="kidney-stones"
                                                        <?php
                                                         foreach ($md_rpt as $item) {
                                                             if ($item == 'kidney-stones') echo 'checked';
                                                         }?>
                                                           id="kidney-stones">
                                                    <label for="kidney-stones"><span><i class="fa fa-check"></i></span>
                                                        <p>Pietre la rinichi</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value=""
                                                        <?php
                                                        foreach ($md_rpt as $item) {

                                                            if ($item =='hepatitis') echo 'checked';
                                                        }?>
                                                           id="hepatitis" >
                                                    <label for="hepatitis"><span><i class="fa fa-check"></i></span>
                                                        <p>Hepatită</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="rheumatic-fever"
                                                           <?php
                                                           foreach ($md_rpt as $item) {

                                                               if ($item =='rheumatic-fever') echo 'checked';
                                                           }?>
                                                           id="rheumatic-fever">
                                                    <label for="rheumatic-fever"><span><i
                                                                    class="fa fa-check"></i></span>
                                                        <p>Reutamatism</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="cancer"
                                                        <?php
                                                        foreach ($md_rpt as $item) {

                                                            if ($item =='cancer') echo 'checked';
                                                        }?>
                                                           id="cancer">

                                                    <label for="cancer"><span><i class="fa fa-check"></i></span>
                                                        <p>HIV/AIDS</p></label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="epilepsy"
                                                        <?php
                                                        foreach ($md_rpt as $item) {

                                                            if ($item =='epilepsy') echo 'checked';
                                                        }?>
                                                           id="epilepsy">
                                                    <label for="epilepsy"><span><i class="fa fa-check"></i></span>
                                                        <p>Epilepsie</p></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="content-block">
                            <div class="content-block-ttl">Istoric pacient</div>
                            <div class="content-block-main user-history">
                                <p class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appointment-modal">
                                    Programări (
                                    <?php
                                    $sql = "SELECT * FROM appointment WHERE patient_id = {$_GET['id']}";
                                    $result = $pdo->prepare($sql);
                                    $result->execute();
                                    $row = $result->rowCount();
                                    echo $row;
                                    ?>
                                    ) </p>
                               <!-- <p class="btn btn-danger btn-sm" data-toggle="modal" data-target="#report-modal">Rapoarte</p>-->
                                <p id="create" class="btn btn-default btn-sm"><a href="appointment_add.php?id=<?php $_GET['id'];?>">Crează programare</a></p>
                            </div>
                        </div>
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Pentru uz administrativ</div>
                            <div class="content-block-main">
                                <div class="content-input">
                                    <label>Rolul utilizatorului : </label>
                                    <select name="role" title="Selectează rolul" class="select-list" required=""
                                            id="ui-id-1" style="display: none;">
                                        <?php
                                        $sql = "SELECT * FROM roles ";
                                        $result = $pdo->prepare($sql);
                                        $result->execute();
                                        $roles = $result->fetchAll(); // default value PDO::FETCH_obj

                                        foreach ($roles as $role) {
                                            ?>
                                            <option value="<?php echo $role->role_id; ?>"
                                                <?php if ($role->role_id == $patient->role_id) echo "selected"?> >
                                                <p class="text-capitalize"><?php echo $role->role_name; ?></p>
                                            </option>

                                            <?php
                                        }

                                        ?>


                                    </select>
                                </div>
                                <div class="content-input">
                                    <label>Nume utilizator : </label>
                                    <input type="text" name="username" value="<?php echo $patient->user_name;?>" placeholder="Nume utilizator">
                                </div>
                                <div class="content-input">
                                    <label>Data înregistrării contului : </label>
                                    <input type="text" value="<?php echo $patient->created_at;?>" readonly="">
                                </div>

                                <div class="content-input">
                                    <label>Stare : </label>
                                    <select name="status" class="select-list" id="ui-id-2" style="display: none;">
                                        <option value="1" <?php if ($patient->status == 1) echo "selected"?>>Activ</option>
                                        <option value="0" <?php if ($patient->status == 0) echo "selected"?>>Inactiv</option>
                                    </select>

                                </div>
<!--                                <div class="content-input">-->
<!--                                    <label>Notify User : </label>-->
<!--                                    <div class="content-radio-container">-->
<!--                                        <div>-->
<!--                                            <input type="checkbox" name="sendmail" value="1" id="send-mail" checked="">-->
<!--                                            <label for="send-mail"><span><i class="fa fa-check"></i></span>-->
<!--                                                <p>Send an Email</p></label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $patient->patient_id; ?>">
                </div>

                <?php
                    }
                ?>
                <div class="content-submit text-center">
                    <button type="submit" name="patient_update" class="btn btn-primary">Save</button>
                </div>

           </div>

        </form>

        <!-- Appointment List Modal -->
        <div id="appointment-modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Patient's Appointment</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="user-appointment">
                            <div class="card-block">
                                <div class="card card-color-new">

                                    <?php

                                    $sql = "SELECT * FROM appointment WHERE patient_id = {$_GET['id']}";
                                    $result = $pdo->prepare($sql);
                                    $result->execute();
                                    $row = $result->rowCount();
                                    $appointments = $result->fetchAll();
                                    foreach ($appointments as $key => $appointment) {

                                        ?>
                                        <div class="row card-hdr">
                                            <div class="col-2 card-left text-left">
                                                <span class="text-center">1</span>
                                            </div>
                                            <div class="col-10 text-right card-right">
                                                <em>Appointment ID :</em> <span>12040<?php echo $appointment->id;?>1230</span>
                                            </div>
                                        </div>
                                        <div class="row card-bdy">
                                        <?php

                                            $doctor = new doctors();
                                            $result = $doctor->find($appointment->doctor_id);
                                            $doctors = $result->fetchAll();
                                            foreach ($doctors as $doctor) {
                                                ?>

                                                <div class="col-sm-6 text-left">
                                                    <div class="card-img">
                                                        <img class="img-thumbnail" src="../public/uploads/<?php echo $doctor->photo;?>"
                                                             alt="">
                                                    </div>
                                                    <div class="card-info">
                                                        <a class="card-name" target="_blank">Dr. <?php echo $doctor->first_name." ".$doctor->last_name;?></a>
                                                        <div class="card-text">
                                                            <?php
                                                            $dpt = new departments();
                                                            $result= $dpt->find($appointment->dpt_id);
                                                            $departments = $result->fetchAll();
                                                            foreach ($departments as $department) {
                                                                echo $department->name;
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="card-text"><?php echo $doctor->email;?></div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
 ?>
                                            <div class="col-sm-6 appointment-time text-center">
                                                <div class="appointment-date"><i class="fa fa-calendar"></i><span></span>
                                                </div>
                                                <div><i class="fa fa-hourglass-o"></i><span></span></div>
                                            </div>
                                        </div>
                                        <div class="row card-ftr">
                                            <div class="col-8 text-left">
                                                <span class="badge badge-default badge-sm"></span>
                                            </div>
                                            <div class="card-action">
                                                <a href="invoice.php"
                                                   class="btn btn-outline btn-warning btn-outline-1x btn-circle"
                                                   data-toggle="tooltip" title="" target="_blank"
                                                   data-original-title="Factură"><i
                                                            class="fa fa-credit-card"></i></a>
                                                <a href="appointment.php"
                                                   class="btn btn-outline btn-info btn-outline-1x btn-circle"
                                                   data-toggle="tooltip" title="" target=""
                                                   data-original-title="Editează"><i class="fa fa-pencil-square-o"></i></a>
                                            </div>
                                        </div>

                                        <?php
                                    }
 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Închide</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Invoice List Modal -->
        <div id="invoice-modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Patient's Invoices</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="user-appointment">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="report-modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Patient's Reports</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="report-container">
                            <p class="font-16 text-muted">No reports Found.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment side bar -->
        <div class="sidenav-background"></div>
        <script>
            $("a.open-pdf").fancybox({
                'frameWidth': 800,
                'frameHeight': 800,
                'overlayShow': true,
                'hideOnContentClick': false,
                'type': 'iframe'
            });
        </script>
        <!-- Footer -->
<?php include ('include/footer.php');?>
<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<?php
    require ('class/doctors.php');
    require ('class/departments.php');
//    require ('class/hospitals.php'); its declared in to doctors class
?>

<div class="page-container"><script>
        $('#themeoption').show();
        $('#themeoption-li>a').addClass('active');</script>


    <form action="add_doctors.php" method="post" enctype="multipart/form-data" >
        <div class="page-hdr scroll-to-fixed-fixed" style="z-index: 9; position: fixed; top: 0px; margin-left: 0px; width: 920px; left: 60px;">
            <div class="row">
                <div class="col-6 page-name">
                    <h1><i class="fa fa-user-md"></i>Adaugă doctori</h1>
                </div>
                <div class="col-4 page-menu" style="padding-right: 50px">
                    <a id="cancel" href="doctors.php" data-toggle="tooltip" data-placement="left" title="" data-original-title="Înapoi la listă"><i class="fa fa-reply"></i></a>
                    <button type="submit" name="doctor_submit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Salvează"><i class="fa fa-floppy-o"></i></button>
                </div>
            </div>
        </div><div style="display: block; width: 920px; height: 70px; float: none;"></div>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <?php
                        $doct = new doctors();
                        $doct->add();
                    ?>
                    <div class="content-block content-block-horizantal">
                        <div class="content-block-ttl">Informații de bază</div>
                        <div class="content-block-main">
                            <input type="hidden" name="_token" value="413cf0188">
                            <div class="content-input row">
                                <div class="col-6">
                                    <label><text>*</text>Nume : </label>
                                    <input type="text" class="input-text" name="firstname" value="" placeholder="Nume" required>
                                    <p class="content-input-error-name">Nume</p>
                                </div>
                                <div class="col-6">
                                    <label><text>*</text>Prenume : </label>
                                    <input type="text" class="input-text" name="lastname" value="" placeholder="Prenume" required>
                                    <p class="content-input-error-name">Prenume</p>
                                </div>

                            </div>
                            <div class="content-input">
                                <label><text>*</text>Poză : </label>
                                    <input type="file" name="doctor_picture" value="">
                                <div class="content-description">530px * 470px</div>
                            </div>
                            <div class="content-input">
                                <label><text>*</text>Email : </label>
                                <input type="email" class="input-email" name="email" value="" placeholder="Email" required="">
                                <p class="content-input-error-name">Email</p>
                            </div>
                            <div class="content-input">
                                <label><text>*</text>Telefon : </label>
                                <input type="number" class="input-mobile" name="mobile" value="" placeholder="Telefon" required="">
                                <p class="content-input-error-name">Telefon</p>
                            </div>
                            <div class="row content-radio col-12">
                                <div class="content-radio-container col-sm-6">
                                    <div class="">
                                        <label> Sex : </label>
                                    </div>
                                    <div>
                                        <input type="radio" name="gender" value="Masculin" id="gender-male">
                                        <label for="gender-male"><span><i class="fa fa-check"></i></span><p>Masculin</p></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="gender" value="Feminin" id="gender-female">
                                        <label for="gender-female"><span><i class="fa fa-check"></i></span><p>Feminin</p></label>
                                    </div>
                                </div>
    <!--                            <div class="col-sm-6">
                                        <div class="content-input">
                                            <label><text>*</text>Doctors Age : </label>
                                            <input type="number" name="age" placeholder="Enter Doctor Age .">
                                        </div>
                                    </div>-->
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="content-input">
                                        <label><text>*</text>Departament : </label>
                                        <select name="department" class="select-list" required="" title="Selectează departament" id="ui-id-1" style="display: none;">
                                            <option class="text-capitalize text-info " >Selectează departamen:</option>
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
                                </div>
                                <div class="col-sm-6">
                                    <div class="content-input">
                                        <label><text>*</text>Spital/Clinică : </label>
                                        <select name="chamber" id="ui-id-2" class="select-list" required="" style="display: none;">
                                            <option class="text-capitalize text-info " >Spital/Clinică :</option>
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
                                </div>
                                <div class="content-input col-12">
                                    <label><text>*</text>Stare : </label>
                                    <select name="status" id="ui-id-3" class="select-list" style="display: none;">
                                        <option value="0">Inactiv</option>
                                        <option value="1">Activ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-block content-block-horizantal">
                        <div class="content-block-ttl">Alte informații</div>
                        <div class="content-block-main">
                          <!--  <div class="content-input">
                                <label>Position : </label>
                                <input type="text" name="position" value="" placeholder="position">
                            </div>-->
                            <div class="content-input">
                                <label><text>*</text>Studiile finalizate : </label>
                                <input type="text" class="input-text" name="degree" value="" placeholder="Studii finalizate" required="">
                                <p class="content-input-error-name">Studii</p>
                            </div>

                            <div class="content-input">
                                <label><text>*</text>Experiență (ani) : </label>
                                <input type="number" class="input-number" name="experience" value="" placeholder="Experiență (ani)" required="">
                                <p class="content-input-error-name">Experiență (ani)</p>
                            </div>

                            <div class="content-input">
                                <label><text>*</text>Nume utilizator : </label>
                                <input type="text" name="username" value="" placeholder="Nume utilizator">
                            </div>
                            <div class="content-input">
                                <label><text>*</text>Parolă : </label>
                                <input type="text" name="password" value="" placeholder="Parolă">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-block">
                <div class="content-block-ttl">Informații programări</div>
                <div class="content-block-main">
                    <div class="row bottom-border-1x content-block-horizantal">
                        <div class="col-sm-6">
                            <div class="content-input">
                                <label>Start timp programare:</label>
                                <input type="time" name="st" value="" placeholder="Start timp programare">
                                <p class="content-input-error-name">Selectează intervalul de timp</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="content-input">
                                <label>Sfârșit timp programare:</label>
                                <input type="time" name="et" value="" placeholder="Sfârșit timp programare">
                                <p class="content-input-error-name">Selectează intervalul de timp</p>
                            </div>
                        </div>
                    </div>

                    <!--<div class="content-input">
                        <label>Time Slot :<br>( in Minutes)</label>
                        <input type="number" name="slot" value="" placeholder="Slot">
                        <p class="content-input-error-name">Please enter time slot!</p>
                    </div>-->
                    <div class="content-input weekly-container">
                        <label>Zile libere : </label>
                        <select name="week_end" id="doctor-list" multiple="multiple">
                            <option value="Monday">Luni</option>
                            <option value="Tuesday">Marți</option>
                            <option value="Wednesday">Miercuri</option>
                            <option value="Thursday">Joi</option>
                            <option value="Friday">Vineri</option>
                            <option value="Saturday">Sâmbătă</option>
                            <option value="Sunday">Duminică</option>
                        </select>
                        <p class="content-description">Flosește tasta CTRL pentu selectare multiplă </p>
                    </div>

                </div>
            </div>
            <input type="hidden" name="id" value="">
            <div class="content-submit text-center">
                <button type="submit" name="doctor_submit" class="btn btn-primary">Salvare</button>
            </div>

        </div>
    </form>

    <!-- Footer -->
<?php include ('include/footer.php');?>
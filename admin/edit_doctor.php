
<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<?php
require ('class/doctors.php');
require ('class/departments.php');

?>
<div class="page-container"><script>
            $('#themeoption-li>a').addClass('active');</script>


        <form action="edit_doctor.php" method="post" enctype="multipart/form-data" siq_id="autopick_3118">
            <div class="page-hdr scroll-to-fixed-fixed" style="z-index: 9; position: fixed; top: 0px; margin-left: 0px; width: 920px; left: 60px;">
                <div class="row">
                    <div class="col-6 page-name">
                        <h1><i class="fa fa-user-md"></i>Editează doctori</h1>
                    </div>
                    <div class="col-4 page-menu" style="padding-right: 50px">
                        <a id="cancel" href="doctors.php" data-toggle="tooltip" data-placement="left" title="" data-original-title="Back to List"><i class="fa fa-reply"></i></a>
                        <button type="submit" name="doctor_update" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update Doctor"><i class="fa fa-floppy-o"></i></button>
                    </div>
                </div>
            </div><div style="display: block; width: 920px; height: 70px; float: none;"></div>
            <div class="content">
                <?php
                $doct = new doctors();
                $doct->update();
                if (isset($_GET['id'])) $id = $_GET['id'];
                if (isset($_POST['id'])) $id = $_POST['id'];
                $rslt = $doct->find($id);
                $doctors = $rslt->fetchAll();

                foreach ( $doctors as $doctor) {

                ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Informații de bază</div>
                            <div class="content-block-main">
                                <input type="hidden" name="_token" value="413cf0188">
                                <div class="content-input row">
                                    <div class="col-6">
                                        <label>
                                            <text>*</text>
                                            Nume : </label>
                                        <input type="text" class="input-text" name="firstname" value="<?php echo $doctor->first_name;?>"
                                               placeholder="First Name" required>
                                        <p class="content-input-error-name">Introdu numele doctorului ! </p>
                                    </div>
                                    <div class="col-6">
                                        <label>
                                            <text>*</text>
                                            Prenume : </label>
                                        <input type="text" class="input-text" name="lastname" value="<?php echo $doctor->last_name;?>"
                                               placeholder="Last Name" required>
                                        <p class="content-input-error-name">Introdu prenumele doctorului !</p>
                                    </div>

                                </div>
                                <div class="content-input">
                                    <img src="../public/uploads/<?php echo $doctor->photo;?>" alt="Photo not Found!!" style="height: 60px">
                                    <label><text>*</text>Poză : </label>
                                    <input type="file" name="doctor_picture" value="">
                                </div>
                                <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Email : </label>
                                    <input type="email" class="input-email" name="email" value="<?php echo $doctor->email;?>" placeholder="email"
                                           disabled>
                                    <p class="content-input-error-name">Introdu emailul doctorului !</p>
                                </div>
                                <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Telefon : </label>
                                    <input type="number" class="input-mobile" name="mobile" value="<?php echo $doctor->phone;?>"
                                           placeholder="mobile" required="">
                                    <p class="content-input-error-name">Introdu telefonul doctorului !</p>
                                </div>
                                <div class="row content-radio col-12">
                                    <div class="content-radio-container col-sm-6">
                                        <div class="">
                                            <label> Sex : </label>
                                        </div>
                                        <div>
                                            <input type="radio" name="gender" value="Male" id="gender-male"
                                                <?php if ($doctor->gender=='Male') echo 'checked';?>>
                                            <label for="gender-male"><span><i class="fa fa-check"></i></span>
                                                <p>Masculin</p></label>
                                        </div>
                                        <div>
                                            <input type="radio" name="gender" value="Female" id="gender-female"
                                                <?php if ($doctor->gender=='Female') echo 'checked';?>>
                                            <label for="gender-female"><span><i class="fa fa-check"></i></span>
                                                <p>Feminin</p></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="content-input">
                                            <label>
                                                <text>*</text>
                                               Vărstă : </label>
                                            <input type="number" name="age" placeholder="" value="<?php echo $doctor->age;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="content-input">
                                            <label><text>*</text>Departament : </label>
                                            <select name="department" class="select-list" required=""
                                                    title="Departament" id="ui-id-1"
                                                    style="display: none;">

                                                <?php

                                                $dpt = new departments();
                                                $result = $dpt->all();
                                                $departments = $result->fetchAll(); 

                                                foreach ($departments as $department) {
                                                    ?>
                                                    <option class="text-capitalize text-info" value="<?php echo $department->id; ?>"
                                                        <?php if ($doctor->department_id == $department->id) echo 'selected';?>>
                                                        <?php echo $department->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="content-input">
                                            <label>
                                                <text>*</text>
                                                Clinică/Spital : </label>
                                            <select name="chamber" id="ui-id-2" class="select-list" required=""
                                                    style="display: none;">
                                                <option class="text-capitalize text-info ">Selectează Clinică/Departament :
                                                </option>
                                                <?php

                                                $hsptl = new hospitals();
                                                $result = $hsptl->all();

                                                $hospitals = $result->fetchAll(); // default value PDO::FETCH_obj

                                                foreach ($hospitals as $hospital) {
                                                    ?>
                                                    <option class="text-capitalize text-info" value="<?php echo $hospital->id; ?>"
                                                        <?php if ($doctor->hospital_id==$hospital->id) echo 'selected';?>>
                                                        <?php echo $hospital->name; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="content-input col-12">
                                        <label>
                                            <text>*</text>
                                            Disponibilitate : </label>
                                        <select name="status" id="ui-id-3" class="select-list" style="display: none;">
                                            <option value="0" <?php if ($doctor->status==0) echo 'selected';?> >Inactiv</option>
                                            <option value="1" <?php if ($doctor->status==1) echo 'selected';?>>Activ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Informații suplimentare</div>
                            <div class="content-block-main">
<!--                                <div class="content-input">
                                    <label>Position : </label>
                                    <input type="text" name="position" value="<?php echo $doctor->position;?>" placeholder="position">
                                </div>-->
                                <div class="content-input">
                                    <label> Rol utilizator : </label>
                                    <select name="role" title="Select User Role" class="select-list" required=""
                                            id="ui-id-1" style="display: none;">
                                        <?php
                                        $sql = "SELECT * FROM roles ";
                                        $result = $pdo->prepare($sql);
                                        $result->execute();
                                        $roles = $result->fetchAll();

                                        foreach ($roles as $role) { ?>
                                            <option value="<?php echo $role->role_id; ?>"
                                                <?php if ($role->role_id == $doctor->role_id) echo "selected"?> >
                                                <p class="text-capitalize"><?php echo $role->role_name; ?></p>
                                            </option>
                                            <?php }   ?>
                                    </select>
                                     </div>

                                <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Studii : </label>
                                    <input type="text" class="input-text" name="degree" value="<?php echo $doctor->degree;?>" placeholder=""
                                           required="">
                                    <p class="content-input-error-name">Introdu studiile doctorului !</p>
                                </div>
                                <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Experiență : </label>
                                    <input type="number" class="input-number" name="experience" value="<?php echo $doctor->experience; ?>"
                                           placeholder="" required="">
                                    <p class="content-input-error-name"></p>
                                </div>
                                <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Nume utilizator : </label>
                                    <input type="text" name="" value="<?php echo $doctor->username;?>">
                                </div>
                               <!-- <div class="content-input">
                                    <label>
                                        <text>*</text>
                                        Password : </label>
                                    <input type="text" name="password" value="" placeholder="Awards">
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-block">
                    <div class="content-block-ttl">Informații programare</div>
                    <div class="content-block-main">
                        <div class="row bottom-border-1x content-block-horizantal">
                            <div class="col-sm-6">
                                <div class="content-input">
                                    <label>Oră început:</label>
                                    <input type="time" name="st" value="<?php echo $doctor->start_appointment;?>" placeholder="">
                                    <p class="content-input-error-name"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="content-input">
                                    <label>Oră sfârșit:</label>
                                    <input type="time" name="et" value="<?php echo $doctor->end_appointment;?>" placeholder="">
                                    <p class="content-input-error-name"></p>
                                </div>
                            </div>
                        </div>

                        <div class="content-input weekly-container">
                            <label>Zile libere : </label>
                            <select name="week_end" id="doctor-list" multiple="multiple">
                                <option value="Luni" <?php if ($doctor->week_end=='Luni') echo 'selected';?>>Luni</option>
                                <option value="Marți" <?php if ($doctor->week_end=='Marți') echo 'selected';?>>Marți</option>
                                <option value="Miercuri" <?php if ($doctor->week_end=='Miercuri') echo 'selected';?>>Miercuri</option>
                                <option value="Joi" <?php if ($doctor->week_end=='Joi') echo 'selected';?>>Joi</option>
                                <option value="Vineri" <?php if ($doctor->week_end=='Vineri') echo 'selected';?>>Vineri</option>
                                <option value="Sâmbătă" <?php if ($doctor->week_end=='Sâmbătă') echo 'selected';?>>Sâmbătă</option>
                                <option value="Duminică" <?php if ($doctor->week_end=='Duminică') echo 'selected';?>>Duminică</option>
                            </select>
                            <p class="content-description">Pentru selectare multiplă folosiți CTRL</p>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $doctor->id;?>">
                <div class="content-submit text-center">
                    <button type="submit" name="doctor_update" class="btn btn-primary">Actualizează</button>
                </div>

            </div>
            <?php
            }
            ?>
        </form>

        <!-- Footer -->
    <?php include('include/footer.php'); ?>

<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
    require ('class/doctors.php');
    require ('class/departments.php');
    $doct = new doctors();

    $page_name = "<i class='fa fa-user-md'> </i> Doctori";
?>
    <?php include('include/nav.php');
?>

<div class="layer-stretch animated-wrapper" style="opacity: 1;">
    <div class="layer-wrapper layer-bottom-0">
        <div class="row text-center">
            <div class="col-md-8">
                <div class="row">

                    <?php

                        if (isset($_SESSION['patient_email'])) {

                            $result = $doct->find_doctors_by_location($_SESSION['location_id']);

                            $doctors = $result->fetchAll();
                            if ($result->rowCount() > 0) {
                                foreach ($doctors as $doctor) {
                                    ?>

                                    <div class="col-sm-6">
                                        <div class="theme-block theme-block-hover animated animated-up">
                                            <div class="theme-block-picture" style="height: auto;">
                                                <a href="doctor_details.php?id=<?php echo $doctor->id; ?>">
                                                    <img src="public/uploads/<?php echo $doctor->photo; ?>"
                                                         style="height: auto;;"
                                                         alt="<?php echo $doctor->first_name . " " . $doctor->last_name ?>">
                                                </a>
                                            </div>
                                            <div class="theme-block-data service-block-data" style= "background-color:#33c1cd;">
                                                <h3 class="text-capitalize" style="height: auto;">
                                                    <a href="doctor_details.php?id=<?php echo $doctor->id; ?>"
                                                       style=" color: #fff; font-size: 20px;">
                                                        <b>Dr. <?php echo $doctor->first_name . " " . $doctor->last_name . "<br>"; ?></b>
                                                        <?php
                                                           $id = $doctor->department_id;
                                                           $doct->doctor_dpt($id);
                                                            ?> <br>
                                                        <p class="text-capitalize"
                                                           style="font-family: 'Harlow Solid Italic'; color: #0b0b0b;">

                                                        </p>
                                                        <hr style="color:#fff;">
                                                            <?php
                                                            $hospital = new hospitals();
                                                            $hospital->find($doctor->hospital_id);
                                                            ?>

                                                        <p class="text-capitalize" style="font-family: 'Harlow Solid Italic'; color: #0b0b0b; ">

                                                        </p>

                                                    </a>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>

                                    <?php
                                }
                            }
                            $result1 = $doct->remaining_doctors_after_finding_by_location($_SESSION['location_id']);
                            $doctorss = $result1->fetchAll();

                            if ($result1->rowCount() > 0) {
                                foreach ($doctorss as $doctor) {
                                    ?>

                                    <div class="col-sm-6">
                                        <div class="theme-block theme-block-hover animated animated-up">
                                            <div class="theme-block-picture" style="height: auto">
                                                <a href="doctor_details.php?id=<?php echo $doctor->id; ?>">
                                                    <img src="public/uploads/<?php echo $doctor->photo; ?>"
                                                         style="height: auto;"
                                                         alt="<?php echo $doctor->first_name . " " . $doctor->last_name ?>">
                                                </a>
                                            </div>
                                            <div class="doctor-name">
                                                <h4 class="text-capitalize" style="height: auto;">
                                                    <a href="doctor_details.php?id=<?php echo $doctor->id; ?>"
                                                       style="color: #fff;font-size: 20px;">
                                                        <b>Dr. <?php echo $doctor->first_name . " " . $doctor->last_name . "<br>"; ?></b>
                                                        <?php echo $doctor->degree . "<br>"; ?>
                                                        <p class="text-capitalize"
                                                           style="font-family: 'Harlow Solid Italic'; color: #fff">
                                                            <?php
                                                            $id = $doctor->department_id;
                                                            $doct->doctor_dpt($id);

                                                            ?>
                                                        </p>
                                                        <hr style="color:#fff;">
                                                        <p class="text-capitalize"
                                                           style="font-family: Rockwell; color: #050092;height: 30px;">
                                                            <?php
                                                            $hospital = new hospitals();
                                                            $hospital->find($doctor->hospital_id);
                                                            ?>
                                                        </p>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>

                                    <?php
                                }
                            }
                        }else {

                            $result1 = $doct->all();
                            $doctorss = $result1->fetchAll();

                            if ($result1->rowCount() > 0) {
                                foreach ($doctorss as $doctor) {
                                    ?>

                                    <div class="col-sm-6">
                                        <div class="theme-block theme-block-hover animated animated-up">
                                            <div class="theme-block-picture" style="height: auto;">
                                                <a href="doctor_details.php?id=<?php echo $doctor->id; ?>">
                                                    <img src="public/uploads/<?php echo $doctor->photo; ?>"
                                                         style="height: auto;"
                                                         alt="<?php echo $doctor->first_name . " " . $doctor->last_name ?>">
                                                </a>
                                            </div>
                                            <div class="doctor-name">
                                                <h4 class="text-capitalize" style="height: auto;">
                                                    <a href="doctor_details.php?id=<?php echo $doctor->id; ?>"
                                                       style="color: #fff;font-size: 20px;">
                                                        <b>Dr. <?php echo $doctor->first_name . " " . $doctor->last_name . "<br>"; ?></b>
                                                        <br>
                                                        <?php
                                                           $id = $doctor->department_id;
                                                           $doct->doctor_dpt($id);
                                                            ?> 
                                                            <br>
                                                        <p class="text-capitalize"
                                                           style="font-family: 'Harlow Solid Italic'; color: #0b0b0b;">

                                                        </p>
                                                        <hr style="color:#fff;">
                                                        <p class="text-capitalize"
                                                           style="font-family: Rockwell; color: #ffff;height: 30px;">
                                                            <?php
                                                            $hospital = new hospitals();
                                                            $hospital->find($doctor->hospital_id);
                                                            ?>
                                                        </p>
                                                        
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>

                                    <?php
                                }
                            }
                        }
                        ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="theme-material-card text-center">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input ">
                        <input class="mdl-textfield__input" type="text" id="search-doctors">
                        <label class="mdl-textfield__label" for="search-doctors" style="font-size: 12px"> </label>
                        <button type="submit" class="fa fa-search search-button" name="search"></button>
                    </div>
                </div>

                <div class="theme-material-card">
                    <div class="sub-ttl">Departamentele noastre</div>
                    <div class="flexslider theme-flexslider">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 100%; transition-duration: 0s; transform: translate3d(-391px, 0px, 0px);">

                                <?php
                                $dpt = new departments();
                                $result = $dpt->all();
                                $departments = $result->fetchAll();

                                if ($result->rowCount()>0) {
                                    foreach ($departments as $department) {


                                        ?>
                                        <li class="clone" aria-hidden="true"
                                            style="width: 391px; margin-right: 0px; float: left; display: block;">
                                            <div class="theme-flexslider-container">
                                                <img src="public/uploads/<?php echo $department->photo;?>" draggable="false">
                                                <h4><?php echo $department->name;?></h4>
                                                <a href="  " class="anchor-icon pull-right">Mai multe... <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <ol class="flex-control-nav flex-control-paging"><li><a href="#" class="flex-active">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li><a href="#">6</a></li></ol><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colored-background" style = "background-color: #219aa5;">
	<div class="layer-stretch">
		<div class="layer-wrapper layer-bottom-0 animated-wrapper">
			<div class="layer-ttl layer-ttl-white">
				<h3 class="animated animated-down" style="background-color: #00263b;"> Departamente </h3>
			</div>
			<div class="layer-container">
                <?php
                    $dpt = new departments();
                    $result = $dpt->all();
                    $departments = $result->fetchAll();

                    if ($result->rowCount()>0){
                        foreach ($departments as $department) {

                            ?>
                    <div class="department-block animated animated-up">
                        <div class="tbl-cell department-icon"><i class="fa fa-male"></i></div>
                        <div class="tbl-cell department-detail">
                            <a><?php echo $department->name;?></a>
                            <p class="paragraph-small paragraph-white">
                                <?php echo $department->details;?>
                            </p>
                        </div>
                    </div>

                <?php
                        }
                    }
                ?>
            </div>
		</div>
	</div>
</div>


<?php include('include/make_appointment.php');?>

<?php include('include/footer.php');?>
<script>

    $('#doctor>a').addClass('active');
</script>


<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
//require_once ('class/hospitals.php');
require ('class/doctors.php');
require('class/departments.php');
$doct = new doctors();

$hsptl = new  hospitals();

$page_name = "<i class=\"fa fa-hospital-o\"> </i> Hospitals ";
?>
<?php include('include/nav.php');?>

<div class="layer-stretch animated-wrapper" style="opacity: 1;background-color: #fff">
    <div class="layer-wrapper layer-bottom-0">
        <div class="row text-center">
            <div class="col-md-8">
                <div class="row">

                    <?php
                    session_start();
                    if (isset($_SESSION['patient_email'])) {
                        $id = $_SESSION['location_id'] ;
                        $result = $hsptl->AllAccordingToPatientLOcation($id);
                    }else{
                        $result = $hsptl->all();
                    }

                        $hospitals = $result->fetchAll();
                    if ($result->rowCount()>0 ){
                        foreach ($hospitals as $hospital) {
                            ?>

                            <div class="col-sm-6">
                            <div class="theme-block animated animated-up">
                                    <div class="theme-block-picture" style="height: auto">
                                        <a href="">
                                            <img src="public/uploads/<?php echo $hospital->photo;?>"  alt="<?php echo $doctor->name; ?>">
                                        </a>
                                    </div>
                                    <div class="theme-block-data service-block-data">

                                        <h3 class="text-capitalize" style="height: 150px">
                                            <a href="hospital_details.php?id=<?php echo $hospital->id; ?>"
                                               style="color: black;font-size:25px;">
                                                <b> <?php echo $hospital->name; ?></b>
                                                <p class="text-capitalize" style="font-family: 'Harlow Solid Italic'; color: #0b0b0b">
                                                    <?php echo $hospital->address; ?>
                                                </p>
                                                <div class="theme-block-hidden service-hidden-block">
                                                <i class="fa fa-stethoscope"></i>
                                        <h4>
                                            <a href="hospital_details.php?id==<?php echo $hospital->id;?>"><?php echo $hospital->name;?></a>
                                        </h4>
                                
                                        </h4>
                                    </div>
                                </div>

                            </div>

                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="theme-material-card text-center">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input ">
                        <input class="mdl-textfield__input" type="text" id="search-doctors">
                        <label class="mdl-textfield__label" for="search-doctors" style="font-size: 12px">Spital/Clinica </label>
                        <button type="submit" class="fa fa-search search-button" name="search"></button>
                    </div>
                </div>

                <div class="theme-material-card">
                    <div class="sub-ttl">Departamente disponibile</div>
                    <div class="flexslider theme-flexslider">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1600%; transition-duration: 0s; transform: translate3d(-391px, 0px, 0px);">

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
                                                <a href="  " class="anchor-icon pull-right">Mai multe... <i
                                                            class="fa fa-arrow-right"></i></a>
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


<?php include('include/make_appointment.php');?>
<?php include('include/footer.php');?>
<script>

    $('#hospital>a').addClass('active');
</script>

<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php require ('class/doctors.php');?>
<?php require ('class/departments.php');?>
<?php require ('class/patients.php');?>
<?php //require ('class/hospitals.php');?>


<body>
    <!-- Start Header Section -->
    <header id="header-transparent">
        <div class="layer-stretch hdr-center pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-lg-3 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <div class="hdr-center-account text-left p-0">
                        <?php
                        session_start();
                        if (isset($_SESSION['admin_name'])){
                            ?>
                            <a href="admin" class="font-20 text-uppercase"><b>Administrator</b></a>
                            <?php
                        }elseif (isset($_SESSION['patient_email'])){ ?>

                            <a href="my_appointment.php" class="font-18 text-uppercase color-white"><i class="fa fa-plus-square-o"></i> Programări </a>

                        <?php }elseif (isset($_SESSION['doctor_email'])){ ?>
                            <a href="my_patients.php?id=<?php echo $_SESSION['doctor_id']; ?>" class="font-18 text-uppercase color-white"><i class="fa fa-wheelchair"></i> Pacienți </a>

                        <?php }
                        else {
                            ?>
                           <!-- <a href="login.php?route=login" class="font-14"><i class="fa fa-sign-in"></i>Autenti</a>
                            <a href="register.php?route=register" class="font-14"><i class="fa fa-user-o"></i>Înregistrare</a>-->
                            <?php
                        }
                            ?>
                    </div>
                </div>
                <div class="col-lg-5">
					<div class="text-center text-danger">
					</div>
                </div>
                <div class="col-lg-4 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="pull-right">
                        <ul class="social-list social-list-white">
                          	<li><a href="" target="_blank" id="hdr-facebook" class="fa fa-facebook rounded"></a><span class="mdl-tooltip mdl-tooltip--bottom" for="hdr-facebook">Facebook</span></li>
                           	<li><a href="" target="_blank" id="hdr-twitter" class="fa fa-twitter rounded"></a><span class="mdl-tooltip mdl-tooltip--bottom" for="hdr-twitter">Twitter</span></li>
                           	<li><a href="" target="_blank" id="hdr-instagram" class="fa fa-instagram rounded"></a><span class="mdl-tooltip mdl-tooltip--bottom" for="hdr-instagram">Instagram</span></li>
                           	<li><a href="" target="_blank" id="hdr-linkedin" class="fa fa-linkedin rounded"></a><span class="mdl-tooltip mdl-tooltip--bottom" for="hdr-linkedin">Linkedin</span></li>
                       	</ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-transparent-menu" style="background-color:#00263b;">
            <div class="hdr layer-stretch" >
                <div class="row align-items-center justify-content-end" >

                    <!-- Start Menu Section -->
                    <ul class="col menu text-left">
                      <!--  <li><a href="/" id="menu-home" class="font-18 text-uppercase color-white"><i class="fa fa-home"></i></a></li>-->
						<li><a href="doctors.php" id="menu-doctor" class="mdl-button mdl-js-button mdl-js-ripple-effect">Doctori</a></li>
                        <li><a href="hospital.php" id="menu-hospital" class="mdl-button mdl-js-button mdl-js-ripple-effect">Spitale</a></li>
                        <li><a href="department.php" id="menu-department" class="mdl-button mdl-js-button mdl-js-ripple-effect">Departamente</a></li>
                        <li>
                            <a id="menu-pages" class="mdl-button mdl-js-button mdl-js-ripple-effect">Despre <i class="fa fa-chevron-down"></i></a>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-pages">
                                <li class="mdl-menu__item"><a href="contact.php">Contact</a></li>
                                <li class="mdl-menu__item"><a href="service.php">Serviciile noastre</a></li>
                           
                            </ul>
                        </li>
					</ul>

					<ul class="col menu ">
						<li><a href="admin" id="menu-admin" class="mdl-button mdl-js-button mdl-js-ripple-effect btn btn-success">Administrator</a></li>

                        <li>
                            <a id="menu-profile" class="mdl-button mdl-js-button mdl-js-ripple-effect">

                                <?php
                                if (isset($_SESSION['admin_name'])){?>
                                    <i class="fa fa-user-secret color-green"></i>
                                    <?php echo $_SESSION['admin_name'];

                                }else if (isset($_SESSION['doctor_email'])){?>
                                    <i class="fa fa-user-md color-green"></i>
                                    <?php  echo $_SESSION['doctor_username'];

                                }else if (isset($_SESSION['patient_email'])){ ?>
                                    <i class="fa fa-user-o color-blue"></i>
                                    <?php  echo $_SESSION['patient_username'];

                               }else { ?> <i class="fa fa-user-o color-white"></i> Profil <?php } ?>

                                <i class="fa fa-chevron-down"></i></a>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-profile">
                                <?php
                                    if (isset($_SESSION['admin_name'])){
                                        ?>
                                        <li class="mdl-menu__item">
                                            <a href="admin/profile.php"> <i class="fa fa-user-circle-o color-green"> </i> Profil</a>
                                        </li>
                                        <li class="mdl-menu__item">
                                            <a href="admin/include/logout.php"><i class="fa fa-sign-out color-green"> </i>  Ieșire</a>
                                        </li>
                                        <li class="mdl-menu__item">
                                            <a href="about.php"><i class="fa fa-address-book color-green" > </i> Despre</a>
                                        </li>

                                        <?php }
                                        else if (isset($_SESSION['doctor_email'])) {
                                        ?>

                                            <li class="mdl-menu__item">
                                                <a href="doctor_profile.php"> <i class="fa fa-user-circle color-green"> </i> Profil </a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="update_doctor_profile.php"><i class="fa fa-user-plus color-green"> </i> Actualizare</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="my_patients.php?id=<?php echo $_SESSION['doctor_id']; ?>"><i class="fa fa-plus-circle color-green"> </i> Pacienți</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="include/logout.php"><i class="fa fa-sign-out color-green"> </i> Ieșire</a>
                                            </li>


                                            <?php }else if (isset($_SESSION['patient_email'])) {
                                        ?>

                                            <li class="mdl-menu__item">
                                                <a href="profile.php"> <i class="fa fa-user-circle color-green"> </i> Profil</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="update_profile.php"><i class="fa fa-user-plus color-green"> </i> Actualizare</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="my_appointment.php"><i class="fa fa-plus-circle color-green"> </i> Consultațiile mele</a>
                                            </li>
<!--                                            <li class="mdl-menu__item">-->
<!--                                                <a href="my_request.php?id=--><?php //echo $_SESSION['patient_id'];?><!--"><i class="fa fa-qrcode color-green"> </i> My Request</a>-->
<!--                                            </li>-->
                                            <li class="mdl-menu__item">
                                                <a href="my_medical_history.php"><i class="fa fa-hospital-o color-green"> </i> Istoric medical</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="include/logout.php"><i class="fa fa-sign-out color-green"> </i> Ieșire</a>
                                            </li>


                                            <?php }else{ ?>


                                            <li class="mdl-menu__item">
                                                <a href="login.php"><i class="fa fa-sign-in color-green"></i> Autentificare</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="register.php"><i class="fa fa-user-o color-green"></i> Inregistrare</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="forget_pass.php"><i class="fa fa-key color-green"></i> Ai uitat parola?</a>
                                            </li>
                                            <li class="mdl-menu__item">
                                                <a href="about.php"><i class="fa fa-key color-green"></i> Ajutor</a>
                                            </li>

                                            <?php }   ?>
							</ul>
                        </li>


                        <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                    </ul>
                    <div id="menu-bar" class="col-2 col-md-auto"><a><i class="fa fa-bars color-white"></i></a></div>
                </div>
            </div>
        </div>
    </header>
<!----------------------------------------- End Header Section ----------------------------------------->


<!----------------------------------------- Start Slider Section ----------------------------------------->


<div id="slider" class="slider-1 slider-2"> 

	<div class="flexslider slider-wrapper">
		<ul class="slides">
			<li>
				<div class="slider-info">
					<h1 class="animated fadeInDown">Medic App</h1>
					<p class="animated fadeInDown">Viitorul programărilor medicale online</p>

                </div>
                <div class="slider-backgroung-image" style="background-image: url(public/uploads/slider.jpg); "></div>

            </li>
			<li>
				<div class="slider-info">
					<h2>Un management complet dedicat pacienților</h2>
				</div>
                <div class="slider-backgroung-image" style="background-image: url(public/uploads/slider-2.jpg);"></div>

            </li>
			<li>
				<div class="slider-info">
                    <h2>Realizează o programare online de oriunde</h2>
                </div>
                <div class="slider-backgroung-image" style="background-image: url(public/uploads/slider-3.jpg);"></div>

            </li>
		</ul>

			<div class="slider-appointment" >
				<!--<a href="make_appointment.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect animated fadeInUp">Realizează o programare</a>-->
                <a href="make_appointment.php" style="background-color: #00c292" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect animated fadeInUp">Realizează o programare</a>

            </div>
	</div>
</div>
<!-- Start Home Service Section -->
<div id="" class="">
	<div class="layer-stretch">
		<div class="" style="height: 25px">

		</div>
	</div>
</div>
<!-- Start Home About Section -->
<div id="hm-about" class="colored-background" style="background:#229AA5;">
	<div class="layer-stretch">
		<div class="layer-wrapper animated-wrapper">
			<div class="layer-ttl layer-ttl-white">
				<h3 class="animated animated-down" style="background-color: #00263b;">Departamentele noastre</h3>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="hm-about-block">
                        <a href="doctors.php">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-user-md"></i></div>
						<div class="tbl-cell hm-about-number">
							<span>
                                <?php
                                $doctor = new doctors();
                                echo $doctor->count();
                                ?>
                            </span>
							<p>Doctori</p>
						</div>
                        </a>
					</div>
					<div class="hm-about-block">
                        <a href="hospital.php">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-hospital-o"></i></div>
						<div class="tbl-cell hm-about-number">
							<span>
                                <?php
                                $hos = new hospitals();
                                echo $hos->count();
                                ?>
                            </span>
							<p>Spitale</p>
						</div>
                        </a>
					</div>

					<div class="hm-about-block">
						<div class="tbl-cell hm-about-icon"><i class="fa fa-users"></i></div>
						<div class="tbl-cell hm-about-number">
							<span>
                                <?php
                                    $patient = new patients();
                                    echo $patient->count();
                                ?>
                            </span>
							<p>Pacienți</p>
						</div>
					</div>
                    <div class="hm-about-block">

                        <a href="department.php">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-building-o"></i></div>
                        <div class="tbl-cell hm-about-number">
                            <span>
                                <?php
                                    $dpt = new departments();
                                    echo $dpt->count();
                                ?>
                            </span>
                            <p>Cabinete</p>
                        </div>
                        </a>
                    </div>
				</div>
				<div class="col-md-5 animated animated-up fadeInUp">
					<img class="img-thumbnail" src="public/uploads/service-5.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start Home Facility Section -->
<?php

    $result = $dpt->all();
    $departments  = $result->fetchAll();
    ?>
<!-- Start Make an Appointment Modal -->
 <?php
    if (isset($_SESSION['patient_email'])) {
        include('include/make_appointment.php');
    }
    ?>
 <?php include('include/footer.php');?>
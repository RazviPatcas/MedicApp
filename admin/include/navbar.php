

<body onload="startTime()">
<!-- Media Modal -->
<div id="media-upload" class="modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="media-hdr">
                    <p>Media <span>(Click On Image To Select)</span></p>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="media-upload-container">
                    <form action="index.php" class="dropzone" id="media-dropzone" method="post" enctype="multipart/form-data">
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>
                    </form>
                </div>
                <div class="media-all">
                    <input type="hidden" name="media_all" value="[&quot;testimonial-5.jpg&quot;,&quot;testimonial-4.jpg&quot;,&quot;testimonial-3.jpg&quot;,&quot;testimonial-2.jpg&quot;,&quot;testimonial-1.jpg&quot;,&quot;slider-7.jpg&quot;,&quot;slider-6.jpg&quot;,&quot;slider-5.jpg&quot;,&quot;slider-4.jpg&quot;,&quot;slider-3.jpg&quot;,&quot;slider-2.jpg&quot;,&quot;slider-1.jpg&quot;,&quot;slide-doctor-8.jpg&quot;,&quot;slide-doctor-7.jpg&quot;,&quot;slide-doctor-6.jpg&quot;,&quot;slide-doctor-5.jpg&quot;,&quot;slide-doctor-4.jpg&quot;,&quot;slide-doctor-3.jpg&quot;,&quot;slide-doctor-2.jpg&quot;,&quot;slide-doctor-1.jpg&quot;,&quot;service.jpg&quot;,&quot;service-9.jpg&quot;,&quot;service-8.jpg&quot;,&quot;service-7.jpg&quot;,&quot;service-6.jpg&quot;,&quot;service-5.jpg&quot;,&quot;service-4.jpg&quot;,&quot;service-3.jpg&quot;,&quot;service-2.jpg&quot;,&quot;service-14.jpg&quot;,&quot;service-13.jpg&quot;,&quot;service-12.jpg&quot;,&quot;service-11.jpg&quot;,&quot;service-10.jpg&quot;,&quot;service-1.jpg&quot;,&quot;recent-5.jpg&quot;,&quot;recent-4.jpg&quot;,&quot;recent-3.jpg&quot;,&quot;recent-2.jpg&quot;,&quot;recent-1.jpg&quot;,&quot;logo-purple.png&quot;,&quot;logo-orange.png&quot;,&quot;logo-green.png&quot;,&quot;logo-blue.png&quot;,&quot;hm-service.jpg&quot;,&quot;hm-about.jpg&quot;,&quot;hm-about-1.jpg&quot;,&quot;feature-6.jpg&quot;,&quot;feature-5.jpg&quot;,&quot;feature-4.jpg&quot;,&quot;feature-3.jpg&quot;,&quot;feature-2.jpg&quot;,&quot;feature-1.jpg&quot;,&quot;favicon-purple-32x32.png&quot;,&quot;favicon-orange-32x32.png&quot;,&quot;favicon-green-32x32.png&quot;,&quot;favicon-blue-32x32.png&quot;,&quot;event-1.jpg&quot;,&quot;doctor-male.png&quot;,&quot;doctor-female.png&quot;,&quot;doctor-9.jpg&quot;,&quot;doctor-8.jpg&quot;,&quot;doctor-7.jpg&quot;,&quot;doctor-6.jpg&quot;,&quot;doctor-5.jpg&quot;,&quot;doctor-4.jpg&quot;,&quot;doctor-3.jpg&quot;,&quot;doctor-2.jpg&quot;,&quot;doctor-12.jpg&quot;,&quot;doctor-11.jpg&quot;,&quot;doctor-10.jpg&quot;,&quot;doctor-1.jpg&quot;,&quot;comment-6.jpg&quot;,&quot;comment-5.jpg&quot;,&quot;comment-4.jpg&quot;,&quot;comment-3.jpg&quot;,&quot;comment-2.jpg&quot;,&quot;comment-1.jpg&quot;,&quot;blog-9.jpg&quot;,&quot;blog-8.jpg&quot;,&quot;blog-7.jpg&quot;,&quot;blog-6.jpg&quot;,&quot;blog-5.jpg&quot;,&quot;blog-4.jpg&quot;,&quot;blog-3.jpg&quot;,&quot;blog-2.jpg&quot;,&quot;blog-11.jpg&quot;,&quot;blog-10.jpg&quot;,&quot;blog-1.jpg&quot;,&quot;author-2.jpg&quot;,&quot;author-1.jpg&quot;,&quot;800x800-gallery.jpg&quot;,&quot;660x75.[ 0.jpg&quot;,&quot;645x405.jpg&quot;,&quot;645x405-about.jpg&quot;,&quot;620x680.jpg&quot;,&quot;620x680-service.jpg&quot;,&quot;585x390.jpg&quot;,&quot;530x470.jpg&quot;,&quot;530x470-theme-block.jpg&quot;,&quot;513x150-feature.jpg&quot;,&quot;495x420.jpg&quot;,&quot;375x360-doctorslider.jpg&quot;,&quot;225x200-author.jpg&quot;,&quot;200x200.jpg&quot;,&quot;200x200-testimonial.jpg&quot;,&quot;1920x800.jpg&quot;,&quot;1920x800-slider.jpg&quot;,&quot;130x115-recentpost.jpg&quot;,&quot;130x115-comment.jpg&quot;]">
                    <input type="hidden" name="absolute-path" value="route=">
                    <input type="hidden" name="absolute-upload-path" value="uploads/">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Main Container -->
<div id="main-wrapper">
    <!-- Menu Wrapper -->
    <div id="menu-wrapper">
        <div id="menu-menu">
            <div id="logo">
                <div class="tbl-cell logo-icon">
                 <!--  <a href="#"><img src="public/images/favicon.png" alt=""></a>-->
                    
                </div>
                <div class="tbl-cell">
<!--                    <a href="../index.php"><img src="public/images/logo.png"></a>-->
                    <a href="../index.php"><h2 class="text-info" style="backgroud-color:#00263b;"><b>Medic App</b></h2></a>
                </div>
            </div>
            <div class="menu-user">

                <div class="menu-user-icon"><!--<i class="fa fa-user-circle"></i>-->
                    <a href="profile.php">
                        <i style= "color:white;" class="fa fa-user-circle"></i>
<!--                        <img src="public/images/--><?php //echo $_SESSION['admin_img']?><!--" style="height: 50px" alt="">-->
                    </a>
                </div>
                <div class="menu-user-info"><a href="profile.php">
                    <p style= "color:white;"><?php echo $_SESSION['admin_name'];?></p>
                    <p style= "color:white;"><?php echo $_SESSION['admin_first_name'];
                             echo "\n";                    
                             echo $_SESSION['admin_last_name'];?></p></a>
<div class="menu-user-dropdown">
    <i style= "color:white;" class="fa fa-angle-double-down fa-2x" id="menu-user-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="menu-user-drop">
        <li><a href="../index.php" target="_blank"><i class="icon-link"></i>Website</a></li>
        <li><a href="profile.php"><i class="icon-user"></i>Profil</a></li>
        <li><a href="include/logout.php"><i class="icon-logout"></i> Logout</a></li>
    </ul>
</div>
</div>
</div>
<ul>
    <li id="dashboard-li">
        <a href="index.php"><i style="color:white;font-size:15px;" class="icon-screen-desktop"></i><span style="color:white;font-size:15px;">Dashboard</span></a>
    </li>

    <li id="patient-li">
        <a class="menu-dropdown active-danger">
           <!-- <i style="color:white;font-size:15px;" class="fa fa-wheelchair"></i> -->
           <i style="color:white;font-size:15px;" class="fa fa-user-plus"></i><span style="color:white;font-size:15px;">Pacienți</span><i style="color:white;font-size:20px;" class="fa fa-angle-down"></i>
        </a>
        <ul id="patient" class="sub-menu">

            <li>
                <a href="patient.php">
                    <i class="icon-people"></i><span>Listă pacienți</span>
                </a>
            </li>

            <li id="appointment">
                <a href="patient_add.php">
                    <i class="icon-user-follow"></i><span>Adaugă pacient</span>
                </a>
            </li>
<!--          <li>
                <a href="request.php">
                    <i class="icon-envelope-open"></i><span>Cereri</span>
                </a>
            </li>-->
        </ul>
    </li>
    <li id="appointment-li">
        <a class="menu-dropdown">
            <i style="color:white;font-size:15px;" class="fa fa-plus-square-o"></i>
            <span style="color:white;font-size:15px;">Programări</span>
            <i style="color:white;font-size:20px;" class="fa fa-angle-down"></i>
        </a>

        <ul id="appointment" class="sub-menu">

            <li id="appointment">
                <a href="appointment.php">
                    <i class="fa fa-plus-square"></i>
                    <span>Listă programări</span>
                </a>
            </li>
            <li id="department">
                <a href="appointment_add.php">
                    <i class="icon-user-follow"></i>
                    <span>Adaugă programare</span>
                </a>
            </li>
<!--            <li id="service">-->
<!--                <a href="appointment_edit.php">-->
<!--                    <i class="icon-briefcase"></i><span>Update Appointment </span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li id="service">-->
<!--                <a href="">-->
<!--                    <i class="icon-briefcase"></i><span>Hospitals Appointment </span>-->
<!--                </a>-->
<!--            </li>-->

        </ul>
    </li>
    <li id="doctor-li">
        <a class="menu-dropdown"><i style="color:white;font-size:15px;" class="fa fa-user-md"></i>
            <span style="color:white;font-size:15px;">Doctori</span><i style="color:white;font-size:20px;" class="fa fa-angle-down"></i></a>
        <ul id="doctor" class="sub-menu">
            <li id="menu_page">
                <a href="doctors.php"><i class="icon-people"></i><span>Listă doctori</span></a>
            </li>
            <li id="home_page">
                <a href="add_doctors.php"><i class="fa fa-user-plus"></i><span>Adaugă doctori</span></a>
            </li>
        </ul>
    </li>
    <li id="hospital-li">
        <a class="menu-dropdown"><i style="color:white;font-size:15px;" class="fa fa-hospital-o"></i>
            <span style="color:white;font-size:15px;">Clinici</span><i style="color:white;font-size:20px;" class="fa fa-angle-down"></i></a>
        <ul id="hospital" class="sub-menu">
            <li id="menu_page">
                <a href="hospital.php"><i class="fa fa-list-alt"></i><span>Listă clinici</span></a>
            </li>
            <li id="home_page">
                <a href="add_hospital.php"><i class="fa fa-home"></i><span>Adaugă clinică</span></a>
            </li>

        </ul>
    </li>
    <li id="department-li">
        <a class="menu-dropdown"><i style="color:white;font-size:15px;" class="fa fa-building"></i>
            <span style="color:white;font-size:15px;">Departamente</span><i style="color:white;font-size:20px;" class="fa fa-angle-down"></i></a>
        <ul id="department" class="sub-menu">
            <li id="menu_page">
                <a href="department.php"><i class="icon-home"></i><span>Listă departamente</span></a>
            </li>
            <li id="home_page">
                <a href="department_add.php"><i class="icon-home"></i><span>Adaugă departamente</span></a>
            </li>
        </ul>

    </li>
    <li id="user-li">
        <a class="menu-dropdown"><i style="color:white;font-size:15px;" class="icon-people"></i><span style="color:white;font-size:15px;">Abonați </span><i style="color:white;font-size:20px;" class="fa fa-angle-down"></i></a>
        <ul id="user" class="sub-menu">
            <li>
                <a class="menu-dropdown" href="user.php"><i class="icon-people"></i><span>Abonați</span></a>
            </li>
        </ul>
    </li>

</ul>
</div>
</div>

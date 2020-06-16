<?php include('include/header.php');?>
<?php
    $page_name = "<i class='fa fa-registered'></i> Registration";
?>
<?php include('include/nav.php');?>

<div class="page-ttl">
    <div class="layer-stretch" >
        <div class="page-ttl-container">
            <div class="page-ttl-name">
                <h1><i class="fa fa-user-plus color-white"></i> Înregistrare</h1>
            </div><br>
            <div class="row">
                <div class="col-md-6 text-justify">

                    <button style = "background-color: #00263b;" type="button" class="btn btn-primary btn-lg btn-block btn-pill">
                        <a href="patient_register.php">
                            <h2 style= "color:#fff;"><b>Înregistrare pacient</b></h2>
                        </a>
                    </button>
                    <p class="text-white" style="font-size: 14px"><br>
                        
                    </p>
                </div>
                <div class="col-md-6 text-justify" >
                        <button style = "background-color: #00263b;" type="button" class="btn btn-success btn-lg btn-block btn-pill">
                        <a href="doctor_register.php">
                            <h2 style= "color:#fff;"><b>Înregistrare doctor</b></h2>
                        </a></button>
                    <p class="text-white" style="font-size: 14px"><br>
                        
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include('include/make_appointment.php');?>
<?php include('include/footer.php');?>
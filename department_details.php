
<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
 $page_name = "<i class=\"fa fa-info-circle\"></i> Department ";
?>
<?php include('include/nav.php');
  require ('class/doctors.php');
//  require ('class/hospitals.php');
  require ('class/patients.php');
  require ('class/departments.php');
?>
<?php
    $dpt = new departments();
    if (isset($_GET['dpt_id'])) {
$id = $_GET['dpt_id'];
$result = $dpt->find($id);
$dpts = $result->fetchAll();
foreach ($dpts

         as $dpt) {


?>

    <div class="layer-stretch animated-wrapper">
        <div class="layer-wrapper text-center">
            <div class="row">
                <div class="col-md-5 hm-service-left">
                    <img class="animated animated-up" src="public/uploads/<?php echo $dpt->photo; ?>" alt="">
                </div>
                <div class="col-md-7 hm-service-right animated animated-up">
                    <div class="paragraph-medium paragraph-black">
                        <div style="text-align: justify;"><h1 class='text-blue'><?php echo $dpt->name; ?> </h1></div>
                    </div>
                    <div class="paragraph-medium paragraph-black">
                        <div style="text-align: justify;"><?php echo $dpt->details; ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layer-stretch animated-wrapper">
        <div class="layer-wrapper layer-bottom-0">
            <div class="layer-ttl">
                <h3 class="animated animated-down">Doctorii disponibili</h3>
            </div>
            <div class="row">
                <?php
                $doctor = new doctors();
                $sql = "SELECT * FROM doctors where department_id = $dpt->id";
                $result = $pdo->prepare($sql);
                $result->execute();
                $doctors = $result->fetchAll();
                foreach ($doctors as $doct) {

                    ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="theme-block theme-block-hover animated animated-up">
                            <div class="theme-block-picture">
                                <img src="public/uploads/<?php echo $doct->photo; ?>" alt="photo" style="height: 150px">
                            </div>
                            <div class="doctor-name">
                                <h4><a href="doctor_details.php" class="text-capitalize">Dr.
                                        <?php echo $doct->first_name . " " . $doct->last_name; ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="doctor-details">
                                <div class="doctor-specility">
                                    <p class="text-capitalize">
                                        <?php
                                        $id = $doct->department_id;
                                        $doctor->doctor_dpt($id);
                                        ?></p>
                                </div>
                            </div>
                            <div class="doctor-details">
                                <div class="doctor-specility">
                                    <p class="text-capitalize">
                                        <a href="doctor_details.php?id=<?php echo $doct->id;?> " class="button button-success button-hover-warning button-pill">Programare </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                }
                ?>

            </div>
        </div>
    </div>
        <?php
        }
    }
?>


<div id="testimonial" class="colored-background" style = "background-color: #219aa5;">
	<div class="layer-stretch">
		<div class="layer-wrapper layer-bottom-0 animated-wrapper" >
			<div class="layer-ttl layer-ttl-white" >
				<h3 class="animated animated-down" style="background-color: #00263b;">Ce spun pacienții ?</h3>
			</div>
			<div id="testimonial-slider" class="owl-carousel owl-theme theme-owl-dot">
					<div class="testimonial-block animated animated-right">
					    <img class="img-responsive" src="public/uploads/testimonial-1.png" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</div>
					<a>John Doe</a>
			</div>
					<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-1.png" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
					</div>
					<a>John Doe</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-1.png" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Thank you for the remedy. I feel it has been working on a deeper subtle level. An inner seeing. I have had the feeling of a melting inside and great sense of peace and rightness. I experienced this before with your perception and treatment so thank you very much.					</div>
					<a>John Doe</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-1.png" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> This was my second visit here I loved it first visit but love it more on my second visit. I loved thier facility and online system.
					</div>
					<a>John Doe</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-1.png" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Thank you for the remedy. I feel it has been working on a deeper subtle level. An inner seeing. I have had the feeling of a melting inside and great sense of peace and rightness. I experienced this before with your perception and treatment so thank you very much.
					</div>
					<a>John Doe</a>
				</div>
			</div>
		</div>
	</div>
</div>

	

<?php include('include/make_appointment.php');?>
<?php include('include/footer.php');?>
<script>

    $('#department>a').addClass('active');
</script>
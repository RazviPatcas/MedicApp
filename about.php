
<?php include('include/db.php');?>
<?php include('include/header.php');?>
<?php
 $page_name = "<i class=\"fa fa-info-circle\"></i> About US";
?>
<?php include('include/nav.php');
  require ('class/doctors.php');
//  require ('class/hospitals.php');
  require ('class/patients.php');
  require ('class/departments.php');



?>

<div class="layer-stretch animated-wrapper">
	<div class="layer-wrapper text-center">
		<div class="row">
			<div class="col-md-5 hm-service-left">
				<img class="animated animated-up" src="public/uploads/about.jpg" alt="">
			</div>
			<div class="col-md-7 hm-service-right animated animated-up">
				<div class="paragraph-medium paragraph-black"><div style="text-align: justify;">Un spital este o instituție pentru asistența medicală, care oferă în mod obișnuit tratament specializat pentru ședere în spital (sau peste noapte). Unele spitale admit în primul rând pacienții care suferă de o boală sau afecțiune specifică sau sunt rezervați pentru diagnosticul și tratamentul afecțiunilor care afectează o anumită grupă de vârstă. Alții au un mandat care se extinde dincolo de oferirea de servicii de îngrijire curative și de reabilitare dominant, pentru a include roluri promoționale, preventive și educaționale, ca parte a unei abordări de asistență medicală primară. Astăzi, spitalele sunt, de regulă, finanțate de către stat, organizații de sănătate (pentru profit sau non-profit), de asigurări de sănătate sau de organizații de caritate și de donații. Cu toate acestea, istoric, acestea au fost adesea fondate și finanțate de ordine religioase sau persoane caritate și lideri. Spitalele sunt în prezent angajați de medici pregătiți profesional, asistenți medicali, clinicieni paramedici etc., în timp ce istoric, această lucrare a fost realizată de obicei de ordinele religioase fondatoare sau de voluntari.
                <span style="background-color: rgb(255, 255, 255);"><br></span><div style="text-align: justify;"><span style="background-color: rgb(252, 252, 252); color: rgb(85, 85, 85); font-size: 14px; letter-spacing: 0.5px; text-align: left;"><br>&nbsp;</span><b>O clinică walk-in</b>&nbsp;descrie o categorie foarte largă de facilități medicale definite doar ca fiind cele care acceptă pacienții în regim de intrare și fără o programare necesară. O serie de furnizori de servicii de asistență medicală se încadrează în umbrela clinicii, inclusiv centre de asistență urgentă, clinici de vânzare cu amănuntul și chiar multe clinici gratuite sau clinici comunitare de sănătate. Clinicile walk-in oferă avantajele de a fi accesibile și de multe ori ieftin.</div><div style="text-align: left;"><br></div></div><ul><li style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, nostrum</li><li style="text-align: left;">Expedita autem, ea, inventore eligendi debitis nihil obcaecati consequatur quo</li><li style="text-align: left;">Dolores, voluptatem vel eligendi asperiores totam deserunt exercitationem</li><li style="text-align: left;">Pariatur iusto corporis facilis corrupti dolorem exercitationem ipsam quisquam<br></li></ul></div>
			</div>
		</div>
	</div>
</div>
<div class="colored-background" style="background:#229AA5;">
	<div class="layer-stretch">
		<div class="layer-wrapper layer-bottom-0 animated-wrapper">
			<div class="layer-ttl layer-ttl-white">
				<h3 class=" animated animated-down" style="background-color: #00263b;">Cine suntem ?</h3>
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
                                <p>Doctor(i)</p>
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
                                <p>Spitale/Clinici</p>
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
                                <p>Departamente</p>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-5">
					<img class="img-thumbnail animated animated-up" src="public/uploads/hm-about-1.jpg" alt="">
				</div>
				<div class="row about-mission-vission text-center">
					<div class="col-md-6 about-mission animated animated-up ">
						<span>Misiunea noastră</span>
						<p class="paragraph-medium paragraph-white text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eligendi perferendis ducimus sed aliquid natus enim, beatae velit reiciendis, inventore molestiae, neque sapiente temporibus architecto dicta, vero quaerat sequi quos. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
					</div>
					<div class="col-md-6 about-vission animated animated-up ">
						<span>Viziunea noastră</span>
						<p class="paragraph-medium paragraph-white text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eligendi perferendis ducimus sed aliquid natus enim, beatae velit reiciendis, inventore molestiae, neque sapiente temporibus architecto dicta, vero quaerat sequi quos. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="layer-stretch animated-wrapper">
	<div class="layer-wrapper layer-bottom-0">
		<div class="layer-ttl">
			<h3 class="animated animated-down">Doctori</h3>
		</div>
		<div class="row">
            <?php
            $sql = "SELECT * FROM doctors LIMIT 8";
            $result = $pdo->prepare($sql);
            $result->execute();
            $doctors= $result->fetchAll();
            foreach ($doctors as $doct) {

                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="theme-block theme-block-hover animated animated-up">
                        <div class="theme-block-picture">
                            <img src="public/uploads/<?php echo $doct->photo; ?>" alt="Daniel Barnes">
                        </div>
                        <div class="doctor-name">
                            <h4><a href="doctor_details.php" class="text-capitalize" >Dr.
                                    <?php echo $doct->first_name." ".$doct->last_name;?>
                                </a></h4>
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
                    </div>
                </div>
                <?php

            }
            ?>

        </div>
	</div>
</div>

<div id="testimonial" class="colored-background" style="background-color: #229AA5;">
	<div class="layer-stretch">
		<div class="layer-wrapper layer-bottom-0 animated-wrapper" >
			<div class="layer-ttl layer-ttl-white" >
				<h3 class="animated animated-down"  style="background-color: #00263b;">Părerea pacineților</h3>
			</div>
			<div id="testimonial-slider" class="owl-carousel owl-theme theme-owl-dot">
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-3.jpg" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</div>
					<a>Lorem ipsum</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-4.jpg" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
												</div>
					<a>Lorem ipsum</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-2.jpg" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum	</div>
					<a>Lorem ipsum</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-1.jpg" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
					</div>
					<a>Lorem ipsum</a>
				</div>
								<div class="testimonial-block animated animated-right">
					<img class="img-responsive" src="public/uploads/testimonial-5.jpg" alt="">
					<div class="paragraph-medium paragraph-white">
						<i class="fa fa-quote-left"></i> Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
					</div>
					<a>Lorem ipsum</a>
				</div>
							</div>
		</div>
	</div>
</div>

<?php include('include/make_appointment.php');?>
<?php include('include/footer.php');?>
<script>

    $('#page>a').addClass('active');
</script>
<?php include('include/header.php');?>
<?php
$page_name = "<i class=\"fa fa-medkit\"></i> Services ";
?>
<?php include('include/nav.php');?>


<!-- Start Facility List Section -->
<div class="colored-background" style="background:#229AA5;">
<!--
	<div class="layer-stretch">
		<div class="layer-wrapper layer-bottom-0 animated-wrapper">
			<div class="layer-ttl layer-ttl-white">
				<h3 class="animated animated-down"  style="background-color: #00263b;">Why Choose Us</h3>
			</div>
			<div class="layer-container">
				<div class="feature-block animated animated-up">
					<div class="feature-icon">
						<i class="fa fa-phone"></i>
					</div>
					<span>Emergency Appointment</span>
					<p class="paragraph-small paragraph-white">The emergency departments of our clinic operate 24 hours a day, although staffing levels may be varied in an attempt to reflect patient volume.</p>
				</div>
				<div class="feature-block animated animated-up">
					<div class="feature-icon">
						<i class="fa fa-calendar"></i>
					</div>
					<span>24 hour Service for book appointment</span>
					<p class="paragraph-small paragraph-white">24-7 (usually spoken "twenty-four seven") is facility that is available any time and, usually, every day in our clinic health care center. we look after you every time.</p>
				</div>
				<div class="feature-block animated animated-up">
					<div class="feature-icon">
						<i class="fa fa-user-md"></i>
					</div>
					<span>Doctors follow up after appointment </span>
					<p class="paragraph-small paragraph-white">Doctor is a vehicle for transportation of sick or injured people to, from or between places of treatment for an illness or injury.</p>
				</div>

			</div>
		</div>
	</div>
</div><!-- End Facility List Section -->

	<!-- Start Make an Appointment Modal -->
<?php include('include/make_appointment.php');?><!-- End Make an Appointment Section -->
<?php include('include/footer.php');?>
<script>

    $('#service>a').addClass('active');
</script>
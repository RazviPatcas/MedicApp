<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<?php require('class/appointments.php'); ?>
<?php require('class/departments.php'); ?>
<?php require('class/doctors.php'); ?>
<?php require('class/patients.php'); ?>

<div class="page-container">
            <script>$('#appointment').show();</script>
            <script>$('#appointment-li>a').addClass('active');</script>
<div class="main">
	<form action="" method="post">
		<div class="page-hdr">
			<div class="row">
				<div class="col-4 page-name">
					<h1><i class="fa fa-envelope"></i>Adaugă programare</h1>
				</div>
                <div class="page-name col-3 text-right">
                    <h1 id="time">Timp</h1>
                </div>
				<div class="col-5 page-menu">
					<a id="cancel" href="appointment.php" data-toggle="tooltip" data-placement="left" title="Înapoi la listă"><i class="fa fa-reply"></i></a>
					<button type="submit" name="submit" data-toggle="tooltip" data-placement="left" title="Salvează"><i class="fa fa-floppy-o"></i></button>
				</div>
			</div>
		</div>
        <div class="content">
			<div class="row">
				<div class="col-md-7">
					<div class="content-block content-block-horizantal">
						<div class="content-block-ttl">Informații programare</div>
						<div class="content-block-main">
							<input type="hidden" name="_token" value="413ccea5ca6b8ce59e0da0d74a15110a305317f742542dcc5f09cc85ddf4f25288776a66377494dbf3154612b21c29b49cdcd6ee235b8ea2b77355d52eef0188">
							<div class="content-input" style="display: none">
								<label>Department : </label>
								<input type="text" class="appointment-department" value="" readonly>
								<input type="hidden" name="department" id="appointment-department" value="">
							</div>
							<div class="content-input">
								<label>Alege doctor</label>
								<select name="doctor" id="app-doctor" class="select-list appointment-doctor">
                                    <option value="">Selectează doctor</option>
                                    <?php
                                    $sql = "SELECT * FROM doctors order by department_id";
                                    $result = $pdo->prepare($sql);
                                    $result->execute();
                                    $doctors = $result->fetchAll();
                                    foreach ($doctors as $doctor) {
                                        $dpt = new departments();
                                        $result = $dpt->find($doctor->department_id);
                                        $departments = $result->fetchAll();
                                        foreach ($departments as $department) {

                                            $dpt_id = $department->id;
                                            ?>
                                            <option value="<?php echo $doctor->id; ?>">
                                                Dr.
                                                <?php
                                                echo $doctor->first_name . " " . $doctor->last_name . "  (  " .$department->name." )";

                                                ?>

                                            </option>

                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
							</div>
                            <input type="hidden" name="dpt_id" id="dpt_id" value="<?php echo $dpt_id;?>" >
							<div class="content-input">
								<label>Data programării : </label>
								<input type="date" name="date" id="ap-date" value="" placeholder="Date" required>
								<p class="content-input-error-name">Selectează data</p>
								<div class="content-description"></div>
							</div>
							<div class="content-input" id="add-address">
								<label>Spitalul/Clinica și adresa : </label>
								<div id="doctor_loc"></div>
							</div>
                            <div class="content-input" id="add-ap-slot">
								<label>Ora programării: </label>
								<div id="ap-slot"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="content-block content-block-horizantal">
						<div class="content-block-ttl">Informații pacient
                        </div>
						<div class="content-block-main">
							<div class="content-input">
								<label> Nume pacient : </label>
                                <select name="patient" id="patient" class="text-capitalize">
                                    <option value=""> Selectează pacient </option>
                                    <?php
                                    $sql = "SELECT * FROM patients";
                                    $result = $pdo->prepare($sql);
                                    $result->execute();
                                    $patients = $result->fetchAll();

                                    foreach ($patients as $patient) {
                                        $email = $patient->email;
                                        $mobile = $patient->phone;

                                        ?>

                                        <option value="<?php echo $patient->patient_id;?>"><?php echo $patient->first_name." ".$patient->last_name;?></option>
                                        <?php
                                    }
                                    ?>


                                </select>


							</div>
						<!--	<div class="content-input">
								<label>Problems (If Any ): </label>
								<input type="text" id="prblm" name="email" value="" placeholder="Problems" required>
								<p class="content-input-error-name">Please enter valid Email!</p>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="content-submit text-center">
				<button type="submit" name="submit" id="ap_sub" class="btn btn-primary">Salvare</button>
			</div>
		</div>
	</form>
</div>
    <script>
        $('button[type="submit"]').attr('disabled','disabled');
        $('input#ap-date').on('change', function () {
            $('div#div-time').remove();
            $('input#loc1').remove();
            $('input#time_slot').hide();
            var doctor_id = $('#app-doctor').val();
            var date = $('input#ap-date').val();
            // alert(date);

            $.post('../include/appointment/date.php',{doctor_id : doctor_id, date : date}, function (data) {
                // $('#ap_doctor').after(data);
                $('#ap-slot').after(data);
                // alert(data);

            });
            $.post('../include/appointment/loc.php',{doctor_id : doctor_id}, function (data) {
                // $('#ap_doctor').after(data);
                $('#doctor_loc').after(data);
            });

            if($('#time_slot').val != ''){
                $('button[type="submit"]').removeAttr('disabled');
            }

        });


        $('button#ap_sub').on('click', function () {

            // var dpt_id      = $('input#dpt_id').val();
            var doctor_id   = $('#app-doctor').val();
            var date        = $('input#ap-date').val();
            var time        = $('input#time_slot').val();
            var address     = $('input#loc1').val();
            var problem    = $('input#prblm').val();
            var patient_id  = $('select#patient').val();

            // alert(address);
            // alert(patient_id);
            // alert(doctor_id);
            // alert(time);
            // alert(date);
            // alert(problem);

            $.post('../include/appointment/AdminAddAppointment.php',
                {
                    doctor_id   : doctor_id,
                    date        : date,
                    time        : time,
                    address     : address,
                    problem     : problem,
                    patient_id  : patient_id,

                },function (data) {
                    $('button#ap_sub').after(data);
                    // alert(data);
                });
        });
    </script>
<!-- Footer -->
<?php include('include/footer.php');?>
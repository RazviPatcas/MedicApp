
<?php include('include/db.php');?>
<?php include('include/header.php');?>

<?php

    $page_name = "<i class='fa fa-plus-square'> </i> My Patients";
?>
<?php include('include/nav.php');?>


<div id="myappointment-page" class="layer-stretch animated-wrapper" style="opacity: 1;">
    <div class="layer-wrapper">
        <div class="theme-material-card">
            <div  class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                        <div class="col-sm-6">
                        <form action="appointment_details.php" method="post" class="form-control form-group">

                            <?php
                            if (isset($_GET['id'])) {


                                $sqlt = "SELECT * FROM appointment WHERE id = {$_GET['id']}";
                                $result = $pdo->prepare($sqlt);
                                $result->execute();
                                $appointments = $result->fetchAll();
                                $i = 1;
                                foreach ($appointments as $appointment) {
                                    $id = $appointment->id;


                                    $sqli = "SELECT * FROM patients WHERE patient_id = $appointment->patient_id;";
                                    $result = $pdo->prepare($sqli);
                                    $result->execute();
                                    $patients = $result->fetchAll();
                                    foreach ($patients as $patient) {


                                        ?>
                                        <div class="form-group row">
                                            <div class="col-6"><label for="Nume pacient"> Numele pacientului :</label></div>
                                            <div class="col-6" style="background-color: #c6fff0; height: 35px;">
                                                <input type="text" value="<?php echo $patient->first_name . " " . $patient->last_name; ?>" readonly>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6"><label for=""> Telefon :</label></div>
                                            <div class="col-6" style="background-color: #c6fff0;height: 35px;">
                                                <input type="text" value="0<?php echo $patient->phone; ?>" readonly>
                                            </div>

                                        </div>
                                        <div class="form-group row">

                                            <div class="col-6"><label for=""> Simptome/Afecțiuni :</label></div>
                                            <div class="col-6" style="background-color: #c6fff0;height: 36px;">
                                                <input type="text" value="<?php echo $appointment->problems; ?>"></div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-6"><label for=""> Istoric medical :</label>
                                            </div>
                                            <div class="col-6" style="background-color: #c6fff0;height: 35px;">
                                                <input ype="text" value="<?php echo $patient->medical_history; ?>"
                                                       readonly></div>

                                        </div>
                                        <div class=" row form-group">
                                            <div class="col-6"><label for=""> Comentarii :</label></div>
                                            <div class="col-6" style="background-color: #daccff;height: 100px;">
                                                <textarea name="comment" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $appointment->id;?>">
                                        <div class=" row form-group">
                                            <div class="col-4"></div>
                                            <button type="submit" name="submit" class="btn btn-lg btn-pill btn-success">
                                            Trimite
                                            </button>

                                        </div>
                                        <?php
                                    }


                                }
                            }
                            if (isset($_POST['submit'])) {
                                $comment = $_POST['comment'];
                                $problems = $_POST['problems'];
                                $id     = $_POST['id'];
                                 echo $sq = "UPDATE appointment set `comments`='$comment' where id = $id";
                                $result = $pdo->prepare($sq);
                                $result->execute();
                                if ($result)header('Location: index.php');

                            }

                            ?>
                        </form>

                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include('include/make_appointment.php');?>
<?php include ('include/footer.php');?>

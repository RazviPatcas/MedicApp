
<?php
include ('../db.php');
if (isset($_POST['doctor_id'])){
    $id = $_POST['doctor_id'];
    $date  = $_POST['date'];
    $dt    = strtotime($date);
    $day   = date("D",$dt);
    $month = date("M",$dt);
    $year  = date("Y",$dt);
    $day   =strtoupper($day);
    $crnt_year = date("Y");
    $crnt_month = date("M");
    $crnt_day = date("D");

    $sql = "SELECT * FROM doctors where id = {$_POST['doctor_id']}";
    $result = $pdo->prepare($sql);
    $result->execute();
    $doctors = $result->fetchAll();
    ?>
    <div class="text-center" id="div-time">

        <input type="text" id="time_slot" readonly
<?php
    foreach ($doctors as $doctor){

        if ($year>=$crnt_year && $month>=$crnt_month) {

            $week_end = strtoupper($doctor->week_end);
            if ($week_end != $day) {

                $i = $doctor->start_appointment;
                $j = $doctor->end_appointment;
                $s = $doctor->time_slot;
                ?>

                    value="<?php echo $i; ?>"

                <?php
            } else

                echo '<br><br>Doctorul nu este disponibil ! <br>Selectați o altă zi !';

        }else
            echo '<p class="text-danger">Ați selectat o dată greșită<br></p>';

    }?>
    </div>
        <?php


}
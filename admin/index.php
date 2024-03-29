<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<?php
    require('class/appointments.php');
    require('class/doctors.php');
    require ('class/departments.php');
    require ('class/patients.php');
    require ('class/subscriber.php');
//    require ('../class/hospitals.php');
?>


    <div class="page-container">

        <script>
            $('#dashboard-li a').addClass('active');
        </script>

        <!-- Dahsboard Body -->
        <div class="page-hdr">
            <div class="row">
                <div class="page-name col-4">
                    <h1><i class="fa fa-tachometer"></i>Panou de control</h1>
                </div>
                <div class="page-name col-3 text-right">
                    <h1 id="time">Timp</h1>
                </div>
                <div class="col-5 text-right">
                    <div class="nav-menu">
                        <a><i class="icon-options-vertical"></i></a>
                        <div class="nav-menu-dropdown">
                            <div class="nav-dropdown-title">Link-uri rapide</div>
                            <div class="nav-dropdown-body nav-quick-links">
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <a href="patient_add.php">
                                                <i class="icon-user-follow text-primary"></i>
                                                <span>Adaugă pacient</span>
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <a href="appointment_add.php">
                                                <i class="icon-calendar text-primary"></i>
                                                <span>Adaugă programare</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tbl-row">

                                        <div class="tbl-cell">
                                            <a href="add_hospital.php">
                                                <i class="fa fa-hospital-o text-danger"></i>
                                                <span>Adaugă clinică</span>
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <a href="department_add.php">
                                                <i class="fa fa-building text-warning"></i>
                                                <span>Adaugă departament</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <a href="add_doctors.php">
                                                <i class="fa fa-user-md text-success"></i>
                                                <span>Adaugă doctori</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
         </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-lg-4">
                            <a href="patient.php">
                            <div class="icon-widget">
                                    <h5 class="icon-widget-heading"><b>Pacienți</b></h5>
                                <div class="icon-widget-body tbl">
                                    <p class="tbl-cell">
                                            <i class="fa fa-user-plus " style="color: #32C1CE"></i>
                                    </p>
                                    <p class="tbl-cell text-right"><b>
                                            <?php
                                            $patient = new patients();
                                            echo $patient->count();
                                            ?></b>
                                    </p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-4">
                            <a href="hospital.php">
                                <div class="icon-widget">
                                     <h5 class="icon-widget-heading"><b>Spitale</b></h5>
                                <div class="icon-widget-body tbl">
                                    <p class="tbl-cell">
                                            <i class="fa fa-hospital-o text-info"></i>
                                    </p>
                                    <p class="tbl-cell text-right"><b>
                                            <?php
                                            $hos = new hospitals();
                                            echo $hos->count();
                                            ?></b>
                                    </p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-4">
                            <a href="department.php">
                            <div class="icon-widget">
                                <h5 class="icon-widget-heading"><b>Departamente</b></h5>
                                <div class="icon-widget-body tbl">
                                    <p class="tbl-cell">
                                        <i class="fa fa-building text-info"></i>
                                    </p>
                                    <p class="tbl-cell text-right"><b>
                                            <?php
                                            $dpt = new departments();
                                            echo $dpt->count();
                                            ?></b>
                                    </p>

                            </div>
                            </div>
                            </a>

                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-4">
                            <a href="doctors.php">
                            <div class="icon-widget">
                                <h5 class="icon-widget-heading"><b>Doctori</b></h5>
                                <div class="icon-widget-body tbl">
                                    <p class="tbl-cell">
                                            <i class="fa fa-user-md text-info"></i>
                                    </p>
                                    <p class="tbl-cell text-right text"><b>
                                        <?php
                                        $doctor = new doctors();
                                        echo $doctor->count();
                                        ?></b>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-4" >
                            <a href="appointment.php">
                            <div class="icon-widget">
                                <h5 class="icon-widget-heading"><b>Programări</b></h5>
                                <div class="icon-widget-body tbl">
                                    <p class="tbl-cell">
                                        <i class="fa fa-calendar-minus-o text-info"></i>
                                    </p>
                                    <p class="tbl-cell text-right text">
                                        <b>
                                            <?php
                                            $appointment = new appointments();
                                            $result = $appointment->all();
                                            echo $result->rowCount();
                                            ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-4" >
                            <a href="user.php">
                            <div class="icon-widget">
                                <h2 class="icon-widget-heading"><b>Abonați</b></h2>
                                <div class="icon-widget-body tbl">
                                    <p class="tbl-cell">
                                        <i class="fa fa-user-circle-o text-info"></i>
                                    </p>
                                    <p class="tbl-cell text-right text">
                                        <b>
                                            <?php
                                                $sub = new subscriber();
                                                $result = $sub->all();
                                                echo $result->rowCount();
                                            ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                            </a>
                        </div>


                    </div>
                </div>
            </div>

            <script>
                window.chartColors = {
                    red: 'rgb(255, 99, 132)',
                    orange: 'rgb(255, 159, 64)',
                    yellow: 'rgb(255, 205, 86)',
                    green: 'rgb(75, 192, 192)',
                    blue: 'rgb(54, 162, 235)',
                    purple: 'rgb(153, 102, 255)',
                    grey: 'rgb(201, 203, 207)' };
                var color = Chart.helpers.color;
            </script>

            <div class="row">
                <div class="col-sm-4">
                    <div class="dashboard-card"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <p class="dashboard-card-ttl"><i class="fa fa-bar-chart"></i>Statistici sistem</p>
                        <canvas id="clinicStats" width="518" height="518" style="display: block; width: 259px; height: 259px;"></canvas>
                        <script>
                            var barChartData = {
                                labels: ['Pacienți', 'Doctori','Spitale', 'Departamente', 'Programări', 'Comentarii'],
                                datasets: [{
                                    label: "Statistici sistem",
                                    data: [[<?php echo $patient->count();?>],
                                           [<?php echo $doctor->count();?>],
                                           [<?php echo $hos->count();?>],
                                           [<?php echo $dpt->count();?>],
                                           [<?php $result = $appointment->all();
                                                  echo $result->rowCount();?>],10],
                                    
                                    backgroundColor: 
                                    [   color(window.chartColors.purple).alpha(0.7).rgbString(),
                                        color(window.chartColors.blue).alpha(0.7).rgbString(),
                                        color(window.chartColors.orange).alpha(0.7).rgbString(),
                                        color(window.chartColors.green).alpha(0.7).rgbString(),
                                        color(window.chartColors.red).alpha(0.7).rgbString()
                                        //olor(window.chartColors.yellow).alpha(0.7).rgbString()
                                        ],
                                    borderColor: [window.chartColors.purple,
                                        window.chartColors.blue,
                                        window.chartColors.orange,
                                        window.chartColors.green,
                                        window.chartColors.red,
                                        window.chartColors.yellow],
                                    borderWidth: 2,
                                    fill: 'end'  }]
                            };
                            var ctx = document.getElementById("clinicStats").getContext("2d");
                            window.myBar = new Chart(ctx, {
                                type: 'bar',
                                data: barChartData,
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dashboard-card"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <p class="dashboard-card-ttl"><i class="fa fa-bar-chart"></i>Statistici programări</p>
                        <canvas id="grouped" width="518" height="518" style="display: block; width: 259px; height: 259px;"></canvas>
                        <script>
                            var barChartData = {
                                labels: [<?php $year = date("Y");echo $year; ?>],
                                datasets: [{
                                    label: 'Statistici programări ',
                                    backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                                    borderColor: window.chartColors.blue,
                                    borderWidth: 2,
                                    data: [<?php $result = $appointment->all();
                                                  echo $result->rowCount();?>],
                                    fill: 'end'
                                }]
                            };
                            var ctx = document.getElementById("grouped").getContext("2d");
                            window.myBar = new Chart(ctx, {
                                type: 'line',
                                data: barChartData,
                                options: {
                                    responsive: true,
                                    legend: {
                                        position: 'top',
                                    }
                                }
                            });

                        </script>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dashboard-card"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <p class="dashboard-card-ttl"><i class="fa fa-bar-chart"></i>Statistici pacienți</p>
                        <canvas id="lineChart" width="518" height="518" style="display: block; width: 259px; height: 259px;"></canvas>
                        <script>
                            var ctx = document.getElementById("lineChart");
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ["Iun","Iul","Aug","Sept","Oct","Nov"],
                                    datasets: [{
                                        label: 'Statistici pacienți ', 
                                        data:[<?php echo $patient->count();?>],
                                        backgroundColor: [
                                            color(window.chartColors['yellow']).alpha(10.5).rgbString(),                                        ],
                                        borderColor: [
                                            window.chartColors['yellow']
                                        ],
                                        borderWidth: 2
                                    }]
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidenav-background"></div>
        <!-- Footer -->

<?php include('include/footer.php'); ?>
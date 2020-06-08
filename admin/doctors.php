<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<?php require ('class/appointments.php'); ?>
<?php require ('class/doctors.php');?>

<div class="page-container">
            <script>
	$('#doctor').show();
	$('#doctor-li>a').addClass('active');
            </script>


    

<div class="page-hdr">
	<div class="row">
		<div class="col-4 page-name">
			<h1><i class="fa fa-user-md"></i>Doctori</h1>
		</div>
        <div class="page-name col-3 text-right">
            <h1 id="time">Timp</h1>
        </div>
		<div class="col-5 page-menu">
			<a id="cancel" href="doctors.php" data-toggle="tooltip" data-placement="left" title="Reîncarcă"><i class="fa fa-refresh"></i></a>
			<a style = "background-color:#32C1CE;" href="add_doctors.php" data-toggle="tooltip" data-placement="left" title="Adaugă doctor"><i class="fa fa-plus"></i></a>
		</div>
	</div>
</div>
<div class="content">
	<div class="table-container">
		<table id="doctor-table" class="table table-bordered table-striped datatable-table">
			<thead>
				<tr class="table-heading">
					<th>#</th>
					<th>Informații doctor</th>
                    <th>Departament</th>
                    <th>Imagine</th>
					<th class="text-center">Programări</th>
					<th class="table-action">Acțiuni</th>
				</tr>
			</thead>
			<tbody>

                <?php
                    $doctors = new doctors();
                    if (isset($_GET['hospital'])){
                        $id = $_GET['hospital'];
                        $result = $doctors->find_all_by_hosptalID($id);
                        if ($result->rowCount()==0){
                            header('Location: hospital.php');
                        }
                    }else{
                        $result = $doctors->all();
                    }


                    $docts = $result->fetchAll();
                    if ($result->rowCount()>0) {
                        foreach ($docts as $doct) {

                ?>


                <tr>
                <td class="table-srno"><?php echo $doct->id;?></td>
                <td>
                    <p class="font-16 margin-0"><?php echo $doct->first_name." ".$doct->last_name;?></p>
                    <p class="font-12 margin-0"><?php echo $doct->email;?></p>
                    <p class="font-12 margin-0"><?php echo $doct->phone;?></p>
                </td>
                <td>
                    <?php echo $doct->department_id;?>
                </td>
                    <td class="table-img">
                        <img class="img-thumbnail" src="../public/uploads/<?php echo $doct->photo;?>" alt="">
                    </td>

                <td class="text-center">
                    <a href="appointment.php?doctor=">
                  1
                    </a>
                </td>
                <td class="table-action">
                    <a href="include/make_admin.php?id=<?php echo $doct->id; ?>" class="btn btn-outline btn-info btn-outline-1x btn-circle" data-toggle="tooltip" title="Faceți admin" onclick="return confirm('Dorești ca acest doctor sa fie administrator?');"><i class="fa fa-header"></i></a>

                    <a href="edit_doctor.php?id=<?php echo $doct->id; ?>" class="btn btn-outline btn-info btn-outline-1x btn-circle" data-toggle="tooltip" title="Editează"><i class="fa fa-pencil-square-o"></i></a>
                    <a href="doctors.php?delete=<?php echo $doct->id; ?>" class="btn btn-outline btn-danger btn-outline-1x btn-circle table-delete" data-toggle="tooltip" title="Șterge" onclick="return confirm('Dorești să ștergi această înregistrare?');">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>

                <?php
                        }
                    }


                if (isset($_GET['delete'])){
                    $id= $_GET['delete'];
                    $sql = "DELETE FROM doctors WHERE id = {$id}";
                    $result = $pdo->prepare($sql);
                    $result->execute();
                    header('Location: doctors.php');
                }

                ?>
            </tbody>
		</table>
	</div>
</div>


<!-- Delete Modal -->
<!-- Footer -->

    <?php include ('include/footer.php');?>
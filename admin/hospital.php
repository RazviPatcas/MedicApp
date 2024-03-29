<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<?php require ('class/doctors.php')?>

<div class="page-container">
            <script>
	$('#hospital').show();
	$('#hospital-li>a').addClass('active');
            </script>

<div class="page-hdr">
	<div class="row">
		<div class="col-4 page-name">
			<h1><i class="fa fa-user-md"></i>Spitale/Clinici</h1>
		</div>
        <div class="page-name col-3 text-right">
            <h1 id="time">Timp</h1>
        </div>
		<div class="col-5 page-menu">
			<a id="cancel" href="hospital.php" data-toggle="tooltip" data-placement="left" title="Reîncarcă"><i class="fa fa-refresh"></i></a>
			<a style = "background-color:#32C1CE;" href="add_hospital.php" data-toggle="tooltip" data-placement="left" title="Adaugă spital"><i class="fa fa-plus"></i></a>
		</div>
	</div>
</div>
<div class="content">
	<div class="table-container">
		<table id="doctor-table" class="table table-bordered table-striped datatable-table">
			<thead>
				<tr class="table-heading">
					<th>#</th>
					<th>Informații spital/clinică</th>
					<th>Poză</th>
					<th>Doctori</th>
					<th>Locația</th>
					<th class="table-action">Acțiuni</th>
				</tr>
			</thead>
			<tbody>

                <?php
                    $hospita = new hospitals();
                    if (isset($_GET['location'])){
                       $id = $_GET['location'];
                        $result = $hospita->find_all_by_location($id);
                    }else{
                        $result = $hospita->all();
                    }

                    $hospitals = $result->fetchAll();
                    if ($result->rowCount()>0) {
                        foreach ($hospitals as $hospital) {

                ?>
                <tr>
                <td class="table-srno"><?php echo $hospital->id;?></td>
                <td>
                    <p class="font-16 margin-0"><?php echo $hospital->name;?></p>
                    <p class="font-12 margin-0"><?php echo $hospital->address; ?></p>

                </td>
                <td class="table-img">
                    <img class="img-thumbnail" src="../public/uploads/<?php echo $hospital->photo;?>" alt="">
                </td>
                <td class="text-center">
                    <a href="doctors.php?hospital=<?php echo $hospital->id; ?>">
                    <?php
                        echo $doctors = $hospita->doctor_count_by_hospitalID($hospital->id);
                    ?>
                    </a></td>
                <td class="text-center text-capitalize">
                    <?php
                    $hospita->hptl_location($hospital->location_id);
                    ?>
                </td>
                <td class="table-action">
                    <a href="update_hospital.php?id=<?php echo $hospital->id; ?>" class="btn btn-outline btn-info btn-outline-1x btn-circle" data-toggle="tooltip" title="Editează"><i class="fa fa-pencil-square-o"></i></a>
                    <a href="hospital.php?delete=<?php echo $hospital->id; ?>" class="btn btn-outline btn-danger btn-outline-1x btn-circle table-delete" data-toggle="tooltip" title="Șterge" onclick="return confirm('Stergi acest element ?');">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>

                <?php
                        }
                    }

                if (isset($_GET['delete'])){
                    $id= $_GET['delete'];
                    $sql = "DELETE FROM hospitals WHERE id = {$id}";
                    $result = $pdo->prepare($sql);
                    $result->execute();
                    header('Location: hospitals.php');
                }
                ?>
            </tbody>
		</table>
	</div>
</div>

<!-- Footer -->
    <?php include ('include/footer.php');?>
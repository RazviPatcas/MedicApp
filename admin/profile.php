
<?php include('include/db.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<?php require('class/admin.php'); ?>


<div class="page-container"><!-- Profile page start -->
<div class="page-hdr">
	<div class="row">
		<div class="col-8 page-name">
			<h1><i class="fa fa-user"></i>Profilul administratorului</h1>
		</div>
        <div class="page-name col-4 text-center">
            <h1 id="time">Timp</h1>
        </div>
	</div>
</div>

    <?php
        $admin = new admin();

        $admin->update();
        $id= $_SESSION['admin_id'];
        $admins = $admin->find_byID($id);

    ?>


    <div class="content">
	<div class="row">

        <form class="col-sm-7" action="profile.php" method="post">
            <?php
             foreach ($admins as $admin) {
            ?>

            <div class="content-block content-block-horizantal">
                
                <div class="content-block-ttl">Informații de bază</div>     

                <div class="content-block-main">
                    <input type="hidden" value="<?php echo $admin->admin_id; ?>" name="id">
                    <div class="content-input">
                        <img src="public/images/--><?php //echo $admin->pic; ?><!--" style="height: 150px;" alt="">
                        <input type="file" name="user_pic">
                    </div>
                    <div class="content-input">
                        <label><text>*</text>Nume utilizator : </label>
                        <input type="text" class="input-text" name="username"
                               value="<?php echo $admin->user_name; ?>" placeholder="Nume utilizator" required>
                        <p class="content-input-error-name"></p>
                    </div>
                    <div class="row content-input">
                        <div class="col-sm-6">
                            <label>
                                <text>*</text>
                                Nume : </label>
                            <input type="text" class="input-text" name="firstname"
                                   value="<?php echo $admin->first_name; ?>" placeholder="Nume">
                            <p class="content-input-error-name"></p>
                        </div>
                        <div class="col-sm-6">
                            <label>Prenume : </label>
                            <input type="text" class="input-text" name="lastname"
                                   value="<?php echo $admin->last_name; ?>" placeholder="Prenume">
                            <p class="content-input-error-name"></p>
                        </div>
                    </div>
                    <div class="row content-input">
                        <div class="col-sm-6">
                            <label>Email : </label>
                            <input type="text" name="email" value="<?php echo $admin->email; ?>"
                                   placeholder="Email" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <text>*</text>
                                Telefon : </label>
                            <input type="number" class="input-mobile" name="mobile"
                                   value="<?php echo $admin->phone; ?>" pattern=".{6,}" placeholder="Telefon">
                            <p class="content-input-error-name"></p>
                        </div>
                    </div>

                    <div class="content-submit text-center">
                        <button type="submit" name="update" class="btn btn-primary">Salvează</button>
                    </div>
                </div>
            </div>
            <?php
            }
 ?>
		</form>
		<form class="col-sm-5" action="profile.php" method="post">
			<div class="content-block content-block-horizantal">
				<input type="hidden" name="_token" value="413ccea5ca6b8ce59e0da0d74a15110a305317f742542dcc5f09cc85ddf4f25288776a66377494dbf3154612b21c29b49cdcd6ee235b8ea2b77355d52eef0188">
				<input type="hidden" value="<?php echo $_SESSION['admin_id'];?>" name="id" >
				<div class="content-block-ttl">Schimbă parola</div>
                <p class="text-capitalize text-danger"><?php
                $admin =new admin();
                $admin->update_password();
                ?></p>
				<div class="content-block-main">
					<div class="content-input">
						<label>Parola curentă : </label>
						<input type="password" class="input-password" name="old-password" pattern=".{6,}" title="Minimum 6 word required!" placeholder="**********" required>
						<p class="content-input-error-name">
							
						</p>
					</div>
					<div class="content-input">
						<label>Parola : </label>
						<input type="password" class="input-password" name="new-password" pattern=".{6,}" title="Minimum 6 word required!" placeholder="**********" required>
						<p class="content-input-error-name"></p>
					</div>
					<div class="content-input">
						<label>Confirmă parola : </label>
						<input type="password" class="input-password" name="confirm-password" title="Minimum 6 word required!" pattern=".{6,}" placeholder="**********" required>
						<p class="content-input-error-name">
							
						</p>
					</div>
					<div class="content-submit text-center">
						<button type="submit" name="pass_update" class="btn btn-primary">Salvare</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Footer -->
<?php include ('include/footer.php'); ?>
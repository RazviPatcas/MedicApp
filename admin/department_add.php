
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<?php require ('class/departments.php')?>

<div class="page-container">
    <script>
        $('#themeoption').show();
        $('#themeoption-li>a').addClass('active');
    </script>

        <form action="department_add.php" method="post" enctype="multipart/form-data" siq_id="autopick_4656">
            <div class="page-hdr scroll-to-fixed-fixed" style="z-index: 9; position: fixed; top: 0px; margin-left: 0px; width: 920px; left: 60px;">
                <div class="row">
                    <div class="col-6 page-name">
                        <h1><i class="fa fa-hospital-o"></i>Adaugă departament</h1>
                    </div>
                    <div class="col-4 page-menu" style="padding-right: 50px">
                        <a id="cancel" href="department.php" data-toggle="tooltip" data-placement="left" title="" data-original-title="Înapoi la listă"><i class="fa fa-reply"></i></a>
                        <button type="submit" name="add_department" data-toggle="tooltip" data-placement="left" title="" data-original-title="Salvează"><i class="fa fa-floppy-o"></i></button>
                    </div>
                </div>
            </div><div style="display: block; width: 920px; height: 70px; float: none;"></div>
            <div class="content">
                <div class="content-block">
                    <?php
                        $dpt = new departments();
                        $dpt->add();
                    ?>
                    <div class="content-block-ttl">Detaliile departamentului</div>
                    <div class="content-block-main">
                        <input type="hidden" name="_token" value="413ccea5ca6b8ce59e0da0d74a15110a305317f742542dcc5f09cc85ddf4f25288776a66377494dbf3154612b21c29b49cdcd6ee235b8ea2b77355d52eef0188">
                        <div class="content-input">
                            <label><text>*</text>Nume : </label>
                            <input type="text" class="input-text" value="" name="name" placeholder="Numele departamentului" required="">
                            <p class="content-input-error-name"></p>
                        </div>
                        <div class="content-input">
                            <label><text>*</text>Descriere : </label>
                            <textarea class="textarea-input" name="description" placeholder="Descriere" required=""></textarea>
                            <p class="content-input-error-name"></p>
                        </div>
                        <div class="content-input">
                            <label><text>*</text>Poză departament :</label>

                            <input type="file" name="Poză" class="btn btn-info">

                        </div>
                      <!--  <div class="content-input">
                            <label>Name Of Speciality : </label>
                            <input type="text" class="input-text" value="" name="adj" placeholder="Enter Name Adjective" required="">

                        </div>-->
                    </div>
                </div>
                <input type="hidden" name="id" value="">
                <div class="content-submit text-center">
                    <button type="submit" name="add_department" class="btn btn-primary">Salvare</button>
                </div>
            </div>
        </form>
        <!-- Footer -->

<?php include ('include/footer.php');
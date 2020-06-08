
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<?php require('class/patients.php')?>

    <div class="page-container">
        <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
        <script src="public/js/jquery.fancybox.min.js"></script>
        <script>
            $('#patient').show();
            $('#patient-li>a').addClass('active');
            $("a.open-pdf").fancybox({
                'frameWidth': 800,
                'frameHeight': 800,
                'overlayShow': true,
                'hideOnContentClick': false,
                'type': 'iframe'
            });
        </script>


        <form action="" method="post" enctype="multipart/form-data" siq_id="autopick_7004">
            <div class="page-hdr scroll-to-fixed-fixed" style="z-index: 9; position: fixed; top: 0px; margin-left: 0px; width: 920px; left: 60px;">
                <div class="row col-sm-12">
                    <div class="col-sm-6 page-name">
                        <h1><i class="fa fa-users"></i>Adaugă pacient</h1>
                    </div>
                    <div class="col-sm-4 page-menu" >
                        <a id="cancel" href="patient.php" data-toggle="tooltip" data-placement="left" title="" data-original-title="înapoi la listă"><i class="fa fa-reply"></i></a>
                        <button type="submit" name="patient_submit" data-toggle="" data-placement="left" title="" data-original-title="Salvare"><i class="fa fa-floppy-o"></i></button>
                    </div>
                </div>
            </div><div style="display: block; width: 920px; height: 70px; float: none;"></div>
            <div class="content">
                <input type="hidden" name="_token" value="413ccea5ca6b8ce59e0da0d74a15110a305317f742542dcc5f09cc85ddf4f25288776a66377494dbf3154612b21c29b49cdcd6ee235b8ea2b77355d52eef0188">
                <div class="row">
                    <div class="col-sm-8">
                        <?php
                            $patient=new patients();
                            $patient->patient_add();
                        ?>

                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Detalii de bază</div>
                            <div class="content-block-main">
                                <div class="row content-input">
                                    <div class="col-sm-6">
                                        <label><text>*</text>Nume : </label>
                                        <input type="text" class="input-text" name="firstname" value="" placeholder="" required="">
                                        <p class="content-input-error-name">Te rog introdu un nume </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><text>*</text>Prenume : </label>
                                        <input type="text" class="input-text" name="lastname" value="" placeholder="" required="">
                                        <p class="content-input-error-name">Te rog introdu un prenume </p>
                                    </div>
                                </div>
                                <div class="row content-input">
                                    <div class="col-sm-6">
                                        <label><text>*</text>Email : </label>
                                        <input type="email" class="input-email" name="email" value="" placeholder="" required="">
                                        <p class="content-input-error-name">Te rog introdu o adresă de email </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><text>*</text>Telefon : </label>
                                        <input type="number" class="input-mobile" name="mobile" value="" placeholder="" min="1" required="">
                                        <p class="content-input-error-name">Te rog introdu un număr de telefon </p>
                                    </div>
                                </div>
                                <div class="content-input">
                                    <label><text>*</text>Parolă (min 6 caractere) :</label>
                                    <input type="password" class="input-password" pattern=".{6,}" title="Minimum 6 word required!" name="password" placeholder="" required="">
                                    <p class="content-input-error-name">Te rog introdu o parolă !</p>
                                    <div class="content-description">Această parolă va fi trimisă către utilizator </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Alte detalii</div>
                            <div class="content-block-main">
                                <div class="row content-input">
                                    <div class="col-sm-6">
                                        <label>Data nașterii : </label>
                                        <input type="date" name="dob" id="user-dob" value="" placeholder="Date of Birth (DD/MM/YY)" class="hasDatepicker">
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                                <div class="row content-input">
                                    <div class="col-sm-6">

                                        <label><text>*</text>Locație : </label>
                                        <select name="location" title="Select User Role" class="select-list" required="" id="ui-id-1" style="display: none;">
                                            <option value="">Selectează locația</option>
                                            <?php
                                            $sql = "SELECT * FROM locations ";
                                            $result = $pdo->prepare($sql);
                                            $result->execute();
                                            $locations = $result->fetchAll(); // default value PDO::FETCH_obj
                                            foreach ($locations as $location){
                                                ?>
                                                <option value="<?php echo $location->location_id;?>"><?php echo $location->name;?></option>

                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Grupa de sânge : </label>
                                        <select name="bloodgroup" title="Select User Role" class="select-list" required="" id="ui-id-1" style="display: none;">
                                            <option value="">Selectează grupa de sânge</option>
                                            <option value="O1">O1</option>
                                            <option value="A2">A2</option>
                                            <option value="B3">B3</option>
                                            <option value="AB4">AB4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row content-input content-radio">
                                    <div class="col-sm-12">
                                        <label>Sex : </label>
                                        <div class="content-radio-container">
                                            <div>
                                                <input type="radio" name="gender" value="Male" id="gender-male">
                                                <label for="gender-male"><span><i class="fa fa-check"></i></span><p>Masculin</p></label>
                                            </div>
                                            <div>
                                                <input type="radio" name="gender" value="Female" id="gender-female">
                                                <label for="gender-female"><span><i class="fa fa-check"></i></span><p>Feminin</p></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Istoric medical</div>
                            <div class="content-block-main">
                                <div class="content-radio">
                                   
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="diabetes" id="diabetes">
                                                    <label for="diabetes"><span><i class="fa fa-check"></i></span><p>Diabet</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="high-blood-pressure" id="high-blood-pressure">
                                                    <label for="high-blood-pressure"><span><i class="fa fa-check"></i></span><p>Hipertensiune arterială</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="high-cholesterol" id="high-cholesterol">
                                                    <label for="high-cholesterol"><span><i class="fa fa-check"></i></span><p>Colesterol</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="heart-problems" id="heart-problems">
                                                    <label for="heart-problems"><span><i class="fa fa-check"></i></span><p>Probleme cardiace</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="asthma" id="asthma">
                                                    <label for="asthma"><span><i class="fa fa-check"></i></span><p>Astm bronșic</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="kidney-disease" id="kidney-disease">
                                                    <label for="kidney-disease"><span><i class="fa fa-check"></i></span><p>Afecțiuni renale</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="kidney-stones" id="kidney-stones">
                                                    <label for="kidney-stones"><span><i class="fa fa-check"></i></span><p>Afecțiuni gastrice</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="jaundice" id="jaundice">
                                                    <label for="jaundice"><span><i class="fa fa-check"></i></span><p>Infarct</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="hepatitis" id="hepatitis">
                                                    <label for="hepatitis"><span><i class="fa fa-check"></i></span><p>Hepatită</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="rheumatic-fever" id="rheumatic-fever">
                                                    <label for="rheumatic-fever"><span><i class="fa fa-check"></i></span><p>Afecțiuni reumatice</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="cancer" id="cancer">
                                                    <label for="cancer"><span><i class="fa fa-check"></i></span><p>Cancer</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="hiv" id="hiv">
                                                    <label for="hiv"><span><i class="fa fa-check"></i></span><p>HIV/AIDS</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="epilepsy" id="epilepsy">
                                                    <label for="epilepsy"><span><i class="fa fa-check"></i></span><p>Epilepsie</p></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 content-radio-container">
                                                <div>
                                                    <input type="checkbox" name="medical[]" value="blood-thinners" id="blood-thinners">
                                                    <label for="blood-thinners"><span><i class="fa fa-check"></i></span><p>Blood thinners</p></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-input">
                                    <label>Alte detalii : </label>

                                    <textarea name="medical[]" placeholder="Alte boli decât cele menționate de mai sus" ></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="content-block content-block-horizantal">
                            <div class="content-block-ttl">Pentru uz administrativ</div>
                            <div class="content-block-main">
                                <div class="content-input">
                                    <label>Rolul utilizatorului : </label>
                                    <select name="role" title="Select User Role" class="select-list" required="" id="ui-id-1" style="display: none;">
                                        <option value="1">Pacient</option>
                                        <?php
                                            $sql = "SELECT * FROM roles ";
                                            $result = $pdo->prepare($sql);
                                            $result->execute();
                                            $roles = $result->fetchAll(); // default value PDO::FETCH_obj

                                        foreach ($roles as $role){
                                            ?>
                                            <option value="<?php echo $role->role_id;?>"><p class="text-capitalize"><?php echo $role->role_name;?></p></option>

                                            <?php
                                        }

                                        ?>



                                    </select>
<!--                                    <span tabindex="0" id="ui-id-1-button" role="combobox" aria-expanded="false" aria-autocomplete="list" aria-owns="ui-id-1-menu" aria-haspopup="true" title="Select User Role" class="ui-selectmenu-button ui-selectmenu-button-closed ui-corner-all ui-button ui-widget"><span class="ui-selectmenu-icon ui-icon ui-icon-triangle-1-s"></span><span class="ui-selectmenu-text">Patient</span></span>-->
                                    <div class="content-description">
                                    Dacă doriți să le oferiți unui administrator un utilizator, atunci selectați rolul altfel nu selectați. Acesta va atribui automat rolul pacientului utilizatorului.                                    </div>
                                </div>
                                <div class="content-input">
                                    <label>Nume utilizator : </label>
                                    <input type="text" name="username" value="" placeholder="">
                                    <div class="content-description">
                                    Dacă doriți să dați un utilizator admin, atunci completați acest câmp, altfel lăsați-l gol.
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="">
                </div>
                <div class="content-submit text-center">
                    <button type="submit" name="patient_submit" class="btn btn-primary">Salvare</button>
                </div>
            </div>
        </form>

        <!-- Footer -->
<?php include ('include/footer.php');?>





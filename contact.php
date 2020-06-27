<?php include('include/header.php');?>
<?php $page_name = "<i class='fa fa-phone'> </i> Contact"; ?>
<?php include('include/nav.php');?>

<div class="page-ttl" style="height: auto;">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <div class="page-ttl-name">
                <h1><i class="fa fa-phone" style="color: #fff"></i> Contactați-ne</h1>
            </div>
        </div>
    </div>
</div>

<div class="layer-stretch animated-wrapper">
    <div class="layer-wrapper">

        <div class="row text-center">
             <div class="col-md-3 contact-info-block animated animated-up">
                <div class="contact-info-inner">
                    <i class="fa fa-plus-square-o"></i>
                    <span>Programare</span>
                    <p class="paragraph-medium paragraph-black">0359821342</p>
                    <p>medicapp@yahoo.com </p>
                </div>
            </div>
             <div class="col-md-3 contact-info-block animated animated-up">
                <div class="contact-info-inner">
                    <i class="fa fa-phone"></i>
                    <span>Telefon</span>
                    <p class="paragraph-medium paragraph-black">0359821342</p>
                </div>
            </div>
            <div class="col-md-3 contact-info-block animated animated-up">
                <div class="contact-info-inner">
                    <i class="fa fa-envelope"></i>
                    <span>Email</span>
                    <p class="paragraph-medium paragraph-black">medicapp@yahoo.com</p>
                </div>
            </div>
            <div class="col-md-3 contact-info-block animated animated-up">
                <div class="contact-info-inner">
                    <i class="fa fa-map-marker"></i>
                    <span>Locația</span>
                    <p class="paragraph-medium paragraph-black">Oradea,Bihor</p>
                    <p> </p>
                </div>
            </div>
                </div>
    </div>
</div>

<div id="contact-form">
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="layer-ttl">
                <h3>Realizează o cerere</h3>
            </div>
            <div class="layer-container">
                <form class="contact-form row" action="" method="post">
                    <input type="hidden" name="_token" value="15276e55e6cdfa6911f440f75f64501dc97cc6f4a19102dddb4c47f0c4dd1523ad639943996afef209d6a358056f3b3389a9bcb175b7413ef3547589673a2b7d">
                    <div class="col-md-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user"></i>
                            <input id="contact-name" class="mdl-textfield__input" type="text" name="name" pattern="[A-Z,a-z, ]*" value="">
                            <label class="mdl-textfield__label" for="contact-name">Nume</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-envelope-o"></i>
                            <input class="mdl-textfield__input" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="contact-email">
                            <label class="mdl-textfield__label" for="contact-email">Email</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-phone"></i>
                            <input class="mdl-textfield__input" type="text" name="mobile" pattern="[0-9]*" id="contact-mobile">
                            <label class="mdl-textfield__label" for="contact-mobile">Telefon</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-rocket"></i>
                            <input class="mdl-textfield__input" type="text" name="subject" id="contact-subject">
                            <label class="mdl-textfield__label" for="contact-subject">Subiect</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-paper-plane"></i>
                            <textarea class="mdl-textfield__input" type="text" name="message" id="contact-message"></textarea>
                            <label class="mdl-textfield__label" for="contact-message">Mesaj</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button id="contact-submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised mdl-button--raised button button-primary button-pill" name="make-request">Înregistrare</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="map" class="animated-wrapper">
    <div class="map-wrapper">
        <div id="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5281.966710972321!2d21.924381279342818!3d47.05259074222466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474647e368762353%3A0x1b55a486d65d5344!2sOradea!5e0!3m2!1sro!2sro!4v1587652079118!5m2!1sro!2sro" width="1350" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <div class="map-address animated animated-up">
        <div class="map-icon">
            <i class="fa fa-map-marker"></i>
        </div>
        <div class="map-address-ttl">Locația noastră</div>
        <div class="paragraph-medium paragraph-black">Oradea,Bihor,Romania</div>
    </div>
</div>

<?php include('include/make_appointment.php');?>
    <?php include('include/footer.php');?>
<script>

    $('#page>a').addClass('active');
</script>
<?php session_start();

if (isset($_SESSION['admin_name'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medic App</title>
    <link rel="icon" type="image/x-icon" href="public/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" id="zsiqscript" defer="" src="https://salesiq.zoho.com/widget"></script>
    <script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="public/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script src="public/js/custom.js"></script>
    <link rel="stylesheet" href="https://css.zohostatic.com/salesiq/Sep_10_2018_2_https/styles/floatbutton.css">
    <script src="https://js.zohostatic.com/salesiq/Sep_10_2018_2_https/js/floatbutton.js"></script>
</head>
<body>

<!-- -->
<br>
<div class="page-ttl-name">
    <h1 style = "text-align:center; color:#32C1CE;" ><i class="fa fa-user"></i></i> Administrare</h1>
</div>
<div class="lgn-wrapper">
    <div id="login-form" class="lgn-form ">
        <form class="form-vertical" action="include/verify_user.php" method="post" siq_id="autopick_8519">
            <input type="hidden" name="_token" value="413ccea5ca6b8ce59e0da0d74a15110a305317f742542dcc5f09cc85ddf4f25288776a66377494dbf3154612b21c29b49cdcd6ee235b8ea2b77355d52eef0188">
            <div class="lgn-input form-group">
                <br>
                <label class="control-label col-sm-12">Nume de utilizator</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="username" id="lgn-mail" placeholder="Introdu numele de utilizator" autocomplete="off">
                </div>
            </div>
            <div class="lgn-input form-group">
                <label class="control-label col-sm-12">Parolă</label>
                <div class="col-sm-12">
                    <input type="password" name="password" id="lgn-pass" class="form-control" placeholder="Introdu parola" autocomplete="off">
                </div>
            </div>
            <div class="lgn-forgot">
                <a href="../forget_pass.php">Ai uitat parola?</a>
            </div>
            <div class="lgn-submit">
                <a href="../" style="background: #00c192" class="btn btn-primary btn-lg col-5" name="login">Acasă</a>

                <button style="background:#35c0ce" type="submit" id="lgn-submit" class="btn btn-primary btn-lg col-5" name="login">Autentificare</button>

            </div>
        </form>
    </div>
</div>
</body>
</html>
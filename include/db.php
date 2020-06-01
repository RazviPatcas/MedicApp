<?php

    //connection PDO
    $pdo = new PDO("mysql:host=localhost;dbname=medicapp",'root','');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); ?>
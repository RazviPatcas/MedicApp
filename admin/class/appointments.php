<?php

class appointments
{
    function all(){
        global $pdo;
        $sql = "SELECT * FROM appointment order By id desc ";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }

}
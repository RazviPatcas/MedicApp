<?php
class subscriber
{
    function all(){
        global $pdo;
        $sql = "SELECT * FROM subscribers";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }
}
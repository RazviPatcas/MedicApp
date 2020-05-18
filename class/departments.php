<?php
class departments
{
    function all(){
        global $pdo;
        $sql = "SELECT * FROM departments ORDER By name ASC ";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }
    function count() {
        global $pdo;
        $sql = "SELECT * FROM departments";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result->rowCount();
    }
    function find($id){
        global $pdo;
        $sql = "SELECT * FROM departments where id = $id ";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }
}
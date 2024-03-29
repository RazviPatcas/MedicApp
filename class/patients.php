<?php

class patients
{
    function count() {
        global $pdo;
        $sql = "SELECT * FROM patients";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result->rowCount();
    }
    function find($id){
        global $pdo;
        $sql = "SELECT * FROM patients WHERE patient_id = $id";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }
    function location($id){
        global $pdo;
        $sql = "SELECT * FROM locations WHERE location_id = :id";
        $result = $pdo->prepare($sql);
        $result->execute(['id'=>$id]);
        return $result;
    }

    function username_exist($username){
        global $pdo;
        $sql = "SELECT * FROM patients WHERE username = '{$username}'";
        $result = $pdo->prepare($sql);
        $result->execute();
        if ($result->rowCount()){
            return true;
        }else return false;
    }
    function email_exist($mail){
        global $pdo;
        $sql = "SELECT * FROM patients WHERE email = '{$mail}'";
        $result = $pdo->prepare($sql);
        $result->execute();
        if ($result->rowCount()){
            return true;
        }else{ return false;}
    }

    function add(){
        global $pdo;
        if (isset($_REQUEST['register_patient'])){

            $fname      = trim($_REQUEST['firstname']);
            $lname      = trim($_REQUEST['lastname']);
            $mail       = trim($_REQUEST['email']);
            $mobile     = trim($_REQUEST['mobile']);
            $gender     = trim($_REQUEST['gender']);
            $username   = trim($_REQUEST['username']);
            $blood_group = trim($_REQUEST['blood']) ;
            $location    = trim($_REQUEST['location']) ;
            $password   = hash('sha512',$password);

            if ($this->username_exist($username)){
                echo "<h2 class='text-center text-danger text-capitalize'> Încearcă alt nume utilizator, acesta există în baza de date </h2>";
            }else if ($this->email_exist($mail)){
                echo "<h2 class='text-center text-danger text-capitalize'> Încearcă alt email, acesta există în baza de date </h2>";
            }else if (!empty($username)){


                $sql  = "INSERT INTO `patients` (`first_name`, `last_name`, `user_name`, `password`, `email`, `blood_group`, `gender`, `phone`, `location_id`, `created_at`,`medical_history`) " ;
                $sql .= "VALUES ('$fname','$lname','$username','$password','$mail','$blood_group','$gender','$mobile',$location,now(),'')";

                $result = $pdo->prepare($sql);
                $result->execute();

                if ($result){
                    echo '<h2 class="text-center text-success "> Pacient înregistrat cu succes ! <a href="login.php">Autentificare</a></h2>';
                }else
                    echo '<h2 class="text-center text-danger"> Înregistrarea pacientului a eșuat ! <a href="login.php"></a></h2>';


            }
        }
    }


}
<?php

require('hospitals.php');
$hos = new hospitals();
class doctors
{

    function all(){
        global $pdo;
        $sql = "SELECT * FROM doctors";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }
    function find($id){
        global $pdo;
        $sql = "SELECT * FROM doctors WHERE id =? ";
        $result = $pdo->prepare($sql);
        $result->execute([$id]);
        return $result;
    }
    function doctor_dpt($id){
        global  $pdo;
        $sql2 = "SELECT * FROM departments WHERE id = :id";
        $r = $pdo->prepare($sql2);
        $r->execute(['id'=>$id]);
        $dpts = $r->fetchAll();

        foreach ($dpts as $dpt){
            echo $dpt->name_adj;
        }
    }
    function count() {
        global $pdo;
        $sql = "SELECT * FROM doctors";
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result->rowCount();
    }
    function username_exist($username){
        global $pdo;
        $sql = "SELECT * FROM doctors WHERE username = '{$username}'";
        $result = $pdo->prepare($sql);
        $result->execute();
        if ($result->rowCount()){
            return true;
        }else return false;
    }
    function email_exist($mail){
        global $pdo;
        $sql = "SELECT * FROM doctors WHERE email = '{$mail}'";
        $result = $pdo->prepare($sql);
        $result->execute();
        if ($result->rowCount()){
            return true;
        }else{ return false;}
    }

    function add(){
        global $pdo;
        if (isset($_REQUEST['register_doctor'])){

            $fname      = trim($_REQUEST['firstname']);
            $lname      = trim($_REQUEST['lastname']);
            $mail       = trim($_REQUEST['email']);
            $degree     = trim($_REQUEST['degree']);
            $hospital_id   = trim($_REQUEST['hospital']);
            $department_id = trim($_REQUEST['department']);
            $mobile     = trim($_REQUEST['mobile']);
            $gender     = trim($_REQUEST['gender']);
            $username   = trim($_REQUEST['username']);
            $password   = trim($_REQUEST['password']);
 //           $paraf_code = $_POST["paraf_code"];
            
            $password   = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

            $img        =   $_FILES['photo']['name'];
            $img_temp   =   $_FILES['photo']['tmp_name'];


            if ($this->username_exist($username)){
                echo "<h3 class='text-center text-danger'>Încercați alt nume utilizator, acesta există în baza de date !</h3>";
            }else if ($this->email_exist($mail)){
                echo "<h3 class='text-center text-danger'>Încercați alt email, acesta există în baza de date !</h3>";
            }else if (!empty($degree) || !empty($hospital_id) || !empty($department_id) || !empty($username)){

                move_uploaded_file($img_temp,"public/uploads/{$img}");

                $sql = "INSERT INTO `doctors`(`first_name`, `last_name`, `email`, `phone`, `gender`, `username`, `password`,`photo`, `degree`, `department_id`,`experience`, `hospital_id`, `created_at`) " ;
                $sql .= "VALUES ('$fname','$lname','$mail','$mobile','$gender','$username','$password','$img','$degree',$department_id,0,$hospital_id,now())";

                $result = $pdo->prepare($sql);
                $result->execute();

                if ($result){
                    echo '<h2 class="text-center text-primary">Înregistrare finalizată ! <a href="login.php">Autentificare</a></h2>';
                }else
                    echo '<h2 class="text-center text-danger">Înregistrare eșuată ! <a href="login.php"></a></h2>';
            
            }
        }
    }
    function find_doctors_by_location($location_id){
        global $pdo;
        $sql = "SELECT * FROM `doctors`WHERE doctors.hospital_id IN(SELECT hospitals.id FROM hospitals WHERE hospitals.location_id = :id)";
        $result = $pdo->prepare($sql);
        $result->execute(['id'=>$location_id]);
        return $result;
    }
    function remaining_doctors_after_finding_by_location($location_id){
        global $pdo;
        $sql = "SELECT * FROM `doctors`WHERE doctors.hospital_id not IN(SELECT hospitals.id FROM hospitals WHERE hospitals.location_id = :id)";
        $result = $pdo->prepare($sql);
        $result->execute(['id'=>$location_id]);
        return $result;

    }

}
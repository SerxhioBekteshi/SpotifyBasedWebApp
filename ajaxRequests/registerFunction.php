<?php 

    include("../connection/connectionPDO.php");
    session_start();

    if(isset($_POST['emri']) && isset($_POST['mbiemri']) && isset($_POST['email']) && isset($_POST['adresa'])
    && isset($_POST['telefoni']) && isset($_POST['pass']) && isset($_POST['passK']) && isset($_POST['qyteti'])
    && isset($_POST['roli']) && isset($_POST['genre']) && isset($_POST['username']) )
    {
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $adresa = $_POST['adresa'];
        $telefoni = $_POST['telefoni'];
        $pass = $_POST['pass'];
        $passK = $_POST['passK'];
        $qyteti = $_POST['qyteti'];
        $roli = $_POST['roli'];
        $gener = $_POST['genre'];
        $userName = $_POST['username'];

    }
    
    $errorMessage = array();
    $errorMessage2 = array();

    if(empty($emri))
        $errorMessage['emri'] = "Fill Name";

    if(empty($mbiemri))
        $errorMessage['mbiemri'] = "Fill Surname";

    if(empty($email))
        $errorMessage['email'] = "Fill Email";

    if(empty($adresa))
        $errorMessage['adresa'] = "Fill Adress";

    if(empty($telefoni))
        $errorMessage['telefoni'] = "Fill Tel";
 
    if( empty($pass) )
    $errorMessage['password'] = "Fill Pass";

    if(empty($passK))
    $errorMessage['passK'] = "Fill Confirm Pass";
 
    if(empty($qyteti))
    $errorMessage['qyteti'] = "Fill City";

    if(empty($roli))
    $errorMessage['roli'] = "Please Select whether you will open the account as an artist or as a user";

    if($roli != "user")
    {
        if(empty($gener))
        $errorMessage['genre'] = "Fill the gender you apply as an artist";
    
        if(empty($userName))
        $errorMessage['username'] = "Fill your account userName please";
    }
   
    if($pass != $passK)
    $errorMessage = "Passwords do not match. Please re-write";

    if(count($errorMessage) == 0)
    {
        $query1 = "INSERT INTO `registration` (`emri`, `mbiemri`, `email`, `adresa`, `telefoni`,`pass`,`passK`,`qyteti`, `roli`)
        VALUES (:emri, :mbiemri, :email, :adresa, :telefoni, :pass, :passK, :qyteti, :roli)";

        $query2 = "INSERT INTO `login` (`emriUser`, `email`, `password`, `roli`) VALUES (:emriUser, :email, :password, :roli)";

        $query3 = "INSERT INTO `artisti` (`emri`, `Genre`) VALUES (:emri, :Genre)";
        $result3 = $conn->prepare($query3);
        $result3->execute(['emri' => $userName,'Genre'=>$gener]);

        $result = $conn->prepare($query1);
        $result2 = $conn->prepare($query2);

        $result->execute([
            ':emri' => $emri, 
            ':mbiemri' => $mbiemri,
            ':email' => $email, 
            ':adresa' => $adresa,
            ':telefoni' => $telefoni,
            ':pass' => $pass, 
            ':passK' => $passK, 
            ':qyteti' => $qyteti,
            ':roli' => $roli
        ]);

        $result2->execute(['emriUser' => $emri,'email'=>$email, 'password'=>$pass, 'roli'=>$roli]);


        $pergjigjeNeDb = array();
        if($result == true && $result2 == true && $result3 == true)
        {
            $pergjigjeNeDb['sakte'] = 1;
        }
        else
        {
            $pergjigjeNeDb['gabim'] = -1;
        }

        echo json_encode($pergjigjeNeDb); 
    }
    else 
    {
        echo json_encode($errorMessage);
    }
?>
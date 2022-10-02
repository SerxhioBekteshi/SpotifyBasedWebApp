<?php 
    include("../connection/connectionPDO.php");
    session_start();

    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']))
        header("location: login.php");
    else 
    {
        $user = $_SESSION['user'];
        $userID = $_SESSION['userID'];
    }

    $old = "";
    $new = "";
    $newConf = "";

    // if( isset($_POST['user']) )
    //     $user = $_POST['user'];

    if(isset($_POST['old']) && isset($_POST['new']) && isset($_POST['newConf']) )
    {
       $old = $_POST["old"];
       $new =   $_POST["new"];
       $newConf =   $_POST["newConf"];
      
    }

    $errorMessage = [];
    
    if( empty($old) )
        $errorMessage['old'] = "You have not entered your old passwod";

    if( empty($new) )
        $errorMessage['new'] = "You have not entered new passwod";

    if( empty($newConf) )
        $errorMessage['newConf'] = "Please confirm new Password";

    $stmt = $conn->prepare("SELECT * FROM `login` WHERE emriUser = :user ");
    $stmt->execute(array(':user' => $user));
    $result = $stmt->fetchAll();
    foreach($result as $row)
    {
        $getOldPass = $row['password'];
    }

    if(!empty ($old) )
    {
        if($getOldPass != $old)
            $errorMessage['checkOld'] = "Your old password does not match";
    }

    if(!empty ($new) && !empty ($newConf))
    {
        if($new != $newConf)
             $errorMessage['checkNew'] = "Your new password does not match the confirm new password";
    }

    if(count($errorMessage) == 0)
    {
        $query = "UPDATE `login` SET `password` = :pass WHERE emriUser = :user";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            array(
            ':pass' => $new,  
            ':user' => $user        
            )
        );
        $pergjigjeNeDb = array();
        if($stmt == true)
        {
            $pergjigjeNeDb['sakte'] = 1;
        }
        else
        {
            $pergjigjeNeDb['gabim'] = 1;
        }

        echo json_encode($pergjigjeNeDb); 
    }
    else
        echo json_encode($errorMessage)

?>
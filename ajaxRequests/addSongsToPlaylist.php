<?php

    include("../connection/connectionPDO.php");
    session_start();

    $user = "";
    $userID = "";

    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']))
        header("location: login.php");
    else 
    {
        $user = $_SESSION['user'];
        $userID = $_SESSION['userID'];
    }

    $kenget = [];
    $idP = "";
    if(isset($_POST['kenget']) && isset($_POST['id']) && isset($_POST['emriPlayliste']) )
    {
        $kenget = $_POST['kenget'];
        $idP = $_POST['id'];
        $emriP = $_POST['emriPlayliste'];
    }

   
    $response = "";
    for($i = 0; $i<count($kenget); $i++)
    {
        
        $query = "INSERT INTO `listeplaylist` (`idP`,`emriP`,`userID`,`kengeID`) VALUES (:idP, :emriplaylist, :userID, :kengeID)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array( 'idP' =>  $idP, 'emriplaylist' => $emriP, 'userID' => $userID, 'kengeID' => $kenget[$i]) );

        if($stmt==true)
        {
            $response = true;
        }
        else
        {
            $response = false;
        }
    }

    echo json_encode($idP);
    exit();

?>
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

    $idP= "";
    if(isset($_POST['id']))
    {
        $idP = $_POST['id'];
    }

    $query = "DELETE FROM `listeplaylist` WHERE idP = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute(array( 'id' => $idP ) );

    $query2 = "DELETE FROM `playlist` WHERE idP = :id";
    $stmt2 = $conn->prepare($query2);
    $stmt2->execute(array( 'id' => $idP ) );


    $response = "";
    if($stmt==true && $stmt2==true)
    {
        $response = true;
    }
    else
    {
        $response = false;
    }

    echo json_encode($response);
    exit();

?>
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

    $idKenges = "";
    if(isset($_POST['id']))
    {
        $idKenges = $_POST['id'];
    }

    $query = "DELETE FROM `listeplaylist` WHERE kengeID = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute(array( 'id' => $idKenges ) );

    $response = "";
    if($stmt==true)
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
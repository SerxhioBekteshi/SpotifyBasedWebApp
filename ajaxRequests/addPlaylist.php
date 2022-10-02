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

    $emriPlaylist = "";
    if(isset($_POST['emriP']))
    {
        $emriPlaylist = $_POST['emriP'];
    }

    $query = "INSERT INTO `playlist` (`emriP`,`idUser`) VALUES (:emriPlaylist, :idUser)";
    $stmt = $conn->prepare($query);
    $stmt->execute(array( 'emriPlaylist' =>  $emriPlaylist, 'idUser' => $userID ) );

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
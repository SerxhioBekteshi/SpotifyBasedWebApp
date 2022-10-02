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

    $idP = "";
    if(isset($_GET['idP']))
    {
        $idP = $_GET['idP'];
    }

    $result=array();
    //$result["data"] = [];
    // $sql = "SELECT * FROM  `listeplaylist` INNER JOIN ONWHERE userID = $userID AND idP = $idP";
    $sql = "SELECT kenget.id, kenget.emriKenges, kenget.imazhiK, kenget.idAlbumi, kenget.idArtisti, artisti.emri, album.emriA
    FROM  ((`kenget` INNER JOIN `listeplaylist` ON kenget.id = listeplaylist.kengeID)
    INNER JOIN `artisti` ON artisti.id = kenget.idArtisti ) 
    INNER JOIN `album` ON album.idA = kenget.idAlbumi WHERE userID = $userID AND idP = $idP";

    $stmt = $conn->query($sql);
    while($row=$stmt->fetch())
    {
        $result[]=$row;
    }

    $data = [];
    foreach($result as $r)
    {
        $sub_array = array();
        $sub_array["imazhiK"] =   $r["imazhiK"];
        $sub_array["emriKenges"] =   $r["emriKenges"];
        $sub_array["emri"] =   $r["emri"];
        $sub_array["emriA"] =   $r["emriA"];
        $sub_array["id"] =   $r["id"];
        $data[] = $sub_array;
        
    }

    //print_r($result);

    header('HTTP/1.1 200');
    echo json_encode($data);
    exit();
?>
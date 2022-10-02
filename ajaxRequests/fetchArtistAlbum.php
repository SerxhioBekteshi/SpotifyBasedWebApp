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

    $arr=array();
    $sql = "SELECT album.idA, album.emriA, album.imazhiAlbumit, album.ReleaseDate, artisti.id, artisti.emri FROM `album`
    INNER JOIN `artisti` on artisti.id = album.idArtisti WHERE artisti.emri = :emriUser AND artisti.id = album.idArtisti";
    $result = $conn->prepare($sql);
    $result->execute(array('emriUser' => $user));
    if($result != null)
    {
        while($row=$result->fetch())
        {
            $arr[]=$row;
        }
    }

    $data = [];
    foreach($arr as $r)
    {
        $sub_array = array();
        $sub_array["idA"] =   $r["idA"];
        $sub_array["emriA"] =   $r["emriA"];
        $sub_array["imazhiAlbumit"] =   $r["imazhiAlbumit"];
        $sub_array["ReleaseDate"] =   $r["ReleaseDate"];
        $data[] = $sub_array;

    }

    $response = array (
        'data' =>$data,
        'error' => "You have no albums released yet"
    ); 

    echo json_encode($response);
    exit();

?>
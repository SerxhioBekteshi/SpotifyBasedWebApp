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


    $limit = 2;
    $arr=array();
    $sql = "SELECT kenget.id, kenget.emriKenges, kenget.imazhiK, kenget.source, artisti.emri FROM `kenget`
    INNER JOIN `artisti` on artisti.id = kenget.idArtisti WHERE artisti.emri = :emriUser AND artisti.id = kenget.idArtisti 
    ORDER BY kenget.id desc LIMIT 0,".$limit;
    $result = $conn->prepare($sql);
    $result->execute(array('emriUser' => $user));
    if($result != null)
    {
        while($row=$result->fetch())
        {
            $arr[]=$row;
        }
    }

    $count = 0;
    $data = [];
    foreach($arr as $r)
    {
        $sub_array = array();
        $sub_array["id"] =   $r["id"];
        $sub_array["emriKenges"] =   $r["emriKenges"];
        $sub_array["imazhiK"] =   $r["imazhiK"];
        $sub_array["source"] =   $r["source"];
        $data[] = $sub_array;
        $count++;
    }


    // $count_query = "SELECT count(*) as allcount, kenget.id, kenget.emriKenges, kenget.imazhiK, kenget.source, artisti.id, artisti.emri FROM `kenget`
    // INNER JOIN `artisti` on artisti.id = kenget.idArtisti WHERE artisti.emri = :emriUser AND artisti.id = kenget.idArtisti";
    // $count_result = $conn->prepare($count_query);
    // $count_result =
    // $count_fetch = mysqli_fetch_array($count_result);
    // $postCount = $count_fetch['allcount'];
    // $limit = 3;

    $response = array (
        'data' =>$data,
        'count' =>$count,
        'error' => "You have no songs released yet"
    ); 

    echo json_encode($response);
    exit();

?>
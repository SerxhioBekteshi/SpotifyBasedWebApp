<?php 
    include("../connection/connectionPDO.php");

    $idA = "";
    $idArtisti = "";
    if(isset($_POST['idAl']) && isset($_POST['idAr']))
    {
        $idA = $_POST['idAl'];
        $idArtisti = $_POST['idAr'];

    }

    $arr = array();
    $query = "SELECT kenget.id, kenget.source, kenget.imazhiK, kenget.emriKenges, artisti.emri FROM `kenget`  
    INNER JOIN `artisti` on artisti.id = kenget.idArtisti 
    WHERE idAlbumi = :idA AND idArtisti = :idAr";
    $result = $conn->prepare($query);
    $result->execute(array("idA" =>$idA, ":idAr" =>$idArtisti));
    if($result != null)
    {
        while($row = $result->fetch())
        {   
            $arr[] = $row;
        }
    }

    
    $data = [];
    foreach($arr as $r)
    {
        $kenga = [];
        $kenga['id'] = $r['id'];

        $kenga['img'] = "foto/albume/".$r['imazhiK'];
        $kenga['name'] = $r['emriKenges'];
        $kenga['artist'] = $r['emri'];
        $kenga['music'] = "audio/".$r['source'];
        $data[] = $kenga;

    }

    echo json_encode($data);

?>
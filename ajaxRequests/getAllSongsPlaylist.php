<?php 
    include("../connection/connectionPDO.php");

    $id = "";
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
    }

    $sql = "SELECT kenget.id, kenget.source, kenget.imazhiK, kenget.emriKenges, artisti.emri
    FROM `kenget` 
    INNER JOIN `listeplaylist` ON listeplaylist.kengeID = kenget.id 
    INNER JOIN `artisti` on artisti.id = kenget.idArtisti;";
    $result = $conn->prepare($sql);
    $result->execute();
    $arr = [];
    
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

        // $kenga['emri'] = $r['emri'];
        // $kenga['source'] = $r['source'];
        // $kenga['imazhiK'] = $r['imazhiK'];
        // $kenga['emriKenges'] = $r['emriKenges'];

        $kenga['img'] = "foto/albume/".$r['imazhiK'];
        $kenga['name'] = $r['emriKenges'];
        $kenga['artist'] = $r['emri'];
        $kenga['music'] = "audio/".$r['source'];
        $data[] = $kenga;

    }

    echo json_encode($data);

?>
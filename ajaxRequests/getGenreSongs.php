<?php 
    include("../connection/connectionPDO.php");

    $generid = "";
    if(isset($_POST['id']))
    {
        $generid = $_POST['id'];
    }

    $name = "";

    $query = "SELECT * FROM `genres` WHERE id = :id ";
    $stmt = $conn->prepare($query);
    $stmt->execute([":id" => $generid]);
    if($stmt == true)
    {
        while($row = $stmt->fetch())
        {
            $name = $row['GenreName'];
        }
    }

    $jsonGenre = array();
    $query = "SELECT artisti.genre, artisti.id FROM `artisti`";
    $result = $conn->prepare($query);
    $result->execute();

    if($result != null)
    {
        while($row = $result->fetch())
        {
            $stringa = $row['genre'];
            $string_parts = explode(", ", $stringa);            
            for($i = 0; $i< count($string_parts); $i++)
            {
                if($string_parts[$i] === $name)
                    $jsonGenre[$row['id']] = $string_parts;
            }
        }
    }

    // $jsonObject = json_encode($jsonGenre);
    // echo json_encode($jsonGenre);
    // $jsonObject = json_encode($jsonGenre);
    // echo $jsonGenre;
    $data = [];
    $keys = array_keys((array)$jsonGenre);
    for($i = 0 ; $i < count($keys); $i++)
    {
        $sql = "SELECT kenget.id, kenget.source, kenget.imazhiK, kenget.emriKenges, artisti.emri
        FROM `kenget` INNER JOIN `artisti` on artisti.id = kenget.idArtisti WHERE artisti.id = :id";
        $result = $conn->prepare($sql);
        $result->execute( [ ":id" => $keys[$i] ] );

        if($result == true)
        {
            $arr = [];

            while($row = $result->fetch())
            {
                $arr[] = $row;
            }
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

        }
    }

    
    echo json_encode($data);

?>
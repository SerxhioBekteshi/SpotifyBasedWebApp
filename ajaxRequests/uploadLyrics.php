<?php
    require("../connection/connectionPDO.php");

    $lyrics = "";
    $id = "";
    if(isset($_POST['value']) && isset($_POST['id']))
    {
        $lyrics = $_POST["value"];
        $id = $_POST["id"];
    }

    $errorMessage = array();

    if(empty($lyrics))
        $errorMessage['lyrics'] = "EMPTY FIELD";

    if(count($errorMessage) == 0)
    {
      
        $sql = "UPDATE `kenget` SET Lyrics = :lyrics WHERE id = :id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute( [ ':lyrics' =>  $lyrics, ":id" => $id] );
        $pergjigjeNeDb = array();
        if($stmt == true)
        {
            $pergjigjeNeDb['sakte'] = 1;
        }
        else
        {
            $pergjigjeNeDb['gabim'] = 1;
        }

        echo json_encode($pergjigjeNeDb); 
    }
    else 
    {
        echo json_encode($errorMessage);
    }
?>
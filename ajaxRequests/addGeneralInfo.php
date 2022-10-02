<?php
    require("../connection/connectionPDO.php");

    $generalInfo = "";
    $id = "";
    if(isset($_POST['value']) && isset($_POST['id']))
    {
        $generalInfo = $_POST["value"];
        $id = $_POST["id"];
    }

    $errorMessage = array();

    if(empty($generalInfo))
        $errorMessage['generalInfo'] = "EMPTY FIELD";

    if(count($errorMessage) == 0)
    {
      
        $sql = "UPDATE `artisti` SET generalInfo = :generalInfo WHERE id = :id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute( [ ':generalInfo' =>  $generalInfo, ":id" => $id] );
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
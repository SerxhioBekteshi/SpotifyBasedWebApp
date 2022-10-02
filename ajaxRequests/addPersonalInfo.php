<?php
    require("../connection/connectionPDO.php");

    $personalInfo = "";
    $id = "";
    if(isset($_POST['value2']) && isset($_POST['id']))
    {
        $personalInfo = $_POST["value2"];
        $id = $_POST["id"];
    }

    $errorMessage = array();

    if(empty($personalInfo))
        $errorMessage['personalInfo'] = "EMPTY FIELD";

    if(count($errorMessage) == 0)
    {
      
        $sql = "UPDATE `artisti` SET personalLife = :personalInfo WHERE id = :id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute( [ ':personalInfo' =>  $personalInfo, ":id" => $id] );
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
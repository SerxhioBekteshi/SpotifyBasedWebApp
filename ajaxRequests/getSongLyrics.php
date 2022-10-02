<?php
    require("../connection/connectionPDO.php");

    $lyrics = "";
    $id = "";
    if(isset($_POST['id']))
    {
        $id = $_POST["id"];
    }

      
    $sql = "SELECT kenget.Lyrics FROM `kenget`  WHERE id = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute( [ ":id" => $id] );
    if($stmt != null)
    {
        while($row=$stmt->fetch())
        {
            $lyrics=$row['Lyrics'];
        }
    }
    

    echo json_encode($lyrics);
     
?>
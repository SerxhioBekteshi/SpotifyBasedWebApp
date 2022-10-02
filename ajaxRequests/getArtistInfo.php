<?php
    require("../connection/connectionPDO.php");   

    $result=array();

    $sql = "SELECT * FROM `artisti`";
    $stmt = $conn->query($sql);
    while($row=$stmt->fetch())
    {
        $result[]=$row;
    }

    $data = [];
    foreach($result as $r)
    {
        $sub_array = array();
        $sub_array["id"] = $r["id"];
        $sub_array["emri"] = $r["emri"];
        $sub_array["imazhi"] =   $r["imazhi"];
        $sub_array["Genre"] =   $r["Genre"];
        $sub_array["personalLife"] =   $r["personalLife"];
        $sub_array["generalInfo"] =   $r["generalInfo"];
        // $sub_array["email"] =  $r["email"];
        // $sub_array["adresa"] = $r["adresa"];
        // $sub_array["telefoni"] =  $r["telefoni"];
        // $sub_array["qyteti"] =  $r["qyteti"];
        // $sub_array["b1"] = /*'<button type="button" name="update" id="'.*/$r["id"]; /*.'" data-target="#exampleModalEdit" class="btn btn-primary btn-sm update">Edit</button>';*/
        // $sub_array["b2"] = /*'<button type="button" name="delete" id="'.*/$r["id"]; /*.'" class="btn btn-danger btn-sm delete">Delete</button>';*/
        $data[] = $sub_array;
        
    }

    //print_r($result);

    $response = array (
        'data' => $data  
    );

    header('HTTP/1.1 200');
    echo json_encode($response);
    exit();

?>
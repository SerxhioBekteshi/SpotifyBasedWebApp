<?php 
    $conn = new mysqli ("localhost", "root", "", "spotify");

    if(!$conn)
    {
        echo "LIDHJA ME DATABAZEN DESHTOI";
    }
    else
        echo '';

?>
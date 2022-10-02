<?php 
    // $img = $_FILES["image"]["name"];
    // $tmp = $_FILES["image"]["tmp_name"]; 
    // $errorimg = $_FILES["image"]["error"];
    include("connection/connectionPDO.php");
    session_start();

    $artisti = "";
    if(isset($_POST['artisti']))
    {
        $artisti = $_POST['artisti'];
    }
 
    echo "".$artisti;
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    $path = 'C:/xampp/htdocs/spotify/foto/'; // upload directory

    echo isset($_FILES['image']);
    if(isset($_FILES['image']))
    {
        // $release = $_POST['releaseDate'];
        // $albumName = $_POST['albumName'];
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final_image); 
            if(move_uploaded_file($tmp,$path)) 
            {
                // echo "<img src='$path' />";
                             
                //insert form data in the database
                // $query = "INSERT INTO `album` (`emriA`, `imazhiAlbumit`, `ReleaseDate`, `idArtisti`) VALUES (:emri, :imazhi, :releaseDate, :artisti)";
                // $result = $conn->prepare($query);
                // $result->execute([
                //     ':emri' => $albumName, 
                //     ':imazhi' => $img,
                //     ':releaseDate' => $release, 
                //     ':artisti' => $artisti]);

                // if($result)
                //     echo json_encode("Album Uploaded Successfully");       
            }
        } 
        else 
        {
            echo json_encode("invalid");
        }
    }

?>
<?php 
    include("connection/connectionPDO.php");
    session_start();


    $userID = "";
    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']) || !isset($_SESSION['roli']))
        header("location: login.php");
    else 
    {
        $user = $_SESSION['user'];
        $userID = $_SESSION['userID'];
        $roli = $_SESSION['roli'];

    }
    //GET ARTIST DATA
    $idAr = "";
    $albumName ="";
    $imazhi = "";
    $gener = "";
    $emri = "";
    $query = "SELECT id, imazhi, emri, Genre  FROM artisti WHERE emri = :emri ";
    $result = $conn->prepare($query);
    $result->execute(array('emri' => $user));
    if($result != null)
    {
        while($row=$result->fetch())
        {
            $idAr = $row["id"];
            $emri = $row['emri'];
            $imazhi = $row['imazhi'];
            $gener = $row['Genre'];

        }
    }
    
    $query = "SELECT * FROM `registration` WHERE id = :userID";
    $stm = $conn->prepare($query);
    $stm->execute(array(":userID" => $userID));
    $result = $stm->fetchAll();
    $data = [];
    foreach($result as $row)
    {
        $data[] = $row;
    }

    $successMessage = "";
    $errorMessage = "";
    $img = "";
    if(isset($_POST['addI']))
    {
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'jfif'); // valid extensions
        $path = 'C:/xampp/htdocs/spotify/fotoUpload/artist/'; // upload directory

        if(isset($_FILES['image']))
        {
            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
        
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            // $final_image = rand(1000,1000000).$img;
            if(in_array($ext, $valid_extensions)) 
            { 
                // $path = $path.strtolower($final_image); 
                // if(move_uploaded_file($tmp,$path)) 
                // {
                    $query = "UPDATE artisti SET imazhi = ? WHERE id = ? ";
                    $result = $conn->prepare($query);
                    $result->execute([
                        $img, 
                        $idAr ]);

                    if($result)
                    {
                        
                        move_uploaded_file($_FILES['image']['tmp_name'],'C:/xampp/htdocs/spotify/foto/artist/'.$img);
                        // header('Location: profileData.php');
                        $successMessage = "Your profile picture was uploaded successfully";  
                    }
                    else 
                    $errorMessage = "Your profile picture was uploaded successfully";  
                // }                        

            } 
        }   
        else 
        {
            echo 'invalid';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("BootstrapJquery/BootstrapJquery.php") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/artistpage2.css" />

</head>
<body>
    <?php if($roli == 'artist') 
    {  ?>
        <div class="wrapper2">
            <div class="section">
                <!-- <div class="top_navbar">
                    <div class="hamburger">
                        <a href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </div>
                </div> -->
                <div class="container my-2">
                    <div class="row">
                        <div class="col-md-2 my-auto mx-auto">
                            <button type="button" class = "btn btn-light  mb-3" data-bs-toggle="modal" data-bs-target="#uploadImage"
                            > Upload/Edit Profile Picture </button>
                    
                        </div>
                        <div class="col-md-10">
                            <?php include("profile.php") ?>
                        </div>
                        <?php $img ?>
                    </div>
                </div>
            </div>

        <?php include("sidebar.php") ?>
        <div id="error"><?php echo $errorMessage ?></div>
        <div id="success"><?php echo $successMessage ?></div>
    </div>
    <?php } 
        else if ($roli == "user")
        { 
            include("navbar.php");
            include("profile.php");
        }
    ?>
    <div class="modal fade" id="uploadImage" tabindex="-1" aria-labelledby="uploadImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadImageLabel"> Upload Image </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="form" action="" method="post" enctype="multipart/form-data">
                        <input id="uploadImage" type="file" accept="image/*" name="image" />
                        <input type="submit" name = "addI" class="btn btn-success" value = "Upload"/>

                    </form>
                    

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("modals/PasswordModal.php") ?>
    <?php include("modals/AlbumSongModal.php") ?>

</body>
    <script src = "changePass.js"></script>
    <script>
        $(document).ready(function()
        {
            $("#success-alert").hide();

        });
    </script>
</html>
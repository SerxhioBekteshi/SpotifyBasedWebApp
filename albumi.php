<?php 
    include("connection/connection.php");
    session_start();

    $idalbumit = "";
    $idArtisti = "";
    if(isset($_GET['idalbumi']))
    {
        $idalbumit = $_GET['idalbumi'];
        $idArtisti = $_GET['idArtisti'];
    }

    $user = "";
    $userID = "";
    $roli = "";
    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']) || !isset($_SESSION['roli']))
        header("location: login.php");
    else 
    {
        $user = $_SESSION['user'];
        $userID = $_SESSION['userID'];
        $roli = $_SESSION['roli'];

    }

    $arr = [];
    $query = "SELECT * FROM `kenget` WHERE idAlbumi = '$idalbumit' AND idArtisti = $idArtisti";
    $result = $conn->query($query);
    $nrRows = $result->num_rows;
    if($nrRows != 0)
    {
        while($row = $result->fetch_assoc())
        {   
            $arr[] = $row;
        }
    }

    $arr2 = [];
    $query2 = "SELECT * FROM `album` WHERE idA = '$idalbumit'";
    $result2= $conn->query($query2);
    $nrRows2 = $result2->num_rows;
    if($nrRows != 0)
    {
        while($row = $result2->fetch_assoc())
        {   
            $arr2[] = $row;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("BootstrapJquery/BootstrapJquery.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/artisti.css"> 
    <link rel="stylesheet" href="MusicPlayer/style.css"/>
</head>
<body>
    <?php 
        // if($roli == "user")
            include("navbar.php");
        // else 
        //     include("sidebar.php");
    ?>


    <?php 
    $emrialbumit = "";
    $imazhi = "";
    foreach($arr2 as $row)
    { 
        $emrialbumit = $row['emriA'];
        $imazhi = $row['imazhiAlbumit'];
    }?>
    

    <nav class="navbar" style = "height: 150px; background-color: #2d3436;
                background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
                
        <div class="container-fluid">
            <div class = "mx-auto" > 
                <span>
                    <img src="foto/albume/<?php echo $imazhi ?>" alt="" style = "border-radius: 35%; height:100px; margin-right: 100px;">
                </span>
                <span class="text-light" style = "font-size: 40px;">
                    <?php echo $emrialbumit; ?>
                </span>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style ="background-color: #7f5a83;
    background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%); height: 100vh">
        <div class = "container" style = "width: 800px">
            <div class="kenget row">
                <!-- <?php foreach($arr as $row)
                { ?>
                    <div class="col-md-12 my-2 py-1 hh text-center" >
                        <div class="row"> 
                            <div class="col-md-4 my-auto">
                                <img class = "img-fluid  mb-1" src="foto/albume/<?php echo $row['imazhiK']; ?>" alt=""
                                    style = "object-fit: cover;  width: 50px; height: 50px; border-radius: 20%" > 
                                </div>

                                <div class="col-md-4 my-auto">
                                <p class = "fw-bold"><?php echo $row['emriKenges']; ?></p>
                                </div>

                                <div class="col-md-4 my-auto">
                                <button type = "button" class = "btn btn-sm btn-success play" style = "border-radius: 100%"id = "<?php echo $row['id']?>">
                                    <i class = "bi bi-play-fill"></i></button>
                            </div>
                        </div>
                    </div>
                <?php } ?> -->
            </div>
        </div>

        <?php include("MusicPlayer/musicplayer.php") ?>

    </div>

    <?php include("modals/PasswordModal.php") ?>

</body>
    <script src = "MusicPlayer/script.js"></script>
    <script src = "changePass.js"></script>
    <script>
         $(document).ready(function()
        {
            $("#success-alert").hide();

            <?php
                echo "var idAr ='$idArtisti';";
            ?>                
            <?php
                echo "var idAl ='$idalbumit';";
            ?> 
            console.log("Artist", idAr, "Albumi", idAl)

            $.ajax(
            {
                url:"ajaxRequests/getAlbumSongs.php",
                method:"POST",
                dataType: "JSON",
                data: { idAl: idAl, idAr: idAr  },
                success:function(response)
                {                
                    for (let i in response) 
                    {
                        $(".kenget ").append(`
                        <div class="col-md-12 my-2 py-1 hh text-center" >
                            <div class="row"> 
                                <div class="col-md-4 my-auto">
                                    <img class = "img-fluid  mb-1" src="${response[i].img}" alt=""
                                        style = "object-fit: cover;  width: 50px; height: 50px; border-radius: 20%" > 
                                    </div>

                                    <div class="col-md-4 my-auto">
                                    <p class = "fw-bold">${response[i].name}</p>
                                    </div>

                                    <div class="col-md-4 my-auto">
                                    <button type = "button" class = "btn btn-sm btn-success play" style = "border-radius: 100%" id = ${response[i].id}>
                                        <i class = "bi bi-play-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        `);
                    }
                    music_list = response;
                    // console.log(music_list);
                    loadTrack(track_index);

                }
            });
        });

        $(document).on("click", '.play', function()
        {
            var id = $(this).attr("id");
            console.log("SONG ID", id);
            for (var index = 0; index < music_list.length; ++index) 
            {
                var idSection = music_list[index];
                if(idSection.id == id)
                {
                    console.log("INDEKSI KU NDODHET ", idSection.name, index);
                    loadTrack(index);
                    playTrack();
                }
            }
        });

    </script>
</html>
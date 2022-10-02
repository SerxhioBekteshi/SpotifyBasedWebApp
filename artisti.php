<?php 
    include("connection/connection.php");
    session_start();

    $user = "";
    $userID = "";
    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']))
        header("location: login.php");
    else 
    {
        $user = $_SESSION['user'];
        $userID = $_SESSION['userID'];
    }


    $idArtisti = "";
    if(isset($_GET['idArtisti']))
    {
        $idArtisti = $_GET['idArtisti'];
    }

    $arr = [];
    $query = "SELECT * FROM `artisti` WHERE id = '$idArtisti'";
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
    $query2 = "SELECT * FROM `album` WHERE idArtisti = '$idArtisti'";
    $result2 = $conn->query($query2);
    $nrRows2 = $result2->num_rows;
    if($nrRows2 != 0)
    {
        while($row2 = $result2->fetch_assoc())
        {   
            $arr2[] = $row2;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("BootstrapJquery/BootstrapJquery.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/artisti.css">
    <link rel="stylesheet" href="MusicPlayer/style.css">

</head>
<body>
    <?php include("navbar.php") ?>
    <?php foreach($arr as $row)
        $emri = $row['emri'];
        $imazhi = $row['imazhi']; 
        $personalInfo = $row['personalLife'];
        $generalInfo = $row['generalInfo'];
    ?>

    <nav class="navbar" style = "height: 150px; background-color: #2d3436;
                background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <div class="container-fluid">
            <span class="text-light"><?php echo $emri ?></span>
            <span class = "text-center"> 
                <img src="foto/artist/<?php echo $imazhi ?>" class = "img-fluid" alt="" style = "border-radius: 35%; height:100px">
            </span>
            <span class = "text-right text-light"><?php echo $user; ?></span>
        </div>
    </nav>

    <div class="container-fluid" style = "background-color: #7f5a83;
    background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%); padding: 0; margin: 0;">
        <div class="row">
            <div class = "bg-dark mb-4 text-light text-center "> 
                <h2> DISCOGRAPHY </h2> 
                <p> <a style = "" class = "biography"> Biography </a> </p>
                <div class = "carrier">
                    <div class="row">
                        <div class="col-md-6">
                            <h4> Personal Life </h4>
                            <div class = "personalLife">
                                <?php echo $personalInfo ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4> General Info </h4>
                            <div class = "generalInfo">
                                <?php echo $generalInfo ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container songs" style = "width: 800px;"></div>

        </div>

            <div class="container ">
                <h4 class = "mt-5 text-center">View <?php echo $emri ?>'s Albums</h4>
                <div class="row">
                    <?php foreach($arr2 as $row)
                    { ?>
                        <div class="col-md mb-2  ">

                            <div class="card-box" >
                                <div class="card-body text-center text-white my-auto" style ="height: 250px;">
                                        <img src="foto/albume/<?php echo $row['imazhiAlbumit']?>" class="card-img-top p-3 mx-auto" alt="..."
                                            style = "object-fit: cover;  width: 200px; height: 150px; border-radius: 25%">

                                        <h5 class="card-title"><?php echo $row['emriA']?></h5>
                                        <p class="card-text"><?php echo $row['ReleaseDate']?></p>
                                </div>
                                
                                <div class="card-footer text-center">
                                    <a href="albumi.php?idalbumi=<?php echo $row['idA']?>&idArtisti=<?php echo $idArtisti?>" class="btn btn-warning">View Album</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>

        <?php  include("MusicPlayer/musicplayer.php") ?> 
    </div>
      

    <?php include("modals/PasswordModal.php") ?>

</body>
    <script src = "changePass.js"></script>
    <script src = "MusicPlayer/script.js"></script>

    <script>

        $(document).ready(function()
        {
            $("#success-alert").hide();

            let id = <?php echo $idArtisti ?>;
            let emri = "<?php echo $emri ?>";
            console.log(id, emri)
            $(".carrier").hide();
            $.ajax(
            {
                url:"ajaxRequests/getAllArtistSongs.php",
                method:"POST",
                dataType: "JSON",
                data: {
                    id: id, emri: emri
                },
                success:function(response)
                {          
                    
                    // console.log(response);
                    for (let i in response) 
                    {
                        $(".songs").append(
                            `
                            <div class="col-md-12 hh my-2 py-1 text-center">
                                <div class="row">
                                    <div class="col-md-4 my-auto">
                                    <img class = "img-fluid  mb-1" src="${response[i].img}" alt=""
                                        style = "object-fit: cover;  width: 50px; height: 50px; border-radius: 20%" > 
                                    </div>

                                    <div class="col-md-4 my-auto">
                                    <p class = "fw-bold">${response[i].name}</p>
                                    </div>

                                    <div class="col-md-4 my-auto">
                                    <button type = "button" class = "btn btn-sm btn-success playSong" style = "border-radius: 100%"id = ${response[i].id}>
                                        <i class = "bi bi-play-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                            `
                        )
                    }
                    music_list = response;
                    console.log(music_list);
                    loadTrack(track_index);
                }
            });
        })

        $(".biography").on("click", function()
        {
            $(".carrier").toggle();
        });
        

        $(document).on("click", ".playSong", function()
        {
            var id = $(this).attr("id");
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
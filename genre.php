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

    $idGenre = "";
    if(isset($_GET['genreId']))
    {
        $idGenre = $_GET['genreId'];
    }

    $genre = "";
    $query = "SELECT * FROM `genres` WHERE `id` = '$idGenre'";
    $result = mysqli_query($conn, $query);

   
    if($result->num_rows != 0)
    {
        while($row = $result->fetch_assoc())
        {
            $genre = $row['GenreName'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("BootstrapJquery/BootstrapJquery.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/genre.css">
    <link rel="stylesheet" href="MusicPlayer/style.css">

</head>
<body>
    <?php include("navbar.php") ?>

    <nav class="navbar" style = "height: 150px; background-color: #2d3436;
                background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%); padding: 0; margin: 0;">
        <h2 class = "text-center text-white mx-auto"> <?php echo $user ?> </h2>
    </nav>

    <div class="container-fluid pb-5" style = "background-color: #7f5a83;
    background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%); padding: 0; margin: 0;">
         <h2 class = "text-white text-center py-4"> Some songs for you for <?php echo $genre ?> </h2>
        <div class = "container songs" style = "width: 800px; padding-bottom: 10rem">
            
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

            let id = <?php echo$idGenre ?>;
            $.ajax(
            {
                url:"ajaxRequests/getGenreSongs.php",
                type:"POST",
                dataType: "JSON",
                data: { id: id },
                success:function(response)
                {          
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
                },
                error: function(error)
                {
                    console.log(error);
                }
            });
        })

        $(document).on("click", ".playSong", function()
        {
            var id = $(this).attr("id");
            console.log(id);
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
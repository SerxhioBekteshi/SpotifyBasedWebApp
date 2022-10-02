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

    $sql = "SELECT * FROM `kenget` ORDER BY RAND()";
    $result = $conn->query($sql);
    $nrRows = $result->num_rows;
    $arr3 = [];
    if($nrRows != 0)
    {
        while($row = $result->fetch_assoc())
        {
            $arr3[] = $row;
        }
    }

    $sql2 = "SELECT * FROM `playlist` WHERE `idUser` = '$userID'";
    $result2 = mysqli_query($conn, $sql2);
    $nrRows2 = $result2->num_rows;

    $queryIDKENGE = "SELECT * FROM `kenget`";
    $result3 = $conn->query($queryIDKENGE);
    $nrRows3 = $result3->num_rows;
    $arr = [];
    if($nrRows != 0)
    {
        while($row = $result->fetch_assoc())
        {
            $arr[] = $row;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>

    <?php include("BootstrapJquery/BootstrapJquery.php") ?>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="search/searchStyle.css" />
    <link rel="stylesheet" href="MusicPlayer/style.css"/>

    <style type = "text/css">
        .kot
        {
            background-color: #293038f6!important;
        }
        .hh
        {
            border-radius: 10px;
            color: white;
            background-color: rgba(39, 23, 23, 0.818)
            }

        .hh:hover
        {
            background-color: #7f53ac;
            background-image: linear-gradient(315deg, #7f53ac 0%, #647dee 74%);
        }
    </style>
</head>
<body>

    <?php include("navbar.php") ?>

        <div class="container-fluid" style = "background-color: #2d3436;
            background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%); color:white">
            <div class="row d-flex align-items-center justify-content-center">
                <div class = "col-md-4 text-center " >   
                    <i class="bi bi-image " style = "font-size: 80px"></i>
                </div>
                <div class = "col-md-4 text-center">
                        <h3> YOUR PLAYLIST LIST</h3>
                </div>
                <div class = "col-md-4 text-center ">
                    <h2><?php echo $user ?></h2>
                </div>
            </div>
        </div>

        <div class="container-fluid" style = "background-color: #7f5a83;
        background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%); height: 100vh">
            <?php include("search/search.php") ?>

            <?php if($nrRows2 == 0) 
            {?>
                <div class = "col-md-2" id = "noPlayliste"> 
                    NO PLAYLIST 
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#krijoPlaylist">
                        KRIJO PLAYLISTE 
                    </button>
                </div>
            <?php } 
            else 
            {  ?> 
                <div class="row">
                    <h4 class = "text-center text-white mt-2"> YOUR CREATED PLAYLISTS</h4>
                    <div class="col-md-6 d-flex align-items-center justify-content-center mb-2">
                        <div class="row">
                            <div class="container" style = "width: 450px; background-color: black">
                            <?php  while($row = $result2->fetch_assoc())
                            { ?>
                                <div class="col-md-12">
                                    <div class="row border-bottom border-dark my-2 ">
                                        <div class="col-md-4">
                                            <p class = "text-white playlist" id = "<?php echo $row['idP']?>">
                                            <?php echo $row['emriP'] ?> </p>
                                        </div>
                                        <div class="col-md-4">
                                            <button type='button' class='btn btn-success shtoKenge' data-bs-toggle='modal' 
                                            data-bs-target='#shtoKenge' id = '<?php echo $row['emriP'] ?>,<?php echo $row['idP']?>'> Add Song </button>
                                        </div>

                                        <div class="col-md-4">
                                            <button type='button' class='btn btn-danger deleteP' data-bs-toggle='modal' 
                                            data-bs-target='#deletePlaylist' id = '<?php echo $row['idP']?>'> Delete Playlist </button>
                                        </div>

                                    </div>
                                </div>    
                            <?php } ?>  
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center justify-content-center ">
                        <button  type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#krijoPlaylist">
                            CREATE PLAYLIST
                        </button> 
                    </div>

                </div>     
            <?php }?>  
            <br/>
            <div class="alert alert-success" id="success-alert2" style = "text-align:center"></div>
            <div class = "lista">      
                <div class="container" style = "width: 1000px">            

                </div>  
            </div>                    


            <!-- Modal OF SONGS  -->
            <div class="modal fade" id="shtoKenge" tabindex="-1" aria-labelledby="shtoKengeLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shtoKengeLabel">Create your desired playlist</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div style = "text-center"> 
                            <label for="">Search for the song...</label> 
                            <input type="text" >
                            </div>
                            <div class="row">
                                <?php 
                                foreach($arr3 as $row)
                                { ?> 
                                    <div class="col-md-12 mb-2 rounded border-primary " id =  "<?php echo $row['id']?>" style = "background-color: black">
                                        <div class = "d-flex aling-items-center justify-content-between ">
                                            <div>
                                                <img class = "img-fluid p-2 " src="foto/albume/<?php echo $row['imazhiK'];//echo $row['imazhiKenges']; ?>" alt=""
                                                style = "object-fit: cover;  width: 50px; height: 50px;" >
                                                <p class = "text-light"><?php echo $row['emriKenges']; ?></p>
                                                <!-- <p class = "text-light"> <?php echo $row['emri']; ?></p> -->
                                            </div>
                                            <div class = "">
                                                <button class = "btn btn-success shto mt-4 mx-3 addSong" id = "<?php echo $row['id']?>">
                                                    <i class = "bi bi-plus-circle"></i>
                                                </button>
                                                <button class = "btn btn-success shto mt-4 mx-3 removeSong" id = "<?php echo $row['id']?>">
                                                    <i class = "bi bi-dash-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveSongs">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL PER KRIJIMIN E PLAYLISTES -->
            <div class="modal fade" id="krijoPlaylist" tabindex="-1" aria-labelledby="krijoPlaylistLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="krijoPlaylistLabel">Create your desired playlist</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body"> 
                            <form action="" method = "POST">
                                <label for="" class = "form-label" > Emerto Playlisten </label>
                                <input class = "form-control" type="text" id = "emerPlaylist">
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary ruajPlaylist">Save changes</button>
                        </div>

                    </div>
                </div>
            </div>

            <?php include("MusicPlayer/musicplayer.php") ?>


        </div>


        <?php include("modals/PasswordModal.php") ?>


    <script src = "changePass.js"></script>
    <script src = "search/search.js"></script>
    <script src = "MusicPlayer/script.js"></script>
    <script>

    
    $(document).ready(function()
    {
        $("#success-alert").hide();
        $("#success-alert2").hide();
        $("#searchbox").hide();

        $.ajax(
        {
            url:"ajaxRequests/getAllSongsPlaylist.php",
            method:"POST",
            dataType: "JSON",
            success:function(response)
            {                
                music_list = response;
                // console.log(music_list);
                loadTrack(track_index);

            }
        });
    });

    let idPlaylist = "";
    $(".playlist").on("click", function()
    {
        $(".lista .container ").empty();
        idPlaylist = $(this).attr("id");

        $.ajax(
        {

            url:"ajaxRequests/fetchListPlaylist.php",
            type:"GET",
            dataType: 'JSON',
            data: 
            {
                idP: idPlaylist,
            },
            success: function(data) 
            {
                for (var kenga of data) 
                {
                    $(".lista .container ").append(`
                    <div class='col-md-12 hh my-1 py-1 text-center'> 
                        <div class="row">

                            <div class = "col-md-3 my-auto">
                                ${kenga.emriKenges} 
                            </div>

                            <div class="col-md-1 my-auto">
                                <img class = "img-fluid  mb-1" src = "foto/albume/${kenga.imazhiK}"  
                                style = "object-fit: cover;  width: 50px; height: 50px; border-radius: 20%" />

                            </div>

                            <div class="col-md-2 my-auto">
                                ${kenga.emri}
                            </div>

                            <div class="col-md-3 my-auto">
                                ${kenga.emriA}
                            </div>

                            <div class="col-md-1 my-auto">
                                <button type = "button" class = "btn btn-sm btn-success play" 
                                style = "border-radius: 100%" id = ${kenga.id} >
                                        <i class = "bi bi-play-fill"></i></button>                            
                            </div>

                            <div class="col-md-2 my-auto">
                                <button type = "button" class = "btn btn-sm btn-danger delete" 
                                 id = ${kenga.id} > Remove </button>                            
                            </div>
                        </div>
                    </div>
                    `
                    );
                } 
            },
            complete: function(json)
            {   
               
            },
        })     
      
    });


    $(document).on('click','.delete', function()
    {
        var id = $(this).attr("id");

        if(confirm("Are you sure you want to delete this song from this playlist ?"))
        {
            $.ajax(
            {
                url:"ajaxRequests/deleteSongPlaylist.php",
                method:"POST",
                data:
                {
                    id: id,
                },
                success:function(response)
                {
                    // window.location.reload();
                    console.log(response);
                }
            });
        }
        else
        {
            return false;
        }
    });

    //ADD PLAYLIST
    $(".ruajPlaylist").on("click", function()
    {
        var emriPlaylistes = $("#emerPlaylist").val();
        console.log(emriPlaylistes);
        // var id = $(this).attr("id");

        $.ajax(
        {
            url:"ajaxRequests/addPlaylist.php",
            method:"POST",
            data:
            {
                emriP: emriPlaylistes,
            },
            success:function(response)
            {
                $(".close").click();
                window.location.reload();
            }
        });
    }); 

    //DELETE PLAYLIST
    $(document).on('click','.deleteP', function()
    {
        var id = $(this).attr("id");

        if(confirm("Are you sure you want to delete this playist?"))
        {
            $.ajax(
            {
                url:"ajaxRequests/deletePlaylist.php",
                method:"POST",
                data:
                {
                    id: id,
                },
                success:function(response)
                {
                    // location.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });


    //SHTO KENGET PER TU SHTUAR NE ARRAY
    var arraySong = new Array();
    $(".addSong").click( function()
    {
        var id = $(this).attr("id");
        $(this).parent().parent().parent().addClass("kot");
        arraySong.push(id);

    });

    //HEQ KENGET NGA ARRAY QE NUK DO TI SHTOSH
    $(".removeSong").click( function()
    {
        var id = $(this).attr("id");
        $(this).parent().parent().parent().removeClass("kot");
        const index = arraySong.indexOf(id);
        if (index > -1) 
        {
            arraySong.splice(index, 1); // 2nd parameter means remove one item only
        }
    });

    //KOJ PJESA DUHET RREGULLUAR
    var overall = "";
    var idP = 0;
    var emri = "";
    $(".shtoKenge").on("click", function()
    {
        overall = $(this).attr("id");
        // console.log(overall);

        var array = overall.split(",");
        emri = array[0];
        idP = array[1];
        // console.log(emri, idP);

    });
    
   //SHTON KENGET NE PLAYLIST
    $(".saveSongs").on("click", function()
    {
        console.log(idP);
        $.ajax(
        {
            url: "ajaxRequests/addSongsToPlaylist.php",
            method: "POST",
            data: 
            { 
                id: idP,
                emriPlayliste: emri,
                kenget: arraySong,
            },
            success:function(response)
            {
                // console.log(response);
                // location.reload();
                $(".cancel").click();
                $("#success-alert2").text("Your songs were added successfully to the playlist");
                $("#success-alert2").fadeTo(1000, 1000).slideUp(500, function() 
                {
                    $("#success-alert2").slideUp(1000);
                });
            },
        });
      
    });

    $(document).on("click", '.play', function()
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
</body>
</html>
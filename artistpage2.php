<?php 
    include("connection/connectionPDO.php");
    session_start();

    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']))
        header("location: login.php");

    $idArtisti = $_SESSION['userID'];
    $emriUser = $_SESSION['user'];
    $roli = $_SESSION['roli'];

    //GET ARTIST DATA
    $idAr = "";
    $albumName ="";
    $imazhi = "";
    $gener = "";
    $emri = "";
    $query = "SELECT id, imazhi, emri, Genre  FROM artisti WHERE emri = :emri ";
    $result = $conn->prepare($query);
    $result->execute(array('emri' => $emriUser));
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
   
    //GET THE TIMEDATE WHEN THE ARTIST ADDS THE NEW ALBUM
    $timezone  = new DateTimeZone('Europe/Tirane');
    $today     = new DateTime('now', $timezone);
    $todayString = $today->format('Y-m-d ');

    //DECLARE TWO VARIABLE TO CARRY AN ERROR AND A SUCCESS MESSAGE
    $errorMesazhi = "";
    $successMessage = "";

    if(isset($_POST['addAALL']))
    {
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $path = 'C:/xampp/htdocs/spotify/fotoUpload/'; // upload directory

        //IF THERE ARE NOT EMPTY FIELDS
        if(isset($_FILES['image']) && isset($_POST["albumName"] ) )
        {
        
            $albumName = $_POST['albumName'];
            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            
            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // can upload same image using rand function
            // $final_image = rand(1000,1000000).$img;
            // check's valid format
            if(in_array($ext, $valid_extensions)) 
            { 
                // $path = $path.strtolower($final_image); 
                if(move_uploaded_file($tmp,$path)) 
                {

                    //insert form data in the database
                    $query = "INSERT INTO `album` (`emriA`, `imazhiAlbumit`, `ReleaseDate`, `idArtisti`) 
                    VALUES (:emri, :imazhi, :releaseDate, :artisti)";
                    $result = $conn->prepare($query);
                    $result->execute([
                        ':emri' => $albumName, 
                        ':imazhi' => $img,
                        ':releaseDate' => $todayString, 
                        ':artisti' => $idAr]);

                    if($result)
                    {
                        $albumStuff = array();
                        $albumStuff = getAlbumId($conn, $albumName);
                        $countfiles = count($_FILES['file']['name']);
                        for($i=0;$i<$countfiles;$i++)
                        {
                            $filename = $_FILES['file']['name'][$i];
                            $songName = substr($filename, 0, -4);
                            $emriKenges = getNormalSongName($songName);

                            $sql = "INSERT INTO `kenget` (`source`, `imazhiK`,`emriKenges`, `idArtisti`, `idAlbumi`) 
                            VALUES (:source, :imazhiK, :emriKenges, :idArtisti, :idAlbumi)";
                            $result = $conn->prepare($sql);
                            $result->execute( [
                                ':source' => $filename, 
                                ':imazhiK' => $albumStuff[1],
                                ':emriKenges' => $songName, 
                                ':idArtisti' => $idAr,
                                ':idAlbumi' => $albumStuff[0],
                            ]);

                            if($result)
                            {
                                move_uploaded_file($_FILES['file']['tmp_name'][$i],'C:/xampp/htdocs/spotify/audioUpload/'.$filename);
                                header('Location: artistpage.php');
                                $successMessage = "Your album was uploaded successfully";  

                            }
                        }

                    }
                }
            } 
            else 
            {
                $errorMesazhi = "INVALID FILE FORMAT";
            }
        }
        else 
            $errorMesazhi = "Please be sure to have filled the certain fields";
    }


    function getAlbumId($conn, $albumName)
    {
        $idA = "";
        $imazhiA = "";

        $query = "SELECT idA, imazhiAlbumit FROM album WHERE emriA = :emriA ";
        $result = $conn->prepare($query);
        $result->execute(['emriA' => $albumName,]);
        if($result != null)
        {
            while($row=$result->fetch())
            {
                $idA = $row["idA"];
                $imazhiA = $row["imazhiAlbumit"];
            }
        }
        return [$idA, $imazhiA];
    }

    function getNormalSongName($songName)
    {
        $string = "";
        for($i = 0; $i < strlen($songName) -1; $i++)
        {
            if( (ctype_lower($songName[$i]) && ctype_upper($songName[$i+1])) || (ctype_upper($songName[$i]) && ctype_upper($songName[$i+1])))
                $string .= $songName[$i] . " ";
            else 
                $string .= $songName[$i];

        }

        $string .= $songName[strlen($songName)-1];

        return $string;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <?php include("BootstrapJquery/BootstrapJquery.php") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/artistpage2.css" />
    <link rel="stylesheet" href="search/searchStyle.css" />
    <link rel="stylesheet" href="MusicPlayer/style.css"/>

    <style> 
        .wrapper {
            margin-left: -30px; padding-right: 250px; color: black;
        }
    </style>

</head>
<body>

    <div class="wrapper2">
        <?php include("search/search.php") ?>
        <div class="section">
            <!-- <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
            </div> -->
            <div class="container">
                <div class = "row"> 
                    <div class="col-md-3 ">
                        <div>
                        </div>
                    </div>

                <div class="col-md-9 text-center">
                    <h2> View your carrer songs </h2> 
                    <div class = "my-5"> 
                        <h2> Your albums </h2>
                        <div class="albumet row">
                            
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class = "my-5" style = 'padding-bottom: 5rem'> 
                        <h2> Your songs </h2>
                        <div class="kenget row">
                            
                        </div>
                        <div class="loadmore">
                            <input type="button" id="seeMore" value="Load More" class="btn btn-info">
                            <input type="hidden" id="row" value="0">
                            <input type="hidden" id="postCount" value = "">
                            </div>                    
                        </div>
                        <div class="errorS"></div>

                </div>
            </div>
            <?php include("MusicPlayer/musicplayer.php") ?>
        </div>
    </div>

        <?php include("sidebar.php") ?>
        <?php include("modals/PasswordModal.php") ?>

    <!-- </div> -->


    <?php include("modals/AlbumSongModal.php") ?>
    <?php include("modals/UploadLyricsModal.php") ?>

    
</body>
        <script src = "changePass.js"></script>
        <script src = "search/search.js"></script>
        <script src = "MusicPlayer/script.js"></script>


        <script>
            //   var hamburger = document.querySelector(".hamburger");
            //     hamburger.addEventListener("click", function(){
            //         document.querySelector("body").classList.toggle("active");
            //     })
            // $(".addAlbum").on("click", function(e)
            // {
            //     e.preventDefault();
               
            // });

            /*
                $("#success").fadeTo(500, 500).slideUp(500, function() 
                {
                    $("#success-alert").slideUp(500);
                });
            */

            $(document).ready(function()
            {   
                $("#success-alert").hide();
                $("#searchbox").hide();

                    <?php
                        echo "var jsvar ='$idArtisti';";
                    ?>                
                    <?php
                        echo "var ss ='$emriUser';";
                    ?>                
                    
                    $.ajax( 
                    {
                        url:"ajaxRequests/fetchArtistAlbum.php",
                        type:"POST",
                        dataType: 'JSON',
                        data:  { },
                        success: function(response) 
                        {
                            if(response.data.length != 0)
                            {
                                for (var albumi of response.data) 
                                {
                                    $(".albumet ").append(`
                                    <div class='col-md-12 hh my-1 py-1'> 
                                        <div class="row">
                                            <div class = "col-md-4 my-auto">
                                                <a href = "albumi.php?idalbumi=${albumi.idA}&idArtisti=<?php echo $idAr?>" class = "albumName"> ${albumi.emriA} </a> 
                                            </div>
                                            <div class="col-md-4 my-auto">
                                                <img class = "img-fluid  mb-1" src = 'foto/albume/${albumi.imazhiAlbumit}' class = "img-fluid text-center  p-1"  
                                                style = "object-fit: cover;  text-align: center; width: 50px; height: 50px;" />
                                            </div>

                                            <div class="col-md-4 my-auto">
                                                ${albumi.ReleaseDate}
                                            </div>
                                        </div>
                                    </div>
                                    `
                                    );
                                    
                                } 
                            }
                            else 
                            {
                                $(".error ").append(response.error);
                                $(".error ").css("color", "red");
                            }

                        },
                    });


                    $.ajax( 
                    {
                        url:"ajaxRequests/fetchArtistSong.php",
                        type:"POST",
                        dataType: 'JSON',
                        data:  { },
                        success: function(response) 
                        {
                            if(response.data.length != 0)
                            {
                                for (var kenget of response.data) 
                                {
                                    $(".kenget ").append(`
                                    <div class='col-md-12 hh my-1 py-1' > 
                                        <div class="row">
                                            <div class="col-md-4 my-auto">
                                                <img class = "img-fluid  mb-1" src = 'foto/albume/${kenget.imazhiK}' class = "img-fluid text-center  p-1"  
                                                style = "object-fit: cover;  text-align: center; width: 50px; height: 50px;" />
                                            </div>

                                            <div class="col-md-4 my-auto">
                                                ${kenget.emriKenges}
                                            </div>

                                            <div class="col-md-2 my-auto">
                                                <button type = "button" class = "btn btn-sm btn-success play" style = "border-radius: 100%" id = ${kenget.id}>
                                                <i class = "bi bi-play-fill"></i></button>
                                            </div>
                                            <div class="col-md-2 my-auto">
                                            <button type = "button" class = "btn btn-danger getText" 
                                            data-bs-toggle="modal"  style = "border-radius: 50%" data-bs-target="#uploadLyrics" id = ${kenget.id}>
                                                Upload Lyrics</button>
                                            </div>
                                        </div>
                                    </div>
                                    `);
                                }
                                
                                $("#postCount ").val(response.count)

                            }
                            else 
                            {
                                $(".errorS ").append(response.error);
                                $(".errorS ").css("color", "red");
                                // $("#postCount").hide();
                            }

                        }
                    });

                    $.ajax(
                    {
                        url:"ajaxRequests/getAllArtistSongs.php",
                        method:"POST",
                        dataType: "JSON",
                        data: { id: jsvar, emri: ss  },
                        success:function(response)
                        {                
                            music_list = response;
                            // console.log(music_list);
                            loadTrack(track_index);

                        }
                    });
            });

            // $("#uploadAlbum").on("submit", function(e)
            // {
            //     e.preventDefault();
            //     var artistId = <?php //echo json_encode($idArtisti); ?>;

            //     var file_data = $('#image').prop('files')[0];
            //     var form_data = new FormData();
            //     form_data.append('file', file_data);
            //     console.log(file_data);
            //     // var formData = new FormData(this);
            //     console.log(artistId);
            //     $.ajax(
            //     {
            //         url: "uploadAlbum.php",
            //         type: "POST",
            //         dataType: "json",
            //         data:  {
            //             data: form_data,
            //             artisti: artistId
            //         },
            //         contentType: false,
            //         cache: false,
            //         processData:false,
            //         beforeSend : function()
            //         {
            //             //$("#preview").fadeOut();
            //             $("#err").fadeOut();
            //         },
            //         success: function(response)
            //         {
            //             console.log(response);
            //             if(response == 'invalid')
            //             {
            //                 // invalid file format.
            //                 $("#err").html("Invalid File !").fadeIn();
            //             }
            //             else
            //             {
            //                 // view uploaded file.
            //                 $("#uploadAlbum")[0].reset(); 
            //             }
            //         },
            //         error: function(e) 
            //         {
            //             $("#err").html(e).fadeIn();
            //         }          
            //     });
            // });


            $("#seeMore").on("click", function()
            {
                var row = Number($('#row').val());
                var count = Number($('#postCount').val());
                var limit = 3;
                row = row + limit;
                $('#row').val(row);
                $("#seeMore").val('Loading...');
            
                $.ajax({
                    type: 'POST',
                    url: 'ajaxRequests/loadmoredata.php',
                    dataType: "JSON",
                    data: 'row=' + row,
                    success: function (data) 
                    {
                        var rowCount = row + limit;
                        $('#postList').append(data);
                        if (rowCount >= count) 
                        {
                            $('#seeMore').css("display", "none");
                            for (var kenget of data.data) 
                            {
                                $(".kenget ").append(`
                                <div class='col-md-12 hh my-1 py-1'> 
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <img class = "img-fluid  mb-1" src = 'foto/albume/${kenget.imazhiK}' class = "img-fluid text-center  p-1"  
                                            style = "object-fit: cover;  text-align: center; width: 50px; height: 50px;" />
                                        </div>

                                        <div class="col-md-4 my-auto">
                                            ${kenget.emriKenges}
                                        </div>

                                        <div class="col-md-2 my-auto">
                                            <button type = "button" class = "btn btn-sm btn-success play" style = "border-radius: 100%" id = ${kenget.id}>
                                            <i class = "bi bi-play-fill"></i></button>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                        <button type = "button" class = "btn btn-danger getText" 
                                            data-bs-toggle="modal"  style = "border-radius: 50%" data-bs-target="#uploadLyrics" id = ${kenget.id}>
                                                Upload Lyrics</button>
                                        </div>
                                    </div>
                                </div>
                                `);
                            }
                        } 
                        else 
                        {
                            $("#seeMore").val('Load More');
                        }
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
                        loadTrack(index);
                        playTrack();
                    }
                }
            });

            $(document).on("click", '.saveLyrics', function()
            { 
                var value = $('.lyrics').val();
                console.log(value);

                $.ajax({
                    url: "ajaxRequests/uploadLyrics.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {id: gid, value: value,  },
                    success: function(response)
                    {
                        for (var key in response) 
                        {
                            var v = response[key];
                            $("#"+key+"-error").text(v);
                            $("#"+key+"-error").css("color", "red");
                            $("#"+key+"-error").show();  
                            
                            if(key == "sakte")
                            {
                                $("#success-alert").text("You added successfully the lyrics for the song");
                                $("#success-alert").fadeTo(500, 500).slideUp(500, function() 
                                {
                                    $("#success-alert").slideUp(500);
                                });
                                $(".cancelModal").click();
                                $(".getText").hide();
                            }
                        }   
                    }
                });
            });
            let gid;

              
                $(document).on("click", '.getText', function()
                {
                    gid = $(this).attr("id");
                });
          


        </script>
</html>
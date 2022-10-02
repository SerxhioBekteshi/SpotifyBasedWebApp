<?php 
    include("connection/connection.php");
    session_start();

    // echo $_SESSION['userID'];

    $idK = rand(1, 4);
    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']))
        header("location: login.php");
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stilimiCard.css" />
    <link rel="stylesheet" href="search/searchStyle.css" />
    <link rel="stylesheet" href="MusicPlayer/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-drawer/1.0.6/css/bootstrap-drawer.css" integrity="sha512-XCuEKDcPnAgv4mfAbnCDP124hQOku3z6O/6ZCSt6KkKioAdK89+BoYvvtA+J8XZK9N1LkF5FvUUbysLFFtyqww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-drawer/1.0.6/js/drawer.min.js" integrity="sha512-Wh3lP9w7lSb/YxUiRVSCp3vB6K4mheETB2oxfSpPBFsqjUkChxZiRZ2jii+2gJ+rP1lDMy5dEiOvM4fkEN4WGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <?php include("navbar.php") ?>
    <div class="container-fluid" style = "background-color: #7f5a83; 
    background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%); margin:0; padding: 0; height: 100%
    ">      

            <?php include("search/search.php") ?>

            <!-- <div class = "container mb-5" style = "width: 800px;"> -->
                <h2 class = "text-white text-center mb-3"> Songs for you </h2> 
                <div class = "row">
                    <div class = "col-md-9">
                        <div class = "container mx-auto" style = "width: 800px;">
                            <?php 
                            $sql = "SELECT * FROM `kenget` ORDER BY RAND() LIMIT 5";
                            $result = $conn->query($sql);
                            $nrRows = $result->num_rows;
                            if($nrRows != 0)
                            {
                                while($row = $result->fetch_assoc())
                                { ?>

                                    <div class="col-md-12 hh my-2 py-1 text-center permbajtje">
                                        <div class="row">
                                            <div class="col-md-4 my-auto">
                                            <img class = "img-fluid  mb-1" src="foto/albume/<?php echo $row['imazhiK']; ?>" alt=""
                                                style = "object-fit: cover;  width: 50px; height: 50px; border-radius: 20%" > 
                                            </div>

                                            <div class="col-md-4 my-auto">
                                            <p class = "fw-bold"><?php echo $row['emriKenges']; ?></p>
                                            </div>

                                            <div class="col-md-2 my-auto">
                                            <button type = "button" title = "Play" class = "btn btn-sm btn-success play" style = "border-radius: 100%"id = "<?php echo $row['id']?>">
                                                <i class = "bi bi-play-fill"></i></button>
                                            </div>
                                            <div class="col-md-2 my-auto">
                                            <button type = "button" title = "Lyrics" class = "btn btn-sm btn-danger viewLyrics" id = "<?php echo $row['id']?>">
                                                <i class = "bi bi-card-text"></i></button>
                                                <!-- data-toggle="drawer" data-target="#drawer-2" class = "viewLyrics" style= "color: red" title = "Lyrics" id = "<?php echo $row['id']?>"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>   
                            <?php } ?>   
                        </div>
                    </div>
                    <div class = "col-md-3">
                        <div class = "container" >
                            <div class="lyrics text-white" >

                            </div>
                        </div> 
                    </div>
                </div>
                    
                    
                    <!-- Drawer -->
                    <!-- <div class="drawer drawer-right slide" tabindex="-1" role="dialog" aria-labelledby="drawer-2-title" aria-hidden="true" id="drawer-2" style = "width: 20%">
                        <div class="drawer-content" role="document">
                            <div class="drawer-header">
                                <h4 class="drawer-title" id="drawer-2-title">Drawer Title</h4>
                            </div>
                            <div class="drawer-body">
                                <div></div>
                            </div>
                            <div class="drawer-footer">Drawer footer</div>
                        </div>
                    </div> -->

            <!-- </div> -->
            
            <div class = "artistet px-5 mb-5" >
                <div>
                    <h2 class = "text-white text-center"> Artists for you </h2> 
                </div>
                <div class = "row justify-content-between">
                    <?php 

                    //id ose RAND , 
                    $sql = "SELECT * FROM `artisti` ORDER BY RAND()  LIMIT 5";
                    $result = $conn->query($sql);
                    $nrRows = $result->num_rows;
                    $postID = "";
                    if($nrRows != 0)
                    {
                        while($row = $result->fetch_assoc())
                        {  $postID = $row['id'];?>
                            <div class="col-md mb-2 permbajtje" >
                
                                <div class="card-box text-center" >
                                    <div class="user-pic">
                                        <img src="foto/artist/<?php echo $row['imazhi']?>" class="img-fluid img-center" alt="Singer Pic"
                                        style = "object-fit: cover;  width: 200px; height: 150px; border-radius: 100%">
                                    </div>
                                    <a href = "artisti.php?idArtisti=<?php echo $row['id']?>" class="card-title mb-3 text-decoration-none"><?php echo  $row['emri']; ?></a>
                                    <hr>
                                    <p><?php echo $row['Genre']; ?></p>
                                </div>

                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class = "albumet px-5" >
                <h2 class = "text-white text-center "> Albums for you </h2> 
                <div class = "row justify-content-between">
                    <?php 
                    $sql = "SELECT * FROM `album` ORDER BY RAND() LIMIT 5";
                    $result = $conn->query($sql);
                    $nrRows = $result->num_rows;
                    if($nrRows != 0)
                    {
                        while($row = $result->fetch_assoc())
                        { ?>
                        <!-- col-lg-3 col-md-3 col-sm-12 -->
                            <div class="col-md mb-2 permbajtje" >

                                <div class="card-box" >
                                    <div class="card-body text-center" style ="height: 250px;">
                                        <div class=" h1 mb-3">
                                            <img class = "img-fluid img-center" src="foto/albume/<?php echo $row['imazhiAlbumit']?>" alt="" 
                                            style = "object-fit: cover;  width: 200px; height: 150px; border-radius: 20%" >
                                        </div>
                                            <a href = "albumi.php?idalbumi=<?php echo $row['idA']?>&&idArtisti=<?php echo $row['idArtisti'] ?>" class="card-title mb-3 text-decoration-none"><?php echo  $row['emriA']; ?></a>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text">
                                            Release Date: <?php echo $row['ReleaseDate']; ?>
                                        </p>
                                    </div>
                                </div>
    
                            </div>
                        <?php } ?>   
                    <?php } ?>
                </div>
            </div>


            <div class = "genres px-5 my-5" style = "padding-bottom: 10rem">
                <div>
                    <h2 class = "text-white text-center"> Genres for you </h2> 
                </div>
                <div class = "row justify-content-between">
                    <?php 

                    //id ose RAND , 
                    $sql = "SELECT * FROM `genres` ORDER BY RAND() LIMIT 5";
                    $result = $conn->query($sql);
                    $nrRows = $result->num_rows;
                    $postID = "";
                    if($nrRows != 0)
                    {
                        while($row = $result->fetch_assoc())
                        {  $postID = $row['id'];?>
                            <div class="col-md mb-2 permbajtje" >
                
                                <div class="card-box text-center" >
                                    <div class="user-pic">
                                        <img src="foto/genres/<?php echo $row['GenreImage']?>" class="img-fluid img-center" alt="Genre Pic"
                                        style = "object-fit: cover;  width: 200px; height: 150px; border-radius: 20%">
                                    </div>
                                    <hr>
                                    <a href = "genre.php?genreId=<?php echo $row['id']?>" class="card-title mb-3 text-decoration-none"><?php echo $row['GenreName']?></a>
                                </div>

                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

    <?php include("MusicPlayer/musicplayer.php") ?>

    </div>
    <?php include("modals/PasswordModal.php") ?>

</body>


<script>
  
        var jsonArray = null;
        let music_list = null;
        
        let track_art = document.querySelector('.track-art');
        let track_name = document.querySelector('.track-name');
        let track_artist = document.querySelector('.track-artist');

        let playpause_btn = $(".playpause-track");

        let next_btn = document.querySelector('.next-track');
        let prev_btn = document.querySelector('.prev-track');

        let seek_slider = document.querySelector('.seek_slider');
        let volume_slider = document.querySelector('.volume_slider');
        let curr_time = document.querySelector('.current-time');
        let total_duration = document.querySelector('.total-duration');
        let wave = $('#wave');
        let randomIcon = document.querySelector('.fa-random');
        let curr_track = document.createElement('audio');

        let track_index = Math.floor(Math.random() * 5);
        let isPlaying = false;
        let isRandom = false;
        let updateTimer;

        // $('.container-fluid').on('click',function(){
        //     $("#searchbox").hide();
        // });
        // $('#my-other').on('show.bs.drawer', function(){
        //     $('#my-input').trigger('focus');
        // })

        $(document).on("click", ".viewLyrics", function()
        {
            var id = $(this).attr("id");
            $(".lyrics").empty();
            $.ajax(
            {
                url:"ajaxRequests/getSongLyrics.php",
                method:"POST",
                dataType: "JSON",
                data: { id: id, },
                success:function(response)
                {                
                    if($(".lyrics").length)
                        $(".lyrics").append(response);
                }
            });

        });

        $(document).ready(function()
        {
            $("#success-alert").hide();
            $("#searchbox").hide();

            $.ajax(
            {
                url:"ajaxRequests/getAllSongs.php",
                method:"POST",
                dataType: "JSON",
                success:function(response)
                {                
                    music_list = response;
                    console.log(music_list);
                    loadTrack(track_index);
 
                }
            });
        });
        
        $("#search").on("click", function()
        {
            kerko();
        });

        function kerko()
        {
            $("#searchbox").show();
            $('#searchbox').keyup(function()
            {
                // Search text
                var text = $(this).val();
                console.log(text);
                // Hide all content class element
                $('.permbajtje').hide();

                // Search and show
                $('.permbajtje:contains("'+text+'")').show();
            });
        }


        $(".play").on("click", function()
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
        })

        $(".changeP").on("click", function()
        {
            // var user = <?php echo json_encode($_SESSION['user']); ?>;
            var oldPass = $("#oldPassword").val();
            var newPass = $("#newPassword").val();
            var newPassConf = $("#confirmNewPassword").val();
            emptyEditErrorText();

            $.ajax(
                {
                    url: "ajaxRequests/changePass.php",
                    dataType: "json",
                    method: "POST",
                    data: {
                        // user: user,
                        old: oldPass,
                        new: newPass,
                        newConf: newPassConf,
                    },
                    success: function(response)
                    {
                        console.log(response);

                        for (var key in response) 
                        {
                            var value = response[key];
                            console.log()
                            $("#"+key+"-error").text(value);
                            $("#"+key+"-error").css("color", "red");
                            $("#"+key+"-error").show();  

                            if(key == "sakte")
                            {
                                $("#success-alert").text("Your password was changed successgully");

                                $("#success-alert").fadeTo(500, 500).slideUp(500, function() 
                                {
                                    $("#success-alert").slideUp(500);
                                });
                            }
                        }
                        
                    }
                }
            )
        });

        function emptyEditErrorText()
        {
            $("#passChange span").each(function()
            {
                $(this).text("");
            });
        }



        function loadTrack(track_index)
        {
            console.log("INDEKSI ", track_index);
            clearInterval(updateTimer);
            reset();

            curr_track.src = music_list[track_index].music;
            curr_track.load();

            track_art.style.backgroundImage = "url(" + music_list[track_index].img + ")";
            track_name.textContent = music_list[track_index].name;
            track_artist.textContent = music_list[track_index].artist;

            updateTimer = setInterval(setUpdate, 1000);

            curr_track.addEventListener('ended', nextTrack);
        }

        function reset()
        {
            curr_time.textContent = "00:00";
            total_duration.textContent = "00:00";
            seek_slider.value = 0;
        }

        $(".random-track").on("click", function()
        {
            isRandom ? pauseRandom() : playRandom();

        })

        $(".playpause-track").on("click", function()
        {
            isPlaying ? pauseTrack() : playTrack();

        })

        function playRandom()
        {
            isRandom = true;
            randomIcon.classList.add('randomActive');
        }

        function pauseRandom()
        {
            isRandom = false;
            randomIcon.classList.remove('randomActive');
        }

        $(".repeat-track").on("click", function()
        {
            let current_index = track_index;
            loadTrack(current_index);
            playTrack();
        })
        
        function playTrack()
        {
            curr_track.play();
            isPlaying = true;
            track_art.classList.add('rotate');
            wave.addClass('loader');
            playpause_btn.html('<i class="fa fa-pause-circle fa-5x"></i>');
        }
        function pauseTrack()
        {
            curr_track.pause();
            isPlaying = false;
            track_art.classList.remove('rotate');
            wave.removeClass('loader');
            playpause_btn.html('<i class="fa fa-play-circle fa-5x"></i>');
        }


        $(".next-track").on("click", nextTrack)
        function nextTrack()
        {
            if(track_index < music_list.length - 1 && isRandom === false)
            {
                track_index += 1;
            }
            else if(track_index < music_list.length - 1 && isRandom === true)
            {
                let random_index = Number.parseInt(Math.random() * music_list.length);
                track_index = random_index;
            }
            else
            {
                track_index = 0;
            }

            
            loadTrack(track_index);
            playTrack();
        }

        $(".prev-track").on("click", prevTrack)
        function prevTrack()
        {
            if(track_index > 0){
                track_index -= 1;
            }else{
                track_index = music_list.length -1;
            }
            loadTrack(track_index);
            playTrack();
        }


        $(".seek_slider").on("change", function()
        {
            let seekto = curr_track.duration * (seek_slider.value / 100);
            curr_track.currentTime = seekto;
        })
        
        $(".volume_slider").on("change", function()
        {
            curr_track.volume = volume_slider.value / 100;

        })
    
        function setUpdate()
        {
            let seekPosition = 0;
            if(!isNaN(curr_track.duration)){
                seekPosition = curr_track.currentTime * (100 / curr_track.duration);
                seek_slider.value = seekPosition;

                let currentMinutes = Math.floor(curr_track.currentTime / 60);
                let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
                let durationMinutes = Math.floor(curr_track.duration / 60);
                let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

                if(currentSeconds < 10) {currentSeconds = "0" + currentSeconds; }
                if(durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
                if(currentMinutes < 10) {currentMinutes = "0" + currentMinutes; }
                if(durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

                curr_time.textContent = currentMinutes + ":" + currentSeconds;
                total_duration.textContent = durationMinutes + ":" + durationMinutes;
            }
        }
        
    </script>
</html>
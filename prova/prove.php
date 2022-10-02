<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.min.js" integrity="sha512-mhqErQ0f2UqnbsjgKpM96XfxVjVMnXpszEXKmnJk8467vR8h0MpiPauil8TKi5F5DldQGqNUO/XTyWbQku22LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.min.js" integrity="sha512-mhqErQ0f2UqnbsjgKpM96XfxVjVMnXpszEXKmnJk8467vR8h0MpiPauil8TKi5F5DldQGqNUO/XTyWbQku22LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel = "stylesheet" href = "prove.css" >
    <script src = "prove.js"></script>
    
</head>
<body>
<div class="floating-icon"><a href="https://jewel998.github.io/playlist" style="color:white"><i class="fa fa-github"></i></a></div>
<div class="floating-icon"><a href="https://codepen.io/jewel998" style="color:white"><i class="fa fa-codepen"></i></a></div>
<div id="music-player">
        <img id="album-art"/>
        <div id="top-bar">
          <button id="back"><i class="fa fa-arrow-left"></i></button>
          <div id="about-song"><h2 class="song-name"></h2><h4 class="artist-name"></h4></div>
        </div>
        <div id="lyrics">
          <h2 class="song-name"></h2><h4 class="artist-name"></h4>
          <div id="lyrics-content">
          </div>
        </div>
        <audio id="audioFile" preload="true">
        </audio>
        <div id="player">
          <div id="bar">
            <div id="currentTime"></div>
            <div id="progress-bar">
              <div id="progress"><i id="progressButton" class="fa fa-circle"></i></div>
            </div>
            <div id="totalTime"></div>
          </div>
          <div id="menu">
            <button id="repeat" style="color:grey"><i class="fa fa-repeat"></i></button>
            <button id="prev"><i class="fa fa-step-backward"></i></button>
            <button id="play"><i class="fa fa-play"></i></button>
            <button id="next"><i class="fa fa-step-forward"></i></button>
            <button id="shuffle" style="color:grey"><i class="fa fa-random"></i></button>
          </div>
        </div>
        <div id="playlist">
          <div id="label">
            <h1>Playlist</h1>
            <input id="search" type="text" placeholder="&#xF002; Search from all songs"></input>
          </div>
          <div id="show-box">
            <div id="show-list">
            </div>
          </div>
        </div>
    </div>
</body>
</html>
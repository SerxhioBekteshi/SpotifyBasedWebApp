<div class="wrapper"> 
    <div class = "row" >
        <div class="col-md-4 my-auto">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="track-art " style="width: 100px; height: 100px;"></div>
                </div>
                <div class="col-md-6">
                    <div class="details ">
                        <!-- <div class="now-playing">PLAYING x OF y</div> -->
                        <div class="track-name" style = "font-size: 14px">Track Name</div>
                        <div class="track-artist">Track Artist</div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md-4 ">
            <div class="buttons">
                <div class="random-track" >
                    <i class="fas fa-random fa-2x" title="random"></i>
                </div>
                <div class="prev-track" >
                    <i class="fa fa-step-backward fa-2x"></i>
                </div>
                <div class="playpause-track" >
                    <i class="fa fa-play-circle fa-5x"></i>
                </div>
                <div class="next-track" >
                    <i class="fa fa-step-forward fa-2x"></i>
                </div>
                <div class="repeat-track" >
                    <i class="fa fa-repeat fa-2x" title="repeat"></i>
                </div>

            </div>
                <div class="slider_container">
                <div class="current-time">00:00</div>
                <input type="range" min="1" max="100" value="0" class="seek_slider" >
                <div class="total-duration">00:00</div>
            </div>
            
        </div>

        <div class="col-md-4 d-flex justify-content-center align-items-center" >
            <div class="slider_container">
                <i class="fa fa-volume-down"></i>
                <input type="range" min="1" max="100" value="99" class="volume_slider" style = "width: 100%">
                <i class="fa fa-volume-up"></i>
            </div>

            <div id="wave">
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
            </div> 
        </div>   
    </div>    
</div>  
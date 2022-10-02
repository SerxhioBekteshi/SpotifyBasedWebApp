let track_art = document.querySelector('.track-art');
let track_name = document.querySelector('.track-name');
let track_artist = document.querySelector('.track-artist');

let playpause_btn = $(".playpause-track");

let next_btn = document.querySelector('.next-track');
let prev_btn = document.querySelector('.prev-track');

let seek_slider = document.querySelector('.seek_slider');
let volume_slider = document.querySelector('.volume_slider');
let curr_time = $('.current-time');
let total_duration = $('.total-duration');
let wave = $('#wave');
let randomIcon = document.querySelector('.fa-random');
let curr_track = document.createElement('audio');

let track_index = Math.floor(Math.random() * 5);
let isPlaying = false;
let isRandom = false;
let updateTimer;

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
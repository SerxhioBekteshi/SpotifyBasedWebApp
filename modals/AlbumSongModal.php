<div class="modal fade" id="addAlbum" tabindex="-1" aria-labelledby="addAlbumLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="addAlbumlistLabel"> Add a new Album </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body"> 
                <form method='post' action='' id = "uploadAlbum"  enctype="multipart/form-data">

                    <label for="" class = "form-label" > Album Name </label>
                    <input class = "form-control" type="text" name = "albumName" id = "albumName">

                    <label for="" class = "form-label" > Upload Album Image </label>
                    <input class = "form-control" id="image" type="file" accept="image/*" name="image" />

                    <hr>
                        <label for="" class = "form-label" > Upload Songs </label>
                        <input class = "form-control" type="file" name="file[]" id="file" multiple>
                    <br>
                    <input type="submit" name = "addAALL" class="btn btn-primary" value = "Save changes"/>
                    <br>
                    <br>
                    <p> <strong> HINT </strong> The format name of the audio file should be the same name as the song
                    with each word starting with a capital letter and no spaces between the words.
                    <strong> For example </strong>
                    <span style = "color:red"> IAmInevitable.mp3 </span> </p>

                </form>

                <div id="err"><?php echo $errorMesazhi ?></div>
                <div id="success"><?php echo $successMessage ?></div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="addSong" tabindex="-1" aria-labelledby="addSongLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title text-center" id="addSonglistLabel"> Add a new song </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body"> 
                <form method='post' action='' id = "uploadSong"  enctype="multipart/form-data">

                    <strong> <label for="" class = "form-label " > Song Name </label> </strong> 
                    <input class = "form-control mb-4" type="text" name = "songName" id = "songName">

                    <strong>  <label for="" class = "form-label" > Upload mp3 source </label> </strong> 
                    <input class = "form-control mb-4" id="song" type="file"  name="song" />

                    <strong>  <label for="" class = "form-label" > Upload image song </label> </strong> 
                    <input class = "form-control mb-4" id="imageSong" type="file" accept = "image/*"  name="image" />

                    <input type="submit" name = "submitAddSong" class="btn btn-primary mb-4" value = "Submit"/>
                    <p> <strong> HINT: </strong> The format name of the audio file should be the same name as the song
                    with each word starting with a capital letter and no spaces between the words. </p>
                    <p> <strong> For example </strong>
                    <span style = "color:red"> IAmInevitable.mp3 </span> </p>

                </form>

                <div id="err2"></div>
                <div id="success2"></div>   
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
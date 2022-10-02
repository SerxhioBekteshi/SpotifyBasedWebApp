

<div class="sidebar">
    <div class="profile">

        <?php if ($roli == "artist") 
        { ?> 
            <img src="foto/artist/<?php echo $imazhi ?>" alt="profile_picture">
            <h3> <?php echo $emri; ?> </h3>
            <p> <?php echo $gener; ?> </p>
        <?php } 
        else if ($roli == "admin") {
        ?> 
            <img src="foto/admin.png" alt="profile_picture">
            <h3> ADMIN </h3>
            <p> CEO </p>
        <?php }  ?>

    </div>
    <ul>
        <li>
            <a href="artistpage2.php" class=""> <i class="bi bi-house-door-fill" ></i> Home </a>
        </li>
        <li>
            <a href="#" id = "search"><i class="bi bi-search " ></i> Search </a>
        </li>
        <li>
            <a href="profileData.php"><i class="bi bi-collection-play" ></i> Your Profile </a>
        </li>
        <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#changePass"><i class="bi bi-file-lock"  ></i> Change Password </a>
        </li>
        <li>
            <a href="#"><i class="bi bi-star" ></i> Linked </a>
        </li>
        <li>
            <a href="logout.php"> Log out </a>
        </li>
        <?php  if ($roli == "artist") 
        {?>
        <hr>
            <li>
                <a href="" class = "btn btn-success addSong" data-bs-toggle="modal" data-bs-target="#addSong"><i class="bi bi-cloud-plus"  ></i> Add Song </a>
            </li>
            <li>
                <a href="" class = "btn btn-danger addAlbum" data-bs-toggle="modal" data-bs-target="#addAlbum"> <i class="bi bi-upload" ></i> Add Album  </a>
            </li> 
        <?php }  ?>
    </ul>
</div>
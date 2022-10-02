
<nav class="navbar navbar-expand-lg navbar-light " style= "background-color: black;">
        <div class="container-fluid ">
            <a class="navbar-brand text-light" href="mainpage3.php">Your music account</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="text-center"> 
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 " >
                        <li class="nav-item ">
                            <a href="mainpage3.php" class="nav-link text-white  h5 " aria-current="page">
                            <i class="bi bi-house-door-fill" ></i> Home </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" id = "search" class="nav-link text-white  h5" aria-current="page">
                            <i class="bi bi-search" ></i> Search </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link text-white  h5" aria-current="page">
                            <i class="bi bi-collection-play" ></i> Your library </a>
                        </li>

                        <li class="nav-item">
                            <a href="playlists.php" class="nav-link text-white  h5" aria-current="page">
                            <i class="bi bi-plus-circle" ></i> Create playlist </a>
                        </li>

                        <li class="nav-item">
                            <a href="createPlaylist.php" class="nav-link text-white  h5" aria-current="page">
                            <i class="bi bi-star" ></i> Linked </a>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle text-white  h5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Your Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" 
                                data-bs-toggle="modal" data-bs-target="#changePass"> Change Password </a></li>
                                <li><a class="dropdown-item" href="profileData.php"> Profile </a></li>
                                <!-- <li><hr class="dropdown-divider"></li> -->
                                <!-- <li><a class="dropdown-item" href="#">Log</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="logout.php" class="navbar-brand text-light" aria-current="page">
                Log Out </a>
        </div>
    </nav>
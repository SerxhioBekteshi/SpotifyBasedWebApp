<?php 

    include("connection/connection.php");
    session_start();
    $mesazhi = "";

    //session saves the id of the user
    $_SESSION['user'] = "";
    $_SESSION['userID'] = "";
    $_SESSION['roli'] = "";

    if(isset($_POST['login']))
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            if ($email == "" || $pass == "")
                $mesazhi = 'Nuk jane futur gjithe te dhenat';

            else 
            {
                $query = "SELECT * FROM `login` WHERE `email` = '$email' AND `password` = '$pass'";
                $result = mysqli_query($conn, $query);
                $rowCount = $result->num_rows;
                if ($rowCount == 0) 
                {
                    $mesazhi = "Invalid login attempt";
                } 
                else 
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $_SESSION['user'] = $row['emriUser'];
                        $_SESSION['userID'] = $row['idL'];
                        $roli = $row['roli'];
                        $_SESSION['roli'] = $row['roli'];
                    }

                    if($roli == "user")   
                        header("Location: mainpage3.php");
                    else if($roli == "artist")   
                        header("Location: artistpage2.php");
                    else 
                        header("Location: adminpage.php");
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include ("BootstrapJquery/BootstrapJquery.php") ?>
    <link rel = "stylesheet" href = "RegLog.css"/>

</head>
<body >

    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center">
            <div class = "col-md-6  bg-light m-5 " >
                <form method = "POST">
                    <h2> LOGIN </h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name = "email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name = "password">
                    </div>

                    <button type="submit" class="mb-3 btn btn-primary" name = "login" >Submit</button>

                    <div class="mb-3">
                        <a href="registration.php" class="previous round">&#8249;</a>
                        <!-- <a href="registration.php" class="next round">&#8250;</a> -->
                    </div>
                    <div class = "text-center" style = "color: red"><?php echo $mesazhi ?></div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
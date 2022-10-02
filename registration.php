<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ("BootstrapJquery/BootstrapJquery.php") ?>
    <link rel = "stylesheet" href = "css/RegLog.css"/>
</head>
<body style = "background-color: lightblue">

    <div class="container " >

        <div class = "row ">

            <div class = "col-md-6 my-5" style = "background-color: #E6E6FA; margin: auto" >
                <div class = "row ">
                    <div class = "col-md-12 text-center my-5">
                        <h3>MUSIC WEBSITE</h3>
                        <p>Listen songs of different genres and build your own desired playlist</p>
                        <h4>Commodity everywhere</h4>
                    </div>
                    <div class = "col-md-12 text-center my-5" >
                        <img class = "img-fluid " src="foto/sound.png" alt="" style = "border-radius: 40%"
                        width = "400" height = "400">
                    </div>
                </div>
            </div>

            <div class ="col-md-6 my-5 bg-light p-3">

                <div class="alert alert-success" id="success-alert" style = "width: 90%; text-align:center">
                </div>

                <form id = "addForm">
                    <h2 class = "text-center"> REGISTER NOW </h2>
                    <div class="mb-3">
                        <label for="emri" class="form-label">Emri</label>
                        <input type="text" class="form-control" id="emri" name = "emri" aria-describedby="emailHelp">
                        <span id = "emri-error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="mbiemri" class="form-label">Mbiemri</label>
                        <input type="text" class="form-control" id="mbiemri" name = "mbiemri">
                        <span id = "mbiemri-error"></span>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name = "email">
                        <span id = "email-error"></span>

                    </div>

                    <div class="mb-3">
                        <label for="adresa" class="form-label">Adresa</label>
                        <input type="text" class="form-control" id="adresa" name = "adresa">
                        <span id = "adresa-error"></span>

                    </div>

                    <div class="mb-3">
                        <label for="telefoni" class="form-label">Telefoni</label>
                        <input type="text" class="form-control" id="telefoni" name = "telefoni">
                        <span id = "telefoni-error"></span>

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name = "password">

                    </div>

                    <div class="mb-3">
                        <label for="passK" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="passK" name = "passK">
                    </div>

                    <div class="mb-3">
                        <label for="qyteti" class="form-label">Qyteti</label>
                        <input type="text" class="form-control" id="qyteti" name = "qyteti">
                        <span id = "qyteti-error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="roli" class="form-label">Roli</label>
                        <select class="form-select select" aria-label="Default select example" >
                            <option value="user"> Simple User </option>
                            <option value="artist"> Artist </option>
                        </select>
                    </div>

                    <div class = "otherData">
                        <div class="mb-3 ">
                            <label for="username" class="form-label"> Username </label>
                            <input type="text" class="form-control" id="username" name = "username">
                            <span id = "username-error"></span>
                        </div>

                        <div class="mb-3 ">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name = "genre" placeholder = "Rap, Trap, Pop, .....">
                            <span id = "genre-error"></span>
                        </div>

                        <!-- <div class="mb-3 ">
                            <label for="imazhi" class="form-label">Image</label>
                            <input type="text" class="form-control" id="imazhi" name = "imazhi">
                            <span id = "imazhi-error"></span>
                        </div> -->
                    </div>
                        

                    <button type="submit" class="mb-3 btn btn-primary" id = "add" name = "regjistrohu" >Submit</button>
                    <button class = "mb-3 btn btn-primary btn-info " type = "button" onclick="location.href='login.php'"> LOGIN </button>
                        

                    <div class="mb-3">
                        <!-- <a href="login.php" class="previous round">&#8249;</a> -->
                        <a href="login.php" class="next round">&#8250;</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>

    var valueSelected = $(".select").find("option:first-child").val();
    $(".select").on("change", function()
    {
        var optionSelected = $("option:selected", this);
        valueSelected = this.value;
        if(valueSelected == "artist")
            $(".otherData").show();
        else 
            $(".otherData").hide();

    })
        
    $(document).ready(function() 
    {
        $("#success-alert").hide();
        $(".otherData").hide();

    });

    var form = document.getElementById("addForm");
    function handleForm(event) 
    { 
        event.preventDefault(); 
    }
    form.addEventListener('submit', handleForm);

    var btn = document.getElementById("add");
    btn.addEventListener("click", handleClick);

    function handleClick()
    {
        emptyErrorText();
        $.ajax({
            url: "ajaxRequests/registerFunction.php",
            type: "POST",
            data:{
                emri: $("input[name=emri]").val(),
                mbiemri: $("input[name=mbiemri]").val(),
                email: $("input[name=email]").val(),
                adresa: $("input[name=adresa]").val(),
                telefoni: $("input[name=telefoni]").val(),
                pass: $("input[name=password]").val(),
                passK: $("input[name=passK]").val(),
                qyteti: $("input[name=qyteti]").val(),
                roli: valueSelected,
                genre: $("input[name=genre]").val(),
                username: $("input[name=username]").val(),


            },
            success: function(response)
            {

                var arr = JSON.parse(response);
                console.log(response);

                for (var key in arr) 
                {
                    var value = arr[key];
                    $("#"+key+"-error").text(value);
                    $("#"+key+"-error").css("color", "red");
                    $("#"+key+"-error").show();  
                }

                if(response == 1)
                {
                    $("#success-alert").text("Urime. U regjistruat me sukses");
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() 
                    {
                        $("#success-alert").slideUp(500);
                    });
                }

            }
        });
    }

    function emptyErrorText()
    {
        $("#addForm span").each(function()
        {
            $(this).text("");
        });
    }

    function emptyForm()
    {
        $("#addForm input").each(function()
        {
            $(this).text("");
        });
    }
    </script>
</body>
</html>
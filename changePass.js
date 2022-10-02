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

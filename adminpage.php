<?php 
    include("connection/connectionPDO.php");
    session_start();

    if(!isset($_SESSION['user']) || !isset($_SESSION['userID']) || !isset($_SESSION['roli']))
        header("location: login.php");

    $id = $_SESSION['userID'];
    $emriUser = $_SESSION['user'];
    $roli = $_SESSION['roli']
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("BootstrapJquery/BootstrapJquery.php") ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src = "https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="css/adminpage.css" />
    
    <style>
        #changePass 
        {
            color: black;
        }
         </style>
</head>
<body>

    <div class="wrapper">
       <div class="section">
            <!-- <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
            </div> -->
            <div class="container">
                <div class="alert alert-success" id="success-alert2" style = "text-align:center"></div>


                <table id="myTable"  class="table table-striped" style = "color: black">
                <thead bgcolor="#303030" >
                    <tr class="table-primary">
                        <th>id </th>
                        <th>Name </th>
                        <th>Image</th>
                        <th>Genre</th>
        
                        <th>Personal Life</th>
                        <th>General Info</th>  
                    </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>id </th>
                        <th>Name </th>
                        <th>Image</th>
                        <th>Genre</th>
                       
                        <th>Personal Life</th>
                        <th>General Info</th>  
  
                    </tr>
                </tfoot>

        </div>
    </div>

        <?php include("sidebar.php") ?>>
        <?php include("modals/PasswordModal.php") ?>

    </div>

   <?php include("modals/PersonalInfoModals.php") ?>
   <?php include("modals/GeneralInfoModals.php") ?>
    

    
</body>  
    <script src = "changePass.js"></script>
    <script>

        $('#myTable tfoot th').each( function () 
        {
            var title = $(this).text();
            $(this).html( '<input type="text" title = "Search '+title+' "  placeholder="Search '+title+'" />' );
        });

        $("#myTable tfoot").each(function () 
        {
            $(this).insertAfter($(this).siblings('thead'));
        });

        $(document).ready(function()
        {

            $("#success-alert").hide();
            $("#success-alert2").hide();

            var dataTable = $('#myTable').DataTable(
            {
                "paging":true, 
                "processing" : false,
                "serverSide" : false,
                "ordering": true,          
                "ajax" : 
                {
                    url:"ajaxRequests/getArtistInfo.php",
                    type:"GET",
                    // data: {id: id},
                    dataSrc: function(data) 
                    {
                        return data.data;
                    },
                    complete: function(json)
                    {
            

                    },
                },
                "columns": 
                [
                    { "data": "id" },
                    { "data": "emri" },
                    { "data": "imazhi",
                        render: function(data,type,row)
                        {
                            return `<div class = "text-center">
                            <img class = "img-fluid  mb-1" src="foto/artist/${row.imazhi}" alt=""
                                        style = "object-fit: cover;  width: 150px; height: 150px; border-radius: 20%" > 
                                <div>`
                        }
                    },
                    { "data": "Genre" },
                    { "data": "personalLife",
                        render: function(data,type,row)
                        {
                            if(!row.personalLife)
                            {
                                return  `<button type="button" name="addPersonal" id="${row.id}" 
                                data-toggle="modal" data-target="#personalLife" class="btn btn-success btn-sm addPersonal"> Add </button>`; 
                            }
                            else 
                            {
                                var personalLife = row.personalLife;
                                return  `<textarea class = "pI${row.id}" readonly>${personalLife}</textarea>
                                <button type="button" name="editPersonal" id="${row.id}" 
                                data-toggle="modal" data-target="#personalLife" class="btn btn-success btn-sm editPersonal"> Edit </button>`; 
                            }
                        },
                    },
                    { "data": "generalInfo",
                        render:function (data, type, row) 
                        {
                            if(!row.generalInfo)
                            {
                                return `<button type="button" name="addGeneral" id="${row.id}" 
                                class="btn btn-primary btn-sm addGeneral"> Add Info </button>`
                            }
                            else 
                            {
                                var generalInfo = row.generalInfo;
                                return `<textarea class = "gI${row.id}" readonly>${generalInfo}</textarea>
                                <button type="button" name="editGeneral" id="${row.id}" 
                                class="btn btn-primary btn-sm editGeneral"> Edit </button>`; 
                            }
                            
                        },
                    },
                ],

                "columnDefs":[
                    {
                        "targets": [0],
                        "width": "50px",
                    },
                ],
            });

            //apply search for each column funtion
            dataTable.columns([0,1,3,4,5]).every( function () 
            {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function () 
                {
                    that
                        .search( this.value )
                        .draw();
                });
            });


            $(".saveGeneralInfo").on("click", function()
            {
                var value = $('textarea#gI').val();
                console.log(value);

                $.ajax({
                    url: "ajaxRequests/addGeneralInfo.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {id: id, value: value,  },
                    success: function(response)
                    {
                        for (var key in response) 
                        {
                            var v = response[key];
                            $("#"+key+"-error").text(v);
                            $("#"+key+"-error").css("color", "red");
                            $("#"+key+"-error").show();  
                            
                            if(key == "sakte")
                            {
                                $(".cancel2").click();
                                $("#success-alert").text("You added successfully the general info for the artist");
                                $("#success-alert").fadeTo(500, 500).slideUp(500, function() 
                                {
                                    $("#success-alert").slideUp(500);
                                });
                                dataTable.ajax.reload();
                            }
                        }   
                    }
                });
            });
            
            $(".savePersonalInfo").on("click", function()
            {
                var value2 = $('textarea#pI').val();
                console.log(value2);

                $.ajax({
                    url: "ajaxRequests/addPersonalInfo.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {id: id, value2: value2,  },
                    success: function(response)
                    {
                        for (var key in response) 
                        {
                            var v = response[key];
                            $("#"+key+"-error").text(v);
                            $("#"+key+"-error").css("color", "red");
                            $("#"+key+"-error").show();  
                            
                            if(key == "sakte")
                            {
                                $(".cancel1").click();
                                $("#success-alert").text("You added successfully the general info for the artist");
                                $("#success-alert").fadeTo(500, 500).slideUp(500, function() 
                                {
                                    $("#success-alert").slideUp(500);
                                });
                                dataTable.ajax.reload();

                            }
                        }   
                    }
                });
            })

            $(".EditSavePersonalInfo").on("click", function()
            {
                var value2 = $('textarea#epI').val();
                console.log(value2);

                $.ajax({
                    url: "ajaxRequests/addPersonalInfo.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {id: id, value2: value2,  },
                    success: function(response)
                    {
                        for (var key in response) 
                        {
                            var v = response[key];
                            $("#"+key+"-error").text(v);
                            $("#"+key+"-error").css("color", "red");
                            $("#"+key+"-error").show();  
                            
                            if(key == "sakte")
                            {
                                $(".cancel3").click();
                                $("#success-alert").text("You editet the data successfully.");
                                $("#success-alert").fadeTo(500, 500).slideUp(500, function() 
                                {
                                    $("#success-alert").slideUp(500);
                                });
                                dataTable.ajax.reload();

                            }
                        }   
                    }
                });
            })

            $(".EditSaveGeneralInfo").on("click", function()
            {
                var value = $('textarea#egI').val();
                console.log(value);

                $.ajax({
                    url: "ajaxRequests/addGeneralInfo.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {id: id, value: value,  },
                    success: function(response)
                    {
                        for (var key in response) 
                        {
                            var v = response[key];
                            $("#"+key+"-error").text(v);
                            $("#"+key+"-error").css("color", "red");
                            $("#"+key+"-error").show();  
                            
                            if(key == "sakte")
                            {
                                $(".cancel4").click();
                                $("#success-alert").text("You edited the data successfully.");
                                $("#success-alert").fadeTo(500, 500).slideUp(500, function() 
                                {
                                    $("#success-alert").slideUp(500);
                                });
                                dataTable.ajax.reload();

                            }
                        }   
                    }
                });
            })

            $(".cancel1").on("click", function()
            {
                $('#personalLife').modal('hide');
            })

            $(".cancel2").on("click", function()
            {
                $('#generalInfo').modal('hide');
            })

            $(".cancel3").on("click", function()
            {
                $('#editPersonalLife').modal('hide');
            })

            $(".cancel4").on("click", function()
            {
                $('#editGeneralLife').modal('hide');
            })


        });

    let id = "";
    $(document).on("click", ".addGeneral", function()
    {
        id = $(this).attr("id");
        $('#generalInfo').modal('show');

    });

    
    $(document).on("click", ".addPersonal", function()
    {
        id = $(this).attr("id");
        $('#personalLife').modal('show');

    });

    $(document).on("click", ".editPersonal", function()
    {
        id = $(this).attr("id");
        var message = $('textarea.pI'+id).val();
        $("#epI").val(message);
        $('#editPersonalLife').modal('show');

    });

    $(document).on("click", ".editGeneral", function()
    {
        id = $(this).attr("id");
        var message = $('textarea.gI'+id).val();
        $("#egI").val(message);
        $('#editGeneralLife').modal('show');

    });


   

    </script>
</html>
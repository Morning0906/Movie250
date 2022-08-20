<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Movie DB || Add audience</title>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Movie management system</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="admin_index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movie management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">All movies</a></li>
                        <li><a href="admin_book_add.php">Add movies</a></li>

                    </ul>
                </li>
                <li  class="active"  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Audience management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_reader.php">All audience</a></li>
                        <li><a href="admin_reader_add.php">Add audience</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">Watched or not</a></li>
                <li><a href="admin_repass.php">Change password</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>Add audience</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_reader_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Audience_id</span><input name="nid" type="text" placeholder="Please input the id of audience" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_name</span><input name="nname" type="text" placeholder="Please input the name of audience" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_gender</span><input name="nsex" type="text" placeholder="Please input the gender of audience" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_birthday</span><input name="nbirth" type="text" placeholder="Please input the birthday of audience" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_address</span><input name="naddress" type="text" placeholder="Please input the address of audience" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_phone</span><input name="ntel" type="text" placeholder="Please input the phone of audience" class="form-control"></div><br/>
            <input type="submit" value="Add" class="btn btn-default">
            <input type="reset" value="Reset" class="btn btn-default">
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["nid"];
    $nnam= $_POST["nname"];
    $nsex = $_POST["nsex"];
    $nbir= $_POST["nbirth"];
    $nadd= $_POST["naddress"];
    $nnte = $_POST["ntel"];


    $sqla="insert into reader_info VALUES ($nnid ,'{$nnam}','{$nsex}','{$nbir}','{$nadd}','{$nnte}')";
    $sqlb="insert into reader_card (reader_id,name) VALUES($nnid ,'{$nnam}');";
    $resa=mysqli_query($dbc,$sqla);
    $resb=mysqli_query($dbc,$sqlb);


    if($resa==1&&$resb==1)
    {

        echo "<script>alert('Adding audience successfully！The initial password is 111111')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";

    }
    else
    {
        echo "<script>alert('Adding audience failed！please input again！');</script>";

    }

}


?>
</body>
</html>

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
    <title>Movie DB || Add movies</title>
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
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movie management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">All movies</a></li>
                        <li><a href="admin_book_add.php">Add movies</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_reader.php">All User</a></li>
                        <li><a href="admin_reader_add.php">Add User</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">借还管理“要删掉”</a></li>
                <li><a href="admin_repass.php">Change password</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>Add movies</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_book_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Movie name</span><input name="nname" type="text" placeholder="Please enter a movie name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Actor</span><input name="nauthor" type="text" placeholder="Please enter actor" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Publisher</span><input name="npublish" type="text" placeholder="Please enter publisher" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">ISBN</span><input name="nISBN" type="text" placeholder="Please enter ISBN" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Introduction</span><input name="nintroduction" type="text" placeholder="Please enter introduction" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Language</span><input name="nlanguage" type="text" placeholder="Please enter language" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Price</span><input name="nprice" type="text" placeholder="Please enter price" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Publish date</span><input name="npubdate" type="text" placeholder="Please enter the date of publication" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Classification code</span><input name="nclass_id" type="text" placeholder="Please enter the classification number" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Pressmark</span><input name="npressmark" type="text" placeholder="Please enter the pressmark" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">State</span><input name="nstate" type="text" placeholder="Please enter movie status" class="form-control"></div><br/>
            <label><input type="submit" value="Add" class="btn btn-default"></label>
            <label><input type="reset" value="Reset" class="btn btn-default"></label>
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnam = $_POST["nname"];
    $naut = $_POST["nauthor"];
    $npubl = $_POST["npublish"];
    $nisb = $_POST["nISBN"];
    $nint = $_POST["nintroduction"];
    $nlan = $_POST["nlanguage"];
    $npri = $_POST["nprice"];
    $npubd = $_POST["npubdate"];
    $ncla = $_POST["nclass_id"];
    $npre = $_POST["npressmark"];
    $nsta= $_POST["nstate"];



    $sqla="insert into book_info VALUES (NULL ,'{$nnam}','{$naut}','{$npubl}','{$nisb}','{$nint}','{$nlan}','{$npri}','{$npubd}',{$ncla},{$npre},{$nsta} )";
    $resa=mysqli_query($dbc,$sqla);


    if($resa==1)
    {

        echo "<script>alert('Successfully added！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";

    }
    else
    {
        echo "<script>alert('Add failed! Please re-enter!');</script>";

    }

}

?>
</body>
</html>

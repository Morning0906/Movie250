<?php
session_start();
include ('mysqli_connect.php');
$userid=$_SESSION['userid'];
$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB || Change password of management </title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("300046-106.jpg") no-repeat;
            background-size:cover;
            color: antiquewhite;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Movie DB</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="admin_index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movies manage<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">All movies</a></li>
                        <li><a href="admin_book_add.php">Add movies</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Audience management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_reader.php">All audience</a></li>
                        <li><a href="admin_book_add.php">Add audience</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">Watched or not</a></li>
                <li class="active"><a href="admin_repass.php" >Change password</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>


<h3 style="text-align: center"><?php echo $userid;  ?>,Hello</h3><br/>
<h4 style="text-align: center">Change your password：</h4><br/><br/><br/><br/><br/>
<form action="admin_repass.php" method="post"  style="text-align: center">
    <label><input type="password" name="pass1" placeholder="Please input your new password" class="form-control"></label><br/><br/><br/>
    <label><input type="password" name="pass2" placeholder="Confirm the new password" class="form-control"></label><br/><br/>
    <input type="submit" value="Submit" class="btn btn-default">
    <input type="reset" value="Reset"  class="btn btn-default">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $passa = $_POST["pass1"];
    $passb = $_POST["pass2"];
    if($passa==$passb){
        $sql="update admin set password='{$passa}' where admin_id={$userid}";
        $res=mysqli_query($dbc,$sql);
        if($res==1)
        {
            echo "<script>alert('Change password successfully！Please log in ！')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }

    }
    else{
        echo "<script>alert('The password is different ,please input again！')</script>";

    }

}


?>
</body>
</html>
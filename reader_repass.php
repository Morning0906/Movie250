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
    <title>Movie DB || Change password</title>
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
                <li ><a href="reader_index.php">HOME</a></li>
                <li><a href="reader_querybook.php">Movie search</a></li>
                <li><a href="reader_borrow.php">Watched</a></li>
                <li><a href="reader_info.php">Me</a></li>
                <li class="active"><a href="reader_repass.php">Change password</a></li>
                <li><a href="reader_guashi.php">Do you love Mr.bundit?</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $result['name'];  ?>Hey, bro~</h3><br/>
<h4 style="text-align: center">Change password：</h4><br/><br/><br/><br/><br/>
<form action="reader_repass.php" method="post"  style="text-align: center">
    <label><br/><input type="password" name="pass1" placeholder="Please enter new password" class="form-control"></label><br/><br/><br/>
    <label><br/><input type="password" name="pass2" placeholder="Confirm new password" class="form-control"></label><br/><br/>
    <input type="submit" value="Submie" class="btn btn-default">
    <input type="reset" value="Reset"  class="btn btn-default">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $passa = $_POST["pass1"];
    $passb = $_POST["pass2"];
if($passa==$passb){
    $sql="update reader_card set passwd='{$passa}' where reader_id={$userid}";
    $res=mysqli_query($dbc,$sql);
    if($res==1)
    {
        echo "<script>alert('Password changed successfully! Please log in again!')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

}
else{
    echo "<script>alert('The password entered twice is different, please enter again!')</script>";

}

}


?>
</body>
</html>
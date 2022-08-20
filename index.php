<?php
session_start();
if(isset($_SESSION['userid']))
{
    unset($_SESSION['userid']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB || Please login</title>
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
<h1 style="text-align: center"><strong>Login</strong></h1>
<div style="padding: 180px 550px 10px;text-align: center">
    <form  action="login_check.php" method="POST" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Account</span><input  name="account" type="text" placeholder="Please input your account" class="form-control"></div><br><br>
            <div class="input-group"><span class="input-group-addon">Password</span><input  name="pass" type="password" placeholder="Please enter your password" class="form-control"></div><br><br><br>
            <input type="submit" value="Submit" class="btn btn-default">
            <input type="reset" value="Reset" class="btn btn-default">
        </div>
    </form>
</div>
</body>
</html>
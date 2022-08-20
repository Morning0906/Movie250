<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB || Do you love Bundit?</title>
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
                <li><a href="reader_borrow.php">Already watched</a></li>
                <li><a href="reader_info.php">Me</a></li>
                <li><a href="reader_repass.php">Change password</a></li>
                <li class="active"><a href="reader_guashi.php">Do you love Mr.Bundit?</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $result['name'];  ?>Hello bro! I just want to ask you one question!</h3><br/>
<h4 style="text-align: center">Do you love Mr.Bundit?：<br/>
<?php


$sqla="select card_state from reader_card where reader_id={$userid} ;";

$resa=mysqli_query($dbc,$sqla);
$resulta=mysqli_fetch_array($resa);
if($resulta['card_state']==0) echo "Yes!!!<br/><br/><a href='reader_guashi_do.php?id=0' style='text-align: center'>Of course yes!</a>";
else echo "Yes, I do!<br/><br/><a href='reader_guashi_do.php?id=1' style='text-align: center'>You can't say no!</a>";

?>
</h4>
</body>
</html>
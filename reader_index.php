<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
date_default_timezone_set("PRC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB</title>
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
        #gonggao{
            position: absolute;
            left: 40%;
            top: 50%;
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
                <li class="active"><a href="reader_index.php">HOME</a></li>
                <li><a href="reader_querybook.php">Movie search</a></li>
                <li><a href="reader_borrow.php">Watched</a></li>
                <li><a href="reader_info.php">Me</a></li>
                <li><a href="reader_repass.php">Change password</a></li>
                <li><a href="reader_guashi.php">Do you love Mr.Bundit?</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<br/><br/><h3 style="text-align: center"><?php echo $result['name'];  ?>Hey, bro~</h3><br/>
<h4 style="text-align: center"><?php
    $sqla="select count(*) a from lend_list where reader_id={$userid} and back_date is NULL;";

    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    echo "You have watched{$resulta['a']}movies";
    ?>
</h4>
<h4 style="text-align: center">
    <?php
    $sqlb="select DATE_ADD(lend_date,INTERVAL 1 MONTH) AS yhrq from lend_list where reader_id={$userid} and back_date is NULL;";
    $counta=0;
    $resb=mysqli_query($dbc,$sqlb);

    foreach ($resb as $row){
        if(strtotime(date("y-m-d"))>strtotime($row['yhrq'])) $counta++;
    };

    #if($counta==0) echo "您当前没有超期且未归还的书。";
    #else echo "有{$counta}本书已超期，请您及时归还";


    ?>
</h4>
<div id="gonggao">
    <a href="a.html" style="font-style: italic;color: white;text-decoration:replace-underline">Information: The traditional graduation ceremony of Chinese virtues</a><br>
    <a href="a.html" style="font-style: italic;color: white">Notice and Announcement: DB usint rules</a><br>
    <a href="a.html" style="font-style: italic;color: white">Recommended book list: The Shawshank Redemption</a><br>
    <a href="a.html" style="font-style: italic;color: white">Recommended book list: The Godfather</a><br>
    <a href="a.html" style="font-style: italic;color: white">Recommended book list: 12 Angry Men</a><br>
</div>
</body>
</html>
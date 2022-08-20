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
    <title>Movie DB || Watched</title>
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
                <li class="active"><a href="reader_borrow.php">Already watched</a></li>
                <li><a href="reader_info.php">Me</a></li>
                <li><a href="reader_repass.php">Change password</a></li>
                <li><a href="reader_guashi.php">Do you love Mr.Bundit?</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>

<h3 style="text-align: center"><?php echo $result['name'];  ?>Hey, bro!</h3><br/>
<h4 style="text-align: center">The movies you have watched are as follows:</h4>

<table  width='100%' class="table">
    <tr>
        <th>Serial number</th>
        <th>Movie ID</th>
        <th>Movie name</th>
        <th>Watching date</th>
        <th>归还日期</th>
    </tr>
    <?php



    $sqla="select sernum,book_info.book_id,book_info.name,lend_date,back_date from lend_list,book_info where reader_id={$userid} and lend_list.book_id=book_info.book_id;";

    $resa=mysqli_query($dbc,$sqla);
    foreach ($resa as $row){
        echo "<tr>";
        echo "<td>{$row['sernum']}</td>";
        echo "<td>{$row['book_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['lend_date']}</td>";
        echo "<td>{$row['back_date']}</td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>
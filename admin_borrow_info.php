<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
date_default_timezone_set("PRC");
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
            height:auto;

        }
        #query{
            text-align: center;
        }
    </style>
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
                <li  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movie management<b class="caret"></b>
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
                        <li><a href="admin_reader_add.php">Add audience</a></li>
                    </ul>
                </li>
                <li class="active"><a href="admin_borrow_info.php">Watched or not</a></li>
                <li><a href="admin_repass.php">Change password</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>Watched or not</strong></h1>
<form  id="query" action="admin_borrow_info.php" method="POST">
    <div id="query">
        <label ><input  name="bookquery" type="text" placeholder="Please input the name of movies or movie number or the id of audience." class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>借书流水号</th>
        <th>Movie number</th>
        <th>Movie name</th>
        <th>Audience id</th>
        <th>Watching data</th>
        <th>Watched or not</th>

    </tr>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["bookquery"];

        $sql="select sernum,lend_list.book_id,name,reader_id,lend_date,DATE_ADD(lend_date,INTERVAL 1 MONTH) AS yhrq,back_date
from book_info,lend_list
where book_info.book_id=lend_list.book_id and ( name like '%{$gjc}%'or reader_id like '%{$gjc}% 'or lend_list.book_id like '%{$gjc}%' ) ;";
    }
    else{
        $sql="select sernum,lend_list.book_id,name,reader_id,lend_date,DATE_ADD(lend_date,INTERVAL 1 MONTH) AS yhrq,back_date
from book_info,lend_list
where book_info.book_id=lend_list.book_id;";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['sernum']}</td>";
        echo "<td>{$row['book_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['reader_id']}</td>";
        echo "<td>{$row['lend_date']}</td>";
        echo "<td>{$row['yhrq']}</td>";
        echo "<td>{$row['back_date']}</td>";
        echo "<td>"; if($row['back_date']!=null) echo"Watched</td>";else echo "have not watched</td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>
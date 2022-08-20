<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB || Audience management</title>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movie management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">ALL movies</a></li>
                        <li><a href="admin_book_add.php">Add movies</a></li>
                    </ul>
                </li>
                <li class="active" class="dropdown">
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
<h1 style="text-align: center"><strong>All audience</strong></h1>
<form  id="query" action="admin_reader.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="Please input the name of audience or the id." class="form-control"></label>
        <input type="submit" value="query" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>Audience_id</th>
        <th>Audience_name</th>
        <th>Audience_gender</th>
        <th>Audience_birthday</th>
        <th>Audience_address</th>
        <th>Audience_phone</th>
        <th>Audience_situation</th>
        <th>Operation</th>
        <th>Operation</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select reader_info.reader_id, reader_info.name,sex,birth,address,telcode,card_state from reader_info,reader_card where reader_info.reader_id=reader_card.reader_id and (name like '%{$gjc}%' or reader_id like '%{$gjc}%') ;";

    }
    else{
        $sql="select reader_info.reader_id, reader_info.name, sex, birth, address, telcode, card_state
from reader_info, reader_card where reader_info.reader_id = reader_card.reader_id";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['reader_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['birth']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['telcode']}</td>";
        if($row['card_state']==1) echo "<td>normal</td>"; else echo "<td></td>";
        echo "<td><a href='admin_reader_edit.php?id={$row['reader_id']}'>modify</a></td>";
        echo "<td><a href='admin_reader_del.php?id={$row['reader_id']}'>delete</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>
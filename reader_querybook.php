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
    <title>Movie DB || Movie search</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #resbook{
            top:50%;

        }
        #query{

            text-align: center;
        }
        body{
            width: 100%;

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
                <li class="active"><a href="reader_querybook.php">Movie search</a></li>
                <li><a href="reader_borrow.php">Watched</a></li>
                <li><a href="reader_info.php">Me</a></li>
                <li><a href="reader_repass.php">Change password</a></li>
                <li><a href="reader_guashi.php">Do you love Mr.Bundit?</a></li>
                <li><a href="index.php">EXIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $result['name'];  ?>Hey, bro~</h3><br/>
<h4 style="text-align: center">Movie search：</h4>


<form  action="reader_querybook.php" method="POST">
    <div id="query">
        <label ><input  name="bookquery" type="text" placeholder="Please input the Movie ID" class="form-control"></label>
        <input type="submit" value="Search" class="btn btn-default">
    </div>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $gjc = $_POST["bookquery"];
    if($gjc=="") echo "<script>alert('查询词不能为空！')</script>";
    else{
        $sqla="select book_id,name,author,publish,ISBN,introduction,language,price,pubdate,book_info.class_id,class_name,pressmark,state from book_info,class_info where book_info.class_id=class_info.class_id and ( name like '%{$gjc}%' or book_id like '%{$gjc}%')  ;";

        $resa=mysqli_query($dbc,$sqla);
        $jgs=mysqli_num_rows($resa);

        if($jgs==0)  echo "<script>alert('图书馆内暂无此书！')</script>";
        else{
            echo "<table   id='resbook' class='table'>
    <tr>
         <th>Movie ID</th>
        <th>Movie name</th>
        <th>Director</th>
        <th>Actor1</th>
        <th>Actor2</th>
        <th>Introduction</th>
        <th>Language</th>
        <th>Score</th>
        <th>Publication date</th>
        <th>Cassification</th>
        <th>Box office</th>
        <th>State</th>
    </tr>";
            foreach ($resa as $row){
                echo "<tr>";
                echo "<td>{$row['book_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['publish']}</td>";
                echo "<td>{$row['ISBN']}</td>";
                echo "<td>{$row['introduction']}</td>";
                echo "<td>{$row['language']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['pubdate']}</td>";
                echo "<td>{$row['class_name']}</td>";
                echo "<td>{$row['pressmark']}</td>";
                if($row['state']==1) echo "<td>Now showing</td>"; else if($row['state']==0) echo "<td>Removed</td>";else  echo "<td>No that movie</td>";
                echo "</tr>";
            };
        };



        echo "</table>";



    }


}
?>
</body>
</html>
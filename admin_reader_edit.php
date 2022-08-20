<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$readerid=$_GET['id'];

$sqlb="select * from reader_info where reader_id={$readerid}";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Movie DB || Movie modify</title>
</head>
<body>
<h1 style="text-align: center"><strong>Audience information change</strong></h1><br/><br/><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_reader_edit.php?id=<?php echo $readerid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Audience_id</span><input name="nid" value="<?php echo $resultb['reader_id'] ;?>" type="text" placeholder="请输入修改的读者证号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_name</span><input name="nname" value="<?php echo $resultb['name'] ;?>" type="text" placeholder="请输入修改的名字" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_gender</span><input name="nsex" value="<?php echo $resultb['sex'] ;?>" type="text" placeholder="请输入修改的性别" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_birthday</span><input name="nbirth" value="<?php echo $resultb['birth'] ;?>" type="text" placeholder="请输入修改的生日" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_address</span><input name="naddress" value="<?php echo $resultb['address'] ;?>" type="text" placeholder="请输入修改的地址" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Audience_telephone</span><input name="ntel" value="<?php echo $resultb['telcode'] ;?>" type="text" placeholder="请输入修改的电话" class="form-control"></div><br/>
            <input type="submit" value="Submit" class="btn btn-default">
            <input type="reset" value="Reset" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $readid=$_GET['id'];

    $nnid = $_POST["nid"];
    $nnam= $_POST["nname"];
    $nsex = $_POST["nsex"];
    $nbir= $_POST["nbirth"];
    $nadd= $_POST["naddress"];
    $nnte = $_POST["ntel"];



    $sqla="update reader_info set reader_id={$nnid},name='{$nnam}',sex='{$nsex}',
birth='{$nbir}',address='{$nadd}',telcode='{$nnte}' where reader_id=$readid;";
    $resa=mysqli_query($dbc,$sqla);
    $sqlc="update reader_card set name='{$nnam}' where reader_id=$readid;";
    $resc=mysqli_query($dbc,$sqlc);

    if($resa==1)
    {

        echo "<script>alert('Changed successfully！')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";

    }
    else
    {
        echo "<script>alert('Changed failed！please input again！');</script>";

    }

}


?>
</body>
</html>

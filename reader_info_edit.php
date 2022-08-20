<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


$sqlb="select * from reader_info where reader_id={$userid} ;";
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
    <title>Movie DB || Change information</title>
</head>
<body>
<h1 style="text-align: center"><strong>Change Personal Information</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="reader_info_edit.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">Name</span><input value="<?php echo $resultb['name']; ?>" name="name" type="text" placeholder="Please enter name" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Sex</span><input value="<?php echo $resultb['sex']; ?>" name="sex" type="text" placeholder="Please enter sex" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Birth day</span><input value="<?php echo $resultb['birth']; ?>"  name="birth" type="text" placeholder="Please enter the birth day" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Address</span><input value="<?php echo $resultb['address']; ?>" name="address" type="text" placeholder="Please enter the Address" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Tel</span><input  value="<?php echo $resultb['telcode']; ?>" name="telcode" type="text" placeholder="Please enter the telephone number" class="form-control"></div><br/>
        <label><input type="submit" value="Submit" class="btn btn-default"></label>
        <label><input type="reset" value="Reset" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{


    $nnam = $_POST["name"];
    $nsex = $_POST["sex"];
    $nbirth = $_POST["birth"];
    $nadd = $_POST["address"];
    $nint = $_POST["telcode"];




    $sqla="update reader_info set name='{$nnam}',sex='{$nsex}',birth='{$nbirth}',
address='{$nadd}',telcode='{$nint}' where reader_id={$userid};";
    $resa=mysqli_query($dbc,$sqla);

    $sqlc="update reader_card set name='{$nnam}' where reader_id={$userid};";
    $resc=mysqli_query($dbc,$sqlc);
    if($resa==1&&$resc==1)
    {

        echo "<script>alert('Modify successfully！')</script>";
        echo "<script>window.location.href='reader_info.php'</script>";

    }
    else
    {
        echo "<script>alert('Modification failed! Please re-enter!');</script>";

    }

}


?>
</body>
</html>

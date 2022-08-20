<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$xgid=$_GET['id'];

$sqlb="select name,author,publish,ISBN,introduction,language,price,pubdate,class_id,pressmark,
state from book_info where book_id={$xgid}";
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
    <title>Movie DB || Movie edit</title>
</head>
<body>
<h1 style="text-align: center"><strong>Movie edit</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_book_edit.php?id=<?php echo $xgid; ?>"" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">Movie name</span><input value="<?php echo $resultb['name']; ?>" name="nname" type="text" placeholder="Please enter a modified Movie name" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Actor</span><input value="<?php echo $resultb['author']; ?>" name="nauthor" type="text" placeholder="Please enter the actor of the modification" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Publisher</span><input value="<?php echo $resultb['publish']; ?>"  name="npublish" type="text" placeholder="Please enter the publisher of the modification" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">ISBN</span><input value="<?php echo $resultb['ISBN']; ?>" name="nISBN" type="text" placeholder="Please enter the modified ISBN" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Introduction</span><input  value="<?php echo $resultb['introduction']; ?>" name="nintroduction" type="text" placeholder="Please enter a new introduction" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Language</span><input value="<?php echo $resultb['language']; ?>" name="nlanguage" type="text" placeholder="Please enter the modified language" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">Price</span><input value="<?php echo $resultb['price']; ?>" name="nprice" type="text" placeholder="Please enter the revised price" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Publication date</span><input value="<?php echo $resultb['pubdate']; ?>" name="npubdate" type="text" placeholder="Please enter the revised date of publication" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">Classification code</span><input  value="<?php echo $resultb['class_id']; ?>" name="nclass_id" type="text" placeholder="Please enter the modified classification code" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Pressmark</span><input value="<?php echo $resultb['pressmark']; ?>" name="npressmark" type="text" placeholder="Please enter the revised pressmark" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">State</span><input value="<?php echo $resultb['state']; ?>" name="nstate" type="text" placeholder="Please enter the modified movie status" class="form-control"></div><br/>
        <label><input type="submit" value="确认" class="btn btn-default"></label>
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $boid=$_GET['id'];
    $nnam = $_POST["nname"];
    $naut = $_POST["nauthor"];
    $npubl = $_POST["npublish"];
    $nisb = $_POST["nISBN"];
    $nint = $_POST["nintroduction"];
    $nlan = $_POST["nlanguage"];
    $npri = $_POST["nprice"];
    $npubd = $_POST["npubdate"];
    $ncla = $_POST["nclass_id"];
    $npre = $_POST["npressmark"];
    $nsta= $_POST["nstate"];



    $sqla="update book_info set name='{$nnam}',author='{$naut}',publish='{$npubl}',
ISBN='{$nisb}',introduction='{$nint}',language='{$nlan}',price='{$npri}',pubdate='{$npubd}',
class_id={$ncla},pressmark={$npre},state={$nsta} where book_id=$boid;";
    $resa=mysqli_query($dbc,$sqla);


    if($resa==1)
    {

        echo "<script>alert('Modify successfully！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";

    }
    else
    {
        echo "<script>alert('Modification failed! Please re-enter!');</script>";

    }

}


?>
</body>
</html>

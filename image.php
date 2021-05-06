<!DOCTYPE>
<html>
<head>
	<title></title>
		<style>
		input[type="file"]{
        background:#55B4EC;
		}
	</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="img">
	<input type="submit" name="submit">
</form>
</body>
</html>
<?php

$conn=new mysqli('localhost','root','','cv');
if(isset($_POST['submit'])){
$filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!empty($filename)){
if(in_array($ext, $array)){
mysqli_query($conn,"INSERT into upload(name,image) values('$filename','$tmpname')");
// echo "uploaded";
// }
// else{
// echo "failed";
}
}
}

//display
$Query="SELECT * FROM upload" ;
$res = mysqli_query($conn,$Query);
if($row = mysqli_fetch_array($res)){

// echo '<img src="data:upload/jpeg;base64,'.base64_encode($row['image']).'width="250" height="150"/>';
echo ('<img style="width:150px;height:200px" src="'.$row['name'].'"/>');
echo "<br />";
}
?>



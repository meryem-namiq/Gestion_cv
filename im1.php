<!DOCTYPE html>
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
// mysqli_connect('localhost','root','','cv');
 mysql_connect('localhost','root','');
mysql_select_db('cv');
if(isset($_POST['submit'])){
$filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','png');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!empty($filename)){
if(in_array($ext, $array)){
mysql_query("Insert into upload(idc,name,image) values((SELECT idc FROM civilite WHERE idc`=(SELECT max(idc) FROM `civilite)),'$filename','$tmpname')");
// echo "uploaded";
// }
// else{
// echo "failed";
}
}
}

//display
$res = mysql_query("SELECT * FROM upload");
 if($row = mysql_fetch_array($res)){
  $displ = $row['image'];

// // please place the&nbsp;
 // single quotation ' instead '


 echo '<img src="data:image/jpeg;base64,&#39,'.base64_encode($displ).'"width="150" height="200" />';
 echo "<br />";
 }

?>
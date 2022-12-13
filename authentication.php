<?php
include_once("connect.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
$pwd = mysqli_real_escape_string($con, trim($request->psw));
$username = mysqli_real_escape_string($con, trim($request->uname));
$sql = "select * from users where login ='$username'  and password = md5(md5('$pwd'))";
if($result = mysqli_query($con,$sql))
{
$rows = array();
while($row = mysqli_fetch_assoc($result))
{
$rows[] = $row;
}
echo json_encode($rows);
}
else
{
http_response_code(400);
}
}
?>
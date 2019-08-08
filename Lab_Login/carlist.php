<?php
session_start();
//     require_once("config.php");
//     $link = mysqli_connect($dbhost,$dbuser,$dbpass);
//     mysqli_select_db($link,$dbname);
//     $sqlCommand = "select * from members";
//     $result = mysqli_query($link,$sqlCommand);
//     while($row = mysqli_fetch_assoc($result)){
        
//         echo "mid :{$row['mid']}<br>";
//         echo "username :{$row['username']}<br>";
//         echo "passsword :{$row['password']}<br>";
//         echo "<hr>";
    
//     }
//     exit();
// print_r($_SESSION["caritem"]);
$str_sec = explode(",",$_SESSION["caritem"]);
for($i=0;$i<count($_SESSION["carlist"]);$i++){
$cc=$str_sec[$i];

$carlist=$_SESSION["carlist"];
//print_r($_SESSION["carlist"]);
//print_r($carlist[$cc]);
foreach($carlist[$cc] as $key=>$value){
	echo $key .":".$value;
	echo "<br>";
}
}
// ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
table { 
  border:1px solid #000; 
  font-family: 微軟正黑體;
  font-size:16px; 
  width:70%;
  border:1px solid #000;
  text-align:center;
  border-collapse:collapse;
} 
td { 
  border:1px solid #000;
  padding:5px;
} 
</style>
</head>
<body>
<table>
<tr>
  <td rowspan="2">rowspan欄位</td>
  <td>表格1</td></tr>
<tr>
  <td>表格2</td>
</tr>
</table>

</div>
</body>
</html>
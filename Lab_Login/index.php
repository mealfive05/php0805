<?php
 session_start();
$userName="Guest";
if(isset($_SESSION["userName"])){
  $userName = $_SESSION["userName"];
}
$_SESSION["BackTo"]="index.php";


require_once("config.php");
  $link = mysqli_connect($dbhost,$dbuser,$dbpass);
  $result = mysqli_query($link, "set names utf8");
  mysqli_select_db($link,$dbname);
  $sqlCommand = "select * from Products ";
  $result = mysqli_query($link,$sqlCommand);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
<style>


</style>
</head>
<body>
<?php while($row = mysqli_fetch_assoc($result)){?>
  <div><a href="Products_details.php?pid=<?= $row["pid"]?>"></div>
  <div>
  <img src="images/<?=$row["pname_e"]?>.png" width="100" height="100">
  </div>
  <div class="product_word_tit"><?=$row["pname"]?></div>
    
    <span class="product_word_word_w2">售 價：<?=$row["price"]?>
    </span></div>
    
        <hr>
<?php } ?>





<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 首頁</font></td>
  </tr>
  <tr>
    <td align="center" valign="baseline">
      <?php if($userName == "Guest"){?>
      <a href="login.php">登入</a> 
      <?php } else{ ?>
      <a href="login.php?signout=1">登出</a>
      <?php }?>
      | <a href="secret.php">會員專用頁</a>
      <a href="carlist.php">查看購物車</a></td>
      
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">welcome! <?php echo $userName ;?></td>
  </tr>
</table>


</body>
</html>
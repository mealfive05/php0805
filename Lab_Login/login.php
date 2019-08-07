<?php
  session_start();

  function check($username,$password){
  require_once("config.php");
  $link = mysqli_connect($dbhost,$dbuser,$dbpass);
  mysqli_select_db($link,$dbname);
  $sqlCommand = "select * from members where username='$username'";
  $result = mysqli_query($link,$sqlCommand);
  // while($row = mysqli_fetch_assoc($result)){
    $row = mysqli_fetch_assoc($result);
    if($row['password']==$password)
    return 1;
    else
    return 0;
  //     echo "mid :{$row['mid']}<br>";
  //     echo "username :{$row['username']}<br>";
  //     echo "passsword :{$row['password']}<br>";
  //     echo "<hr>";
  
  // }
  
  }
  
  if(isset($_POST["btnOK"])){
    $login_ornot=check($_POST["txtUserName"],$_POST["txtPassword"]);
    if($_POST["txtUserName"]!=""&& $login_ornot){
      $_SESSION["userName"]=$_POST["txtUserName"];
      if($_SESSION["BackTo"]){
      header("location: " .$_SESSION["BackTo"]);
      }else{
        header("location: index.php" );
      }
      exit();
    }else{echo "登入失敗";};
  }
  if(isset($_GET["signout"])){
    unset($_SESSION["userName"]);
    header("location:index.php");
    exit();
  }
    

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
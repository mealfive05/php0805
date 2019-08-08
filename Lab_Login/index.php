<?php
 session_start();
$userName="Guest";                      
if(isset($_SESSION["userName"])){
  $userName = $_SESSION["userName"];    
}
$_SESSION["BackTo"]="index.php";        //把最後離開的頁面加入session中


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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
.container{
  width: 900px;
  margin: 0 auto;
}
.card{
  /* 設定父親定位點 */
  position: relative;
  width: 270px;
  float:left;
  margin: 10px;
  height: =250;
}
img{
  display: block;
  width: 250px;
  height: 200px;
 
 margin: 2px;

}

</style>
</head>
<body>
<div class="container">
  <div class="row align-items-start">
  <?php while($row = mysqli_fetch_assoc($result)){?>
    <div class="col"onclick="" style="border-style:solid; border-width:1px;">
    <a href="Products_details.php?pid=<?= $row["pid"]?>">
    <img src="images/<?=$row["pname_e"]?>.png" >
    <hr>
    <h5 class="card-title"><?=$row["pname"]?></h5>
    </div>

    <?php } ?>
  </div>
  
  

  
  
</div>




<div class="container">
<?php while($row = mysqli_fetch_assoc($result)){?>

  <div class="col-md-6">
  <div class="card">
    <img src="images/<?=$row["pname_e"]?>.png" >
  <div class="card-body">
  <h5 class="card-title"><?=$row["pname"]?></h5>
    <p class="card-text">售 價：<?=$row["price"]?></p>
  </div>
  </div>
</div>



<?php } ?>
</div>





<!-- <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        
        </div>
        </div>
        </div> -->
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
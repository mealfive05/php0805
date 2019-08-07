<?php
session_start();
if ($_GET["pid"]) {

    $pid = $_GET["pid"];
    require_once("config.php");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($link, $dbname);
    $sqlCommand = "select * from Products where `pid`= $pid";
    $result = mysqli_query($link, $sqlCommand);
    $row = mysqli_fetch_assoc($result);

echo strpos($_SESSION["caritem"], $row["pname"]);
    if (isset($_POST["addcar"])) {
        if (isset($_SESSION["carlist"])) {
            if (strpos($_SESSION["caritem"], $row["pname"]) == false) {
                $_SESSION["caritem"] = $_SESSION["caritem"] . "," . $row["pname"];
                $_SESSION["carlist"] = array_merge($_SESSION["carlist"], array($row["pname"] => $row));
            } else {
                echo "有重複";
                $_SESSION["carlist"]["紅茶"]["amount"] = $_SESSION["carlist"]["紅茶"]["amount"] + 2;
            }
        } else {
            if (isset($_SESSION["caritem"])) {
                $_SESSION["carlist"] = array($row["pname"] => $row);
            } else {
                $_SESSION["caritem"] = $row["pname"];
                $_SESSION["carlist"] = array($row["pname"] => $row);
            }
        }
    }
}
//     if (isset($_POST["addcar"])) {
//         if(isset($_SESSION["pname"])){
//             strpos()
//         $_SESSION["pname"]=$_SESSION["pname"].",".$row["pname"];
//         $_SESSION["price"]=$_SESSION["price"].",".$row["price"];
//         $_SESSION["amount"]=$_SESSION["amount"].",".$_POST["amount"];


//         }else{

//             $_SESSION["pname"]=$row["pname"];
//             $_SESSION["price"]=$row["price"];
//             $_SESSION["amount"]=$_POST["amount"];



//         }
//      }
//      echo  $_SESSION["pname"];echo "<br>";
//       echo $_SESSION["price"];echo "<br>";
//       echo $_SESSION["amount"];echo "<br>";

// }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lab - index</title>
    <style>
        /* #right{
  float:right ;
} */
    </style>
</head>

<body>


    <div>
        <img src="images/<?= $row["pname_e"] ?>.png" width="100" height="100">
    </div>


    <div><?= $row["pname"] ?></div>
    <div>剩餘數量:<?= $row["amount"] ?><br />
        <span>售 價：<?= $row["price"] ?>
        </span></div>

    <form id="form_car" name="form_car" method="post" action="">
        數量 : <input type="number" name="amount" value="0">
        <br>
        <input type="submit" name="addcar" id="addcar" value="加入購物車" />
    </form>
    <br />
    <div><a href="index.php">返回首頁</a></div>




</body>

</html>
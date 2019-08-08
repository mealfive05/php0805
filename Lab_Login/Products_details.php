<?php
session_start();

if ($_GET["pid"]) {                                                //當有網址有取到商品id時

    $pid = $_GET["pid"];
    require_once("config.php");                                     //引用mysql資料
    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    $result = mysqli_query($link, "set names utf8");
    mysqli_select_db($link, $dbname);
    $sqlCommand = "select * from Products where `pid`= $pid";       //取出那項商品
    $result = mysqli_query($link, $sqlCommand);
    $row = mysqli_fetch_assoc($result);

    // echo strpos($_SESSION["caritem"], $row["pname"]);

    if (isset($_POST["addcar"])) {                                                                                      //接收到"加到購物車"時
        $car_array = array("pname" => $row["pname"], "price" => $row["price"], "number" => $_POST["number"]);
        print_r($car_array);
        if (isset($_SESSION["carlist"])) {
            if (strpos($_SESSION["caritem"], $row["pname"]) === false) {
                $_SESSION["caritem"] = $_SESSION["caritem"] . "," . $car_array["pname"];
                $_SESSION["carlist"] = array_merge($_SESSION["carlist"], array($car_array["pname"] => $car_array));
            } else {
                echo "有重複";
                $_SESSION["carlist"][$car_array["pname"]]["number"] = $_POST["number"];
            }
        } else {
            if (isset($_SESSION["caritem"])) {
                $_SESSION["carlist"] = array($car_array["pname"] => $car_array);
            } else {
                $_SESSION["caritem"] = $car_array["pname"];
                $_SESSION["carlist"] = array($car_array["pname"] => $car_array);
            }
        }
    }
}

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
        購物車內產品數量 : <input type="number" name="number" value=<?php




                                                            if (isset($_SESSION["caritem"])) {
                                                                if (strpos($_SESSION["caritem"], $row["pname"]) === false) {
                                                                    echo 0;
                                                                } else {
                                                                    echo $_SESSION["carlist"][$row["pname"]]["number"];
                                                                }
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?>>
        <br>

        <input type="submit" name="addcar" id="addcar" value="加入購物車" />
    </form>
    <br />
    <div><a href="index.php">返回首頁</a></div>
    <?php

    ?>




</body>

</html>
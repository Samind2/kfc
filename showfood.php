<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select-customer-1</title>
</head>
<body>
  
<?php
require "connect.php";
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT tbl_food.foodname ,tbl_food.FoodDescription, tbl_menu.MenuName, tbl_food.FoodPrice
        FROM tbl_food, tbl_menu
        WHERE  tbl_food.MenuID = tbl_menu.MenuID"; 
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="600" border="1">
  <tr>
    <th width="80"> <div align="center">ชื่ออาหาร</div></th>
    <th width="80"> <div align="center">รายละเอียด </div></th>
    <th width="80"> <div align="center">เมนู </div></th>
    <th width="80"> <div align="center">ราคา </div></th>
  </tr>

  <?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>  
                                        <?php echo $result[""]; ?>     
        </a>
    </td>
    
    <td>
         <?php echo $result["foodname"];?>
    </td>

    <td>
         <?php echo $result["FoodDescription"];?>
    </td>

    <td>
         <?php echo $result["MenuName"];?>
    </td>

    <td>
         <?php echo $result["FoodPrice"];?>
    </td>

    </tr>
 
<?php
  }
?>
 
</table>
 
<?php
$conn = null;
?>
</body>
</html>
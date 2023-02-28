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
$sql = "SELECT *
         FROM tbl_customer";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="600" border="1">
  <tr>
    <th width="80"> <div align="center">รหัสลูกค้า</div></th>
    <th width="80"> <div align="center">ชื่อลูกค้า </div></th>
    <th width="80"> <div align="center">นามสกุลลูกค้า </div></th>
    <th width="80"> <div align="center">เบอร์โทร </div></th>
  </tr>

  <?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>       
        </a>
    </td>
    
    <td>
         <?php echo $result["CustomerID"];?>
    </td>

    <td>
         <?php echo $result["Firstname"];?>
    </td>

    <td>
         <?php echo $result["LastName"];?>
    </td>

    <td>
         <?php echo $result["PhoneNumber"];?>
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
<html>
    <head>
        <title>Test SQL injection</title>
    </head>
    <body>
        <h1> Test SQL Customer</h1>
            <form action="SelectcustomerText.php" method="GET">
            <input type="text" placeholder="Enter Name"name="Firstname">
            <br><br>
            <input type="submit">
        </form>

    </body>
    
</html>

<?php
$count = 0;
if(isset($_GET['Firstname'])&& $_GET['Firstname']!=null)
{
    echo"<br> get value =" . $_GET['Firstname'];
    require 'connect.php';

    $sql = "SELECT * FROM tbl_customer 
    where  Firstname
    like CONCAT('%',:Firstname,'%')";

    echo "<br>sql=".$sql;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Firstname', $_GET['Firstname']); //stmt เป็นตัวแปลจะตั้งชื่ออะไรก็ได้ แต่ต้องตรงกัน//
    $stmt->execute();
?>

    <table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสผู้ใช้ </th>
    <th width="140"> <div align="center">ชื่อลูกค้า </th>
    <th width="120"> <div align="center">นามสกุลลูกค้า </th>
    <th width="70"> <div align="center">เบอร์โทร </th>
  </tr>
    
<?php

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
    <td>
                                        <?php echo $result["CustomerID"]; ?>
        </a>
         
    </td>
 
 
   <td><?php echo $result["Firstname"]; ?></div></td>
    <td><?php echo $result["LastName"]; ?></td>
    <td><?php echo $result["PhoneNumber"]; ?></div></td>
    
  </tr>
<?php
        $count++;
    }
    echo "count ... ".$count;
}
    // if($count==0)
    //     echo"<br>No data ... <br>";

    // $conn=null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addcustomer</title>
</head>
<body>
    <h1>Add customer</h1>
    <form action="insertCust.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
   
    <br><br>
    <input type="text" placeholder="Firstname" name="Firstname">
    <br><br>
    <input type="text" placeholder="LastName" name="LastName">
    <br><br>
    <input type="text" placeholder="PhoneNumber" name="PhoneNumber">
    <input type="submit">
    </form>


</body>
</html>


<?php
//if(!empty($_POST['CustomerID']) && !empty($_POST['Name']) && !empty($_POST['Birthdate']) && !empty($_POST['Email']) && !empty($_POST['CountryCode']) && !empty($_POST['OutandingDebt']))
if(!empty($_POST['CustomerID']))
{
    echo 'mind';
   require 'connect.php';
    $sql_insert="insert into tbl_customer values (:CustomerID, :Firstname, :LastName, :PhoneNumber)";


    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Firstname', $_POST['Firstname']);
    $stmt->bindParam(':LastName', $_POST['LastName']);
    $stmt->bindParam(':PhoneNumber', $_POST['PhoneNumber']);


    if($stmt->execute()){
        $message='Suscessfully add new customer';
        //header("Location:/business/selectCountry1php");
    }


    else
    {
        $message='Fail to add new customer';
    }
    echo $message;
    $conn=null;
}
?>

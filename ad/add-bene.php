<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/admin.css">
        
    <title>Beneficiaries</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
<?php
session_start();

include("connection.php");

if ($_POST) {
    $bene_id = mt_rand(100000, 999999);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $lat = $_POST["Latitude"];
    $long = $_POST["Longitude"];
    $edad = $_POST['age'];
    $civilstatus = $_POST['civil_status'];
    $empstatus = $_POST['emp_status'];
    $class = $_POST['classification'];
    $monthpen = $_POST['month_pen'];
    $number= $_POST['contact'];
        $error = '3';
        $result = $database->query("select * from beneficiaries where full_name='$name';");

        if ($result->num_rows == 1) {
            $error = '1';
        } else {
 

        $sql1 = "INSERT INTO beneficiaries (user_id, full_name, gender, status, dob, address, Latitude, Longitude, age, civil_status, emp_status, classification, month_pen, contact) VALUES ('$bene_id','$name', '$gender', '$status', '$dob', '$address', '$lat', '$long' , '$edad', '$civilstatus', '$empstatus', '$class', '$monthpen', '$number')";

$database->query($sql1);

            $sql2 = "insert into users (full_name, role) values ('$name', 'beneficiary')";
            $database->query($sql2);

            $error = '4';
        }
    
} else {
    $error = '3';
}
header("location: bene.php?action=add&error=" . $error);
?>

    
   

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/admin.css">
        
    <title>Employee</title>
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
    $username=$_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $error = '3';
        $result = $database->query("select * from users where full_name='$name';");

        if ($result->num_rows == 1) {
            $error = '1';
        } else {
            $employee_id = mt_rand(100000, 999999);
         
            $email = $_POST['email'];
            $tele = $_POST['Tele'];
            $role = $_POST['emp_role'];

        
            $sql1 = "insert into employee (user_id, username, email, full_name,emp_role, password, tele) values ('$employee_id', '$username', '$email', '$name','$role', '$password', '$tele');";
            $database->query($sql1);

           
            $sql2 = "insert into users (username, full_name, password, role) values ('$username', '$name', '$password', 'employee')";
            $database->query($sql2);

            $error = '4';
        }
    } else {
        $error = '2';
    }
} else {
    $error = '3';
}

header("location: employee.php?action=add&error=" . $error);
?>

    
   

</body>
</html>
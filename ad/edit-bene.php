<?php

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (empty($_POST['name']) || empty($_POST['status']) || empty($_POST['dob']) || empty($_POST['address']) || empty($_POST['id00'])) {

        $error = '5';
        header("location: bene.php?action=edit&error=" . $error . "&id=" . $_POST['id00']);
        exit();
    }

    $name = $_POST['name'];
    $status = $_POST['status'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $edad = $_POST['age'];
    $civil_status=$_POST['civil_status'];
    $emp_status=$_POST['emp_status'];
    $classification=$_POST['classification'];
    $month_pen=$_POST['month_pen'];
    $id = $_POST['id00'];

    // Update beneficiaries table
    $sql1 = "UPDATE beneficiaries SET full_name='$name', status='$status', dob='$dob', address='$address', gender='$gender', age='$edad', civil_status='$civil_status', emp_status='$emp_status', classification='$classification', month_pen='$month_pen' WHERE user_id=$id";

    if ($database->query($sql1)) {
        // Update employee table (example query, replace it with your actual update statement)
        $sql2 = "UPDATE employee SET full_name='$name' WHERE user_id=$id";
        $database->query($sql2);

        $error = '4'; 
    } else {
        $error = '5';
    }
} else {
    $error = '3'; 
    header("location: bene.php?action=edit&error=" . $error . "&id=" . $id);
    exit();
}

header("location: bene.php?action=edit&error=" . $error . "&id=" . $id);
?>

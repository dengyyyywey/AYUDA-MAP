<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="adben.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@opencage/leaflet-opencage-geosearch/leaflet-opencage-geosearch.css" />
    <style>
    #map {
        height: 600px;
    }
    </style>
</head>

<body>
<div class="container">
    <?php
include 'connection.php';

$errors = array();

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $dob= $_POST['dob'];
    $pbirth= $_POST['pbirth'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $Latitude = $_POST['Latitude'];
    $Longitude = $_POST['Longitude'];
 

    if (empty($fname) || empty($gender) || empty($dob) || empty($pbirth) || empty($address) || empty($status)) {
        array_push($errors, "<div class='alert alert-primary'>All fields are required<div>");
    }
    if (strlen($fname) < 8) {
        array_push($errors, "<div class='alert alert-primary'>Please enter your full name<div>");
    }
    if (strlen($address) < 8) {
        array_push($errors, "<div class='alert alert-primary'>Please enter your correct address</div>");
    }

  

    $query = "INSERT INTO request (full_name, gender, dob, pbirth, status, address,Latitude,Longitude)
    VALUES ('$fname', '$gender', '$dob', '$pbirth', '$status', '$address',$Latitude,$Longitude)";
        
        if (mysqli_query($db, $query)) {
            echo "<center><div class='alert alert-primary'>Successfully Added</div></center>";
         
            echo '<script type="text/javascript">window.location = "../map.php";</script>';
        } else {
            echo 'Error in updating database: ' . mysqli_error($db);
        }
    } else {
       
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }

?>


        <center>
            <table border="0" style="margin: 0; padding: 0; width: 60%;">
                <tr>
                    <td>
                        <p class="header-text">Register</p>
                    </td>
                </tr>
                <tr>
                    <form action="" method="POST" id="loginForm" onsubmit="return validateForm()">
                        <td class="label-td">
                            <label for="fname" class="form-label">Full name: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="name" name="fname" class="input-text" placeholder="Full name" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <label for="gender" class="form-label">Gender: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="radio" name="gender" value="Male" required>Male<br>
                        <input type="radio" name="gender" value="Female" required>Female<br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <label for="status" class="form-label">Status: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="radio" name="status" value="SeniorCitizen" required> Senior Citizen<br>
                        <input type="radio" name="status" value="SingleParent" required> Single Parent<br>
                        <input type="radio" name="status" value="4P's" required> 4P`s<br>
                    </td>
                </tr>
                <td class="label-td">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="date" name="dob" class="input-text " required>
                    </td>
                </tr>
                <tr>
                <td class="label-td">
                            <label for="pbirth" class="form-label">Place of Birth: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="text" name="pbirth" class="input-text" placeholder="Place of Birth" required>
                    </td>
                </tr>
                <td class="label-td">
                    <label for="address" class="form-label">Address: </label>
                </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="text" name="address" class="input-text" placeholder="Address" required readonly>
                        <input type="hidden" id="Latitude" name="Latitude">
                        <input type="hidden" id="Longitude" name="Longitude">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="map1" style="width:750px; height:500px;"></div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Register" class="login-btn btn-success btn">
                    </td>
                </tr>
                </form>
                <tr>
                    <td width="10%">
                        <a href="../map.php" class="non-style-link">
                            <p class="nav-item">Back</p>
                        </a>
                    </td>
                </tr>
        </center>
        </table>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@opencage/geosearch-bundle"></script>
    <script src="https://cdn.jsdelivr.net/npm/@opencage/leaflet-opencage-geosearch"></script>
    <script src="../assets/js/map.js"></script>
</body>

</html>
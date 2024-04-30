<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/bene.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <!-- https://leafletjs.com/examples/quick-start/ -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@opencage/leaflet-opencage-geosearch/leaflet-opencage-geosearch.css" />
    <title>Beneficiaries</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }

        #map {
            height: 600px;
        }
        .table-container {
            display: none;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
            display: none;
            min-height:fit-content;
            max-height: 670px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
</style>
</head>
<body>
    <?php
    session_start();
    
    

  
    include("connection.php");

    
    ?>
    <div>
        <nav>       
            <ul>
            <a href="../map/admap.php "><Button class="logout-btn btn-primary-soft btn" value="Map" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>Map</Button></a>
                <li ><a  href="index.php"><svg xmlns="http://www.w3.org/2000/svg" class=" icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v8h-6z" /><path d="M4 16h6v4h-6z" /><path d="M14 12h6v8h-6z" /><path d="M14 4h6v4h-6z" /></svg>Dashboard</a></li>
                </li>
                <li><a href="employee.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>Employee</a></li>
                <li><a  class="active" href="bene.php"><svg xmlns="http://www.w3.org/2000/svg" class="icnactv icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" /><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M17 10h2a2 2 0 0 1 2 2v1" /><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M3 13v-1a2 2 0 0 1 2 -2h2" /></svg>Beneficiaries</a></li>
                <a href="logout.php"><Button class="logout-btn btn-primary-soft btn" value="Log out" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M15 12h-12l3 -3" /><path d="M6 15l-3 -3" /></svg>Logout</Button></a>
            </ul>
        </nav>
    </div>
        <div style=" width:60%;">
            <table border="0" width="150%" style="background-color: #f4f4f4; border-radius: 8px;;margin: 10px;;padding: 20px;;margin-top:25px; margin-left:20%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); overflow:hidden; ">
                <tr >
                    <td width="15%">
                        <a href="#" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Beneficiaries name" list="beneficiaries">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="beneficiaries">';
                                $list11 = $database->query("select full_name from  beneficiaries;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["full_name"];
                                    
                                    echo "<option value='$d'><br/>";
                                   
                                };

                            echo ' </datalist>';?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
            
                            
                        </form>
                        
                    </td>
                 
                <tr >
                    <td colspan="2" style="padding-top:30px;">
                    
                        <a href="?action=add&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('../img/icons/add.svg');">Add</font></button>
                            </a></td>
                </tr>
                </table>

                <div id="all" class="tab-con table-container " style="display:block;" >
    
                <table class="tab-con display">
                    <br>
                <div style="margin-left:35rem;">
                    <button  class="login-btn btn-primary btn " onclick="showTable('all')">All</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('4ps')">4Ps</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('solo_parent')">Solo Parent</button>
                    <button  class="login-btn btn-primary btn "onclick="showTable('senior_citizen')">Senior Citizen</button>
                </div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Civil Status</th>
                                    <th>Employment Status</th>
                                    <th>Classication</th>
                                    <th>Monthly Pension</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "ayuda");
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }   
                                    $sql = "SELECT * FROM beneficiaries ORDER BY full_name ASC";
                                    $result = $conn->query($sql);
                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $id= $row['user_id'];
                                            $fullname= $row["full_name"];
                                            $gender = $row["gender"];
                                            $status = $row['status'];
                                            $bday= $row["dob"];
                                            $address = $row['address'];
                                            $edad = $row['age'];
                                            $number = $row['contact'];
                                            $civilstatus = $row['civil_status'];
                                            $empstatus = $row['emp_status'];
                                            $class= $row['classification'];
                                            $monthpen= $row['month_pen'];
                                            echo'
                                                    <tr>
                                                        <td class="name">'.$fullname.'</td>
                                                        <td scope="row" class="emp1">'.$gender.'</td>
                                                        <td class="name">'.$edad.'</td>
                                                        <td scope="row" class="emp1">'.$status.'</td>
                                                        <td class="name">'.$bday.'</td>
                                                        <td class="name">'.$address.'</td>
                                                        <td class="name">'.$number.'</td>
                                                        <td class="name">'.$civilstatus.'</td>
                                                        <td class="name">'.$empstatus.'</td>
                                                        <td class="name">'.$class.'</td>
                                                        <td class="name">'.$monthpen.'</td>
                                                        <td>
                                                        <div style="display:flex;justify-content: center;">
                                                        <a href="?action=edit&id='.$id.'&error=0" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></font></button></a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="?action=view&id='.$id.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px; "><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg></font></button></a>
                                                       &nbsp;&nbsp;&nbsp;
                                                       <a href="?action=drop&id='.$id.'&name='.$fullname.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></font></button></a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                ';
                                        }
                                    }
                                    else { 
                                        echo "0 results"; 
                                    } 
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
</div>
<div id="4ps" class="table-container">
<table class="display">
<br>
<div style="margin-left:35rem;">
                    <button  class="login-btn btn-primary btn " onclick="showTable('all')">All</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('4ps')">4Ps</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('solo_parent')">Solo Parent</button>
                    <button  class="login-btn btn-primary btn "onclick="showTable('senior_citizen')">Senior Citizen</button>
                </div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Civil Status</th>
                                    <th>Employment Status</th>
                                    <th>Classication</th>
                                    <th>Monthly Pension</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "ayuda");
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }   
                                    $sql = "SELECT * FROM beneficiaries WHERE status='4Ps' ORDER BY full_name ASC";
                                    $result = $conn->query($sql);
                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $id= $row['user_id'];
                                            $fullname= $row["full_name"];
                                            $gender = $row["gender"];
                                            $status = $row['status'];
                                            $bday= $row["dob"];
                                            $address = $row['address'];
                                            $edad = $row['age'];
                                            $number = $row['contact'];
                                            $civilstatus = $row['civil_status'];
                                            $empstatus = $row['emp_status'];
                                            $class= $row['classification'];
                                            $monthpen= $row['month_pen'];
                                            echo'
                                                    <tr>
                                                        <td class="name">'.$fullname.'</td>
                                                        <td scope="row" class="emp1">'.$gender.'</td>
                                                        <td class="name">'.$edad.'</td>
                                                        <td scope="row" class="emp1">'.$status.'</td>
                                                        <td class="name">'.$bday.'</td>
                                                        <td class="name">'.$address.'</td>
                                                        <td class="name">'.$number.'</td>
                                                        <td class="name">'.$civilstatus.'</td>
                                                        <td class="name">'.$empstatus.'</td>
                                                        <td class="name">'.$class.'</td>
                                                        <td class="name">'.$monthpen.'</td>
                                                        <td>
                                                        <div style="display:flex;justify-content: center;">
                                                        <a href="?action=edit&id='.$id.'&error=0" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></font></button></a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="?action=view&id='.$id.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px; "><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg></font></button></a>
                                                       &nbsp;&nbsp;&nbsp;
                                                       <a href="?action=drop&id='.$id.'&name='.$fullname.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></font></button></a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                ';
                                        }
                                    }
                                    else { 
                                        echo "0 results"; 
                                    } 
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
</div>
<div id="solo_parent" class="table-container" >
    <table class="display">
    <br>
    <div style="margin-left:35rem;">
                    <button  class="login-btn btn-primary btn " onclick="showTable('all')">All</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('4ps')">4Ps</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('solo_parent')">Solo Parent</button>
                    <button  class="login-btn btn-primary btn "onclick="showTable('senior_citizen')">Senior Citizen</button>
                </div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Civil Status</th>
                                    <th>Employment Status</th>
                                    <th>Classication</th>
                                    <th>Monthly Pension</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "ayuda");
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }   
                                    $sql = "SELECT * FROM beneficiaries WHERE status='Solo Parent' ORDER BY full_name ASC";
                                    $result = $conn->query($sql);
                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $id= $row['user_id'];
                                            $fullname= $row["full_name"];
                                            $gender = $row["gender"];
                                            $status = $row['status'];
                                            $bday= $row["dob"];
                                            $address = $row['address'];
                                            $edad = $row['age'];
                                            $number = $row['contact'];
                                            $civilstatus = $row['civil_status'];
                                            $empstatus = $row['emp_status'];
                                            $class= $row['classification'];
                                            $monthpen= $row['month_pen'];
                                            echo'
                                                    <tr>
                                                        <td class="name">'.$fullname.'</td>
                                                        <td scope="row" class="emp1">'.$gender.'</td>
                                                        <td class="name">'.$edad.'</td>
                                                        <td scope="row" class="emp1">'.$status.'</td>
                                                        <td class="name">'.$bday.'</td>
                                                        <td class="name">'.$address.'</td>
                                                        <td class="name">'.$number.'</td>
                                                        <td class="name">'.$civilstatus.'</td>
                                                        <td class="name">'.$empstatus.'</td>
                                                        <td class="name">'.$class.'</td>
                                                        <td class="name">'.$monthpen.'</td>
                                                        <td>
                                                        <div style="display:flex;justify-content: center;">
                                                        <a href="?action=edit&id='.$id.'&error=0" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></font></button></a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="?action=view&id='.$id.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px; "><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg></font></button></a>
                                                       &nbsp;&nbsp;&nbsp;
                                                       <a href="?action=drop&id='.$id.'&name='.$fullname.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></font></button></a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                ';
                                        }
                                    }
                                    else { 
                                        echo "0 results"; 
                                    } 
                                    $conn->close();
                                ?>
                            </tbody>
                        </table></div>

<div id="senior_citizen" class="table-container">
    <table class="display">
    <br>
    <div style="margin-left:35rem;">
                    <button  class="login-btn btn-primary btn " onclick="showTable('all')">All</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('4ps')">4Ps</button>
                    <button  class="login-btn btn-primary btn " onclick="showTable('solo_parent')">Solo Parent</button>
                    <button  class="login-btn btn-primary btn "onclick="showTable('senior_citizen')">Senior Citizen</button>
                </div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Civil Status</th>
                                    <th>Employment Status</th>
                                    <th>Classication</th>
                                    <th>Monthly Pension</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "ayuda");
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }   
                                    $sql = "SELECT * FROM beneficiaries WHERE status='Senior Citizen' ORDER BY full_name     ASC";
                                    $result = $conn->query($sql);
                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $id= $row['user_id'];
                                            $fullname= $row["full_name"];
                                            $gender = $row["gender"];
                                            $status = $row['status'];
                                            $bday= $row["dob"];
                                            $address = $row['address'];
                                            $edad = $row['age'];
                                            $number = $row['contact'];
                                            $civilstatus = $row['civil_status'];
                                            $empstatus = $row['emp_status'];
                                            $class= $row['classification'];
                                            $monthpen= $row['month_pen'];
                                            echo'
                                                    <tr>
                                                        <td class="name">'.$fullname.'</td>
                                                        <td scope="row" class="emp1">'.$gender.'</td>
                                                        <td class="name">'.$edad.'</td>
                                                        <td scope="row" class="emp1">'.$status.'</td>
                                                        <td class="name">'.$bday.'</td>
                                                        <td class="name">'.$address.'</td>
                                                        <td class="name">'.$number.'</td>
                                                        <td class="name">'.$civilstatus.'</td>
                                                        <td class="name">'.$empstatus.'</td>
                                                        <td class="name">'.$class.'</td>
                                                        <td class="name">'.$monthpen.'</td>
                                                        <td>
                                                        <div style="display:flex;justify-content: center;">
                                                        <a href="?action=edit&id='.$id.'&error=0" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></font></button></a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="?action=view&id='.$id.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px; "><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg></font></button></a>
                                                       &nbsp;&nbsp;&nbsp;
                                                       <a href="?action=drop&id='.$id.'&name='.$fullname.'" class="non-style-link"><button  class="btn-primary-soft btn "  style="padding:5px; margin-top: 10px;"><font class="tn-in-text" style="font-size:12px;"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></font></button></a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                ';
                                        }
                                    }
                                    else { 
                                        echo "0 results"; 
                                    } 
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
</div>
                        
                        
                       
                        


                        <script>
function showTable(category) {
  // Hide all tables
  var tables = document.querySelectorAll('.table-container');
  tables.forEach(function(table) {
    table.style.display = 'none';
  });

  // Show the selected category table
  var selectedTable = document.getElementById(category);
  if (selectedTable) {
    selectedTable.style.display = 'block';
  }
}
</script>


                                </div>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
            </table>
        </div>
                <?php
                    if($_POST){
                        $keyword=$_POST["search"];
                        
                        $sqlmain= "select * from beneficiaries where full_name='$keyword' or full_name like '$keyword%' or full_name like '%$keyword' or full_name like '%$keyword%'";
                    }else{
                        $sqlmain= "select * from beneficiaries order by user_id desc";

                    }
                ?>      
    </div>
</div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='drop'){
            $nameget=$_GET["full_name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="bene.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>('.substr($nameget,0,40).').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-bene.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="bene.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='view'){
            $sqlmain= "select * from beneficiaries where user_id='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $fullname=$row["full_name"];
            $address=$row["address"];
            $edad=$row["age"];
            $number=$row["contact"];
            $civilstatus=$row["civil_status"];
            $empstatus=$row["emp_status"];
            $class=$row["classification"];
            $monthpen=$row["month_pen"];
            $dob=$row["dob"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="bene.php">&times;</a>
                        <div style="display: flex;justify-content: center;">
                        <table width="75%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;"> Details</p><br><br>
                                </td>
                            </tr>

                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label"><strong>Name:</strong>   '.$fullname.'<br><br></label>
                                </td>
                            </tr>
                            <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><strong>Gender:</strong>   '.$gender.'<br><br></label>
                            </td>
                        </tr>
                        <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><strong>Age:</strong>  '.$edad.' years old<br><br></label>
                            </td>
                        </tr>
                            <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="status" class="form-label"><strong>Status:</strong>:  '.$status.'<br><br></label>
                            </td>
                        </tr>

                        
                        <td class="label-td" colspan="2">
                        <label for="dob" class="form-label"><strong>Date of Birth:</strong> '.$dob.'<br><br></label>
                    </td>
                </tr>


                            <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="address" class="form-label"><strong>Address:</strong>  '.$address.'<br><br></label>
                            </td>
                        </tr>

                        <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><strong>Contact Number:</strong> '.$number.'<br><br></label>
                            </td>
                        </tr>

                        <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><strong>Civil Status:</strong>    '.$civilstatus.'<br><br></label>
                            </td>
                        </tr>
                        <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><strong>Employement Status:</strong>  '.$empstatus.'<br><br></label>
                            </td>
                        </tr>

                        <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><Strong>Classification:</Strong>   '.$class.'<br><br></label>
                            </td>
                        </tr>
                        <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="gender" class="form-label"><strong>Monthly Pension:</strong>  ₱ '.$monthpen.'<br><br></label>
                            </td>
                        </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="bene.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }elseif($action=='add'){
                $error_1=$_GET["error"];
                $errorlist= array(
                    '1'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Person.</label>',
                    '2'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Confirmation Error! Reconfirm Password</label>',
                    '3'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                    '4'=>"",
                    '0'=>'',

                );
                if($error_1!='4'){
                echo '
                <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                        <a class="close" href="bene.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                        <td class="label-td" colspan="2"><?php echo $errorlist[$error_1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0; margin: 0; text-align: center; font-size: 25px; font-weight: 500;">Add Beneficiary</p><br><br>
                                        </td>
                                    </tr>
                                    <form action="add-bene.php" method="POST" class="add-new-form">
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="name" class="form-label">Name:</label>
                                                <input type="text" name="name" class="input-text" placeholder="Name" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label>Gender</label>
                                                <input type="radio" name="gender" value="Female" required> Female
                                                <input type="radio" name="gender" value="Male" required> Male<br><br>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label>Status:</label>
                                                <input type="radio" name="status" value="Solo Parent" required> Solo Parent
                                                <input type="radio" name="status" value="Senior Citizen" required> Senior Citizen
                                                <input type="radio" name="status" value="4Ps" required> 4Ps<br><br>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="District" class="form-label">District:</label>
                                                <select name="District" class="input-text" required>
                                                    <option value="">Choose option</option>
                                                    <option value="District 1">District 1</option>
                                                    <option value="District 2">District 2</option>
                                                    <option value="District 3">District 3</option>
                                                </select><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="dob" class="form-label">Date of Birth:</label>
                                                <input type="date" name="dob" class="input-text" placeholder="Date of Birth" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="Age" class="form-label">Age:</label>
                                                <input type="text" name="age" class="input-text" placeholder="Age" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="civil_status" class="form-label">Civil Status:</label>
                                                <select name="civil_status" class="input-text" required>
                                                    <option value="">Choose option</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                            <label for="area" class="form-label">Area:</label>
                                            
                                            
                                            <select name="area" id="area" class="input-text required>
                                                <option value="">Select an area</option>
                                                ';
                                               
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "ayuda";
                                    
                                              
                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                    
                                               
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }
                                    
                                                
                                                $sql = "SELECT areas FROM area";
                                                $result = $conn->query($sql);
                                    
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                    
                                                        echo "<option value='" . $row['areas'] . "'>" . $row['areas'] . "</option>";
                                                    }
                                                }
                                    
                                               
                                                $conn->close();
                                                echo'
                                            </select>
                                            <!-- <input type="submit" value="Enter"> Remove the submit button -->
                                            <br>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                            <label for="zipcode" name=zipcode class="form-label">Zipcode:</label>
                                            
                                                <select  name="zipcode" id="zipcode" class="input-text required>
                                                    <option value="" class="dropdown">Select an area first</option>
                                                </select>';
                                                ?>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#area').change(function(){
                                                            var selectedArea = $(this).val();
                                                            $.ajax({
                                                                url: 'fetch_zipcodes.php',
                                                                method: 'GET',
                                                                data: { area: selectedArea },
                                                                success: function(response){
                                                                    $('#zipcode').empty();
                                                                    if(response.length > 0) {
                                                                        $.each(response, function(index, value){
                                                                            $('#zipcode').append('<option value="' + value + '">' + value + '</option>');
                                                                        });
                                                                    } else {
                                                                        $('#zipcode').append('<option value="">No zip codes found</option>');
                                                                    }
                                                                }
                                                            });
                                                        });
                                                    });
                                                </script>
                                                <?php echo'
                                                <br>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="EmploymentStatus" class="form-label">Employment Status:</label>
                                                <select name="emp_status" class="input-text" required>
                                                    <option value="">Choose option</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="SelfEmployed">Self-Employed</option>
                                                </select><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="Classification" class="form-label">Classification:</label>
                                                <select name="classification" class="input-text" required>
                                                    <option value="">Choose option</option>
                                                    <option value="Indigent">Indigent</option>
                                                    <option value="Supported">Supported</option>
                                                    <option value="Pensioner">Pensioner</option>
                                                </select><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="MonthlyPension" class="form-label">Monthly Pension:</label>
                                                <input type="text" name="month_pen" class="input-text" placeholder="Monthly Pension" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="contact" class="form-label">Contact:</label>
                                                <input type="text" name="contact" class="input-text" placeholder="Contact" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="contact" class="form-label">Upload an ID:</label>
                                                <input type="file" class="upload input-text" name="fileToUpload" id="fileToUpload"><br>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="address" class="form-label">Address:</label>
                                            <input type="address" name="address" class="input-text" placeholder="Address" required readonly><br>
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
                                            <td colspan="2">
                                                <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="submit" value="Add" id="AddButton" class="login-btn btn-primary btn">
                                            </td>
                                        </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                </div>
            </div>
            
            ';

            }else{
                echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            <br><br><br><br>
                                <h2>Added Successfully!</h2>
                                <a class="close" href="bene.php">&times;</a>
                                <div class="content">
                                    
                                    
                                </div>
                                <div style="display: flex;justify-content: center;">
                                
                                <a href="bene.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

                                </div>
                                <br><br>
                            </center>
                    </div>
                    </div>
        ';
            }
        }elseif($action=='edit'){
            $sqlmain= "select * from beneficiaries where user_id='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["full_name"];
            $address=$row["address"];
            $gender=$row["gender"];
            $age=$row["age"];
            $number=$row["contact"];
            $civilstatus=$row["civil_status"];
            $empstatus=$row["emp_status"];
            $class=$row["classification"];
            $month_pen=$row["month_pen"];
            $dob=$row["dob"];

            $error_1=$_GET["error"];
                $errorlist= array(
                    '1'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this person.</label>',
                    '2'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                    '3'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                    '4'=>"",
                    '0'=>'',

                );

            if($error_1!='4'){
                    echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            
                                <a class="close" href="bene.php">&times;</a> 
                                <div style="display: flex;justify-content: center;">
                                <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                        <td class="label-td" colspan="2">'.
                                            $errorlist[$error_1]
                                        .'</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit beneficiary Details</p>
                                        ID : '.$id.' (Auto Generated)<br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <form action="edit-bene.php" method="POST" class="add-new-form">

                                            <input type="hidden" value="'.$id.'" name="id00">
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="label-td" colspan="2">
                                            <label for="name" class="form-label">Name: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="name" class="input-text" placeholder="Name" value="'.$name.'" ><br>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                    <tr>
                                    <tr>
                                    <td class="label-td" colspan="2">
                                      <label>Gender</label>
                                      </td>
                                                  </tr>
                                                  <tr>
                                      <td class="label-td" colspan="2">
                                            <input type="radio" name="gender" value="Female" required> Female
                                            <input type="radio" name="gender" value="Male" required> Male
                                        </td></tr> 
      
                                              <tr>
                                              <td class="label-td" colspan="2">
                                                  <label>Status:</label>
                                                  </td>
                                                              </tr>
                                                              <tr>
                                                  <td class="label-td" colspan="2">
                                      <input type="radio" name="status" value="Solo Parent" required> Solo Parent
                                      <input type="radio" name="status" value="Senior Citizen" required> Senior Citizen
                                      <input type="radio" name="status" value="4Ps" required> 4Ps
                                      
                                      </td></tr> 
                   
                                  <tr>
                                <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="dob" class="form-label">Date of Birth: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="date" name="dob" class="input-text" placeholder="Date of Birth" value="'.$dob.'" ><br>
                                        </td>
                                    </tr><tr>
                                        <td class="label-td" colspan="2">
                                            <label for="address" class="form-label">Address: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="address" class="input-text" placeholder="Address" value="'.$address.'" ><br>
                                        </td>
                                    </tr>

                                    <tr>
                        
                                    <td class="label-td" colspan="2">
                                        <label for="Age" class="form-label" >Age: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="text" name="age" class="input-text" placeholder="Age" value="'.$age.'"><br>
                                    </td>
                                    
                                </tr>
    
                                <tr>
                            
                                <td class="label-td" colspan="2">
                                    <label for="Civil Status" class="form-label">Civil Status: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                      <input type="radio" name="civil_status" value="Single" required> Single
                                      <input type="radio" name="civil_status" value="Married" required> Married
                                      <input type="radio" name="civil_status" value="Widowed" required> Widowed
                                </td>
                                
                            </tr>
                                
                            <tr>
                            
                            <td class="label-td" colspan="2">
                                <label for="Employment Status" class="form-label">Employment Status: </label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label-td" colspan="2">

                            <input type="radio" name="emp_status" value="Unemployed" required> Unemployed
                            <input type="radio" name="emp_status" value="Employed" required> Employed
                            <input type="radio" name="emp_status" value="Self-Employed" required> Self-Employed

                            </td>
                            
                        </tr>
    
    
                        <tr>
                            
                        <td class="label-td" colspan="2">
                            <label for="Classification" class="form-label">Classification: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                        <input type="radio" name="classification" value="Indigent" required> Indigent 
                        <input type="radio" name="classification" value="Supported" required> Supported
                        <input type="radio" name="classification" value="Pensioner" required> Pensioner
                        </td>
                        
                    </tr>
    
                    <tr>
                            
                            <td class="label-td" colspan="2">
                                <label for="Monthly Pension" class="form-label">Monthly Pension: </label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="text" name="month_pen" class="input-text" placeholder="Monthly Pension" value="'.$month_pen.'"><br>
                            </td>
                            
                        </tr>
    
                        <tr>
                            
                            <td class="label-td" colspan="2">
                                <label for="Contact" class="form-label">Contact: </label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="text" name="Contact" class="input-text" placeholder="Contact" value="'.$number.'"><br>
                            </td>
                            
                        </tr>


                                    <tr>
                                        <td>
                                            <div id="map1" style="width:750px; height:500px;"></div>
                                        </td>
                                    </tr>
                        
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="submit" value="Save" class="login-btn btn-primary btn">
                                        </td>
                        
                                    </tr>
                                
                                    </form>
                                    </tr>
                                </table>
                                </div>
                                </div>
                            </center>
                            <br><br>
                    </div>
                    </div>
                    ';
        }else{
            echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        <center>
                        <br><br><br><br>
                            <h2>Edit Successfully!</h2>
                            <a class="close" href="bene.php">&times;</a>
                            <div class="content">
                                
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="bene.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';



        }; };
    };

?>
</div>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@opencage/geosearch-bundle"></script>
    <script src="https://cdn.jsdelivr.net/npm/@opencage/leaflet-opencage-geosearch"></script>
    <script src="../map/assets/js/map.js"></script>
</body>
</html>
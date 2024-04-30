<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beneficiaries</title>
<style>
  .table-container {
    display: none;
  }
</style>
</head>
<body>
<button onclick="showTable('all')">All</button>
<button onclick="showTable('4ps')">4Ps</button>
<button onclick="showTable('solo_parent')">Solo Parent</button>
<button onclick="showTable('pwd')">PWD</button>
<button onclick="showTable('senior_citizen')">Senior Citizen</button>
<div id="all" class="table-container" style="display:block;">
<table class="display">
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
                                    $sql = "SELECT * FROM beneficiaries ORDER BY user_id ASC";
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
<div>
<div id="4ps" class="table-container">
<table class="display">
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
                                    $sql = "SELECT * FROM beneficiaries WHERE status='4Ps' ORDER BY user_id ASC";
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
<div id="solo_parent" class="table-container">
    <table class="display">
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
                                    $sql = "SELECT * FROM beneficiaries WHERE status='Solo Parent' ORDER BY user_id ASC";
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
<div id="pwd" class="table-container">
    <table class="display">
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
                                    $sql = "SELECT * FROM beneficiaries WHERE status='PWD' ORDER BY user_id ASC";
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
    <table   table class="display">
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
                                    $sql = "SELECT * FROM beneficiaries WHERE status='Senior Citizen' ORDER BY user_id ASC";
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

</body>
</html>
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
      
    <title>Dashboard</title>
    <style>
        body{
            overflow: hidden;
        }
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <?php

    session_start();
    
        include("connection.php");

        $list11 = $database->query("SELECT full_name FROM request;");
        $beneficiariesrow = $database->query("SELECT * FROM beneficiaries;");
        $employeerow = $database->query("SELECT * FROM employee;");
    
    ?> 
    <div>
        <nav>       
            <ul>
                <a href="../map/admap.php "><Button class="logout-btn btn-primary-soft btn" value="Map" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>Map</Button></a>
                <li ><a  class="active" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" class="icnactv icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v8h-6z" /><path d="M4 16h6v4h-6z" /><path d="M14 12h6v8h-6z" /><path d="M14 4h6v4h-6z" /></svg>Dashboard</a></li>
                </li>
                <li><a href="employee.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>Employee</a></li>
                <li><a href="bene.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" /><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M17 10h2a2 2 0 0 1 2 2v1" /><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M3 13v-1a2 2 0 0 1 2 -2h2" /></svg>Beneficiaries</a></li>
                <a href="logout.php"><Button class="logout-btn btn-primary-soft btn" value="Log out" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M15 12h-12l3 -3" /><path d="M6 15l-3 -3" /></svg>Logout</Button></a>
            </ul>
        </nav>
    </div>
        <div class="dash-body" style="margin-top: 20px; margin-left:20%;">
        
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="2" class="nav-bar" >
                                
                                <form action="index.php" method="post" class="header-search">
        
                                    <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Name" list="request">&nbsp;&nbsp;
                                    
                                    <?php
                                echo '<datalist id="request">';
                                $list11 = $database->query("select full_name from request;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["full_name"];
                                    
                                    echo "<option value='$d'><br/>";
                                   
                                };

                            echo ' </datalist>';
?>
                                    
                               
                                    <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                
                                </form>
                                
                            </td>
                            <td width="15%">
                              
                         
                                    <?php 
                              


                                $beneficiariesrow = $database->query("SELECT * FROM beneficiaries;");
                                $employeerow = $database->query("SELECT * FROM employee;");
                                $category1 =  $database->query("SELECT * FROM beneficiaries WHERE status ='Solo Parent';");
                                $category2 =  $database->query("SELECT * FROM beneficiaries WHERE status ='4Ps';");
                                $category3 =  $database->query("SELECT * FROM beneficiaries WHERE status ='Senior Citizen';");
                                $category4 =  $database->query("SELECT * FROM beneficiaries WHERE status ='PWD';");
                                $requestrow = $database->query("SELECT * FROM request;");

 


                                ?>
                                </p>
                            </td>
                          
        
        
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">
                                    <div  class="dashboard-items"  style="padding:9px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $category2->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    4P's &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/employee-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 20%;">
                                    <div  class="dashboard-items"  style="padding:8.5px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $category1->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Solo Parent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/employee-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 20%;">
                                    <div  class="dashboard-items"  style="padding:8px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $category3->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Senior Citizen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/employee-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 20%;">
                                    <div  class="dashboard-items"  style="padding:8px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $beneficiariesrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                Beneficiaries &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/bene-hover.svg');"></div>
                                    </div>
                              
                            </tr>
                        </table>

                    </center>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {

        var data = google.visualization.arrayToDataTable([
            ['Category', 'Value', { role: 'style' }],
            ['4Ps',  <?php    echo $category2->num_rows  ?>, '#007bff'],
            ['Solo Parent',  <?php    echo $category1->num_rows  ?>, '#28a745'],
            ['Senior Citizen', <?php    echo $category3->num_rows  ?>, '#ffc107']  
        ]);

        var options = {
            title : 'BENEFICIARY BAR GRAPH ',
            vAxis: {title: ''},
            hAxis: {title: ''},
            legend: 'none',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    #chart_div {
      width: 100%; /* Adjust chart width as needed */
      height: 500px; /* Adjust chart height as needed */
      margin: 20px auto; /* Center the chart horizontally */
    }
  </style>
    <div id="chart_div" style="width: 1450px; height: 700px;"></div>
  </body>
</body>
</html>
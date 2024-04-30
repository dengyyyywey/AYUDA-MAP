<?php

    try {
        
            include("../ad/connection.php");
            $result001= $database->query("select * from beneficiaries where Latitude IS NOT NULL and Longitude IS NOT NULL ");
    
                
            $data = [];
            for ($y=0;$y<$result001->num_rows;$y++){
                $row=$result001->fetch_assoc();
                $data[] = [$row["user_id"] , $row["Latitude"] , $row["Longitude"], $row["full_name"],$row["full_name"], $row["status"]  ];

            };

            echo json_encode($data);
         
         
    } catch (\Exception $e) {
       echo "FALIED";
    }

   


?>
<?php

include "includes/dbdetail.php";
include "function.php";

 $sql="SELECT * FROM ".$db.".`subscriber` WHERE charging_mode='act' and subscriptionstartdate>'2019-03-14' ORDER BY `id` DESC limit 1,1";

$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$clickid=$row['clickid'];
					$spil=0;
					$serviceid=$row['serviceid'];
				
				
				$callback=callback($clickid,$spil,$serviceid);
				
				}
		/*		
	
$clickid='15525596942800606';
					$spil=0;
					$serviceid=2;
				
				
				$callback=callback($clickid,$spil,$serviceid);*/
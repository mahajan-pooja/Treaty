<?php 

	require '../config.php';
	session_start();
	$userid = $_SESSION['userid'];
	$businesssector_id = $_REQUEST['businesssector_id'];

	// All business Unique
	if($businesssector_id == "all"){
		$query = "SELECT DISTINCT a.userid,a.businessname,b.businesssectortext,a.businessimage,a.businessdescription FROM businessdetail as a JOIN businesssector as b ON a.businesssector = b.id GROUP BY userid ORDER BY userid";
	}	
	else{
		$query = "SELECT DISTINCT a.userid,a.businessname,b.businesssectortext,a.businessimage,a.businessdescription FROM businessdetail as a JOIN businesssector as b ON a.businesssector = b.id WHERE a.businesssector = ".$businesssector_id." GROUP BY userid ORDER BY userid";
	}
	
	$result = $mysqli->query($query);
	$business_array = array();	
	$index = 0;
	while ($row = $result->fetch_assoc()) {
		$business_array[$index] = array($row["userid"],$row["businessname"],$row["businesssectortext"],base64_encode($row["businessimage"]),$row["businessdescription"]);
		$index++;		 
	}

	//All offers
	$query = "SELECT userid, offername, offerdescription, startdate, expirationdate FROM businessoffer ORDER BY userid";

	$result = $mysqli->query($query);
	$offers_array = array();	
	$index = 0;
	while ($row = $result->fetch_assoc()) {
		$offers_array[$index] = array($row["userid"],$row["offername"],$row["offerdescription"],$row["startdate"],$row["expirationdate"]);
		$index++;		 
	}

	// All cities
	$query = "SELECT DISTINCT userid ,city FROM businessdetail ORDER BY userid";

	$result = $mysqli->query($query);
	$city_array = array();
	$index = 0;
	while ($row = $result->fetch_assoc()) {
		$city_array[$index] = array($row["userid"],$row["city"]);
		$index++;			 
	}

	//All Subscribed
	$query = "SELECT userid,businessid,isactive FROM customerbusiness WHERE userid =".$userid." ORDER BY businessid";

	$result = $mysqli->query($query);
	$subscribed_array = array();
	$index = 0;
	while ($row = $result->fetch_assoc()) {
		$subscribed_array[$index] = array($row["userid"],$row["businessid"],$row["isactive"]);
		$index++;			 
	}

	
	//Logic to form list
	
	//------------------------------RAJ Code ---------------------------------								
	//print_r($business_array);									
	foreach ($business_array as $key => $bd_value) {
								
        echo '<table id="media" class="table-responsive" style="background:#fff;">';
        echo '<tr>';                                    
        echo '<td id="media-pad" style="padding:10px">';
        echo '<div style="width:100px;height:100px;border: 1px solid #ccc;">';                                    
        echo "<img src='data:image/jpeg;base64,".$bd_value[3] ."' width='100px' style='height:100px;' />";
        echo '</div>';
        echo '</td>';                                    
        echo '<td id="media-pad" style="vertical-align:top;padding:10px;width: 100%;">';                                    
        echo '<p style="font-size:18px;color:#000">' . $bd_value[1] . '</p>'; //Name
        echo '<p style="font-size:12px;color: #6d6c6c;">' . $bd_value[2] . '</p>'; //Sector
        echo '<p style="font-size:14px;color: #6d6c6c;">' . $bd_value[4] . '</p>'; //Description
                                            
        //Collect all Locations
        $branches = "";
        foreach ($city_array as $key1 => $c_value) {
            if($bd_value[0] == $c_value[0]){
                $branches = $branches . "," .$c_value[1];
            }
        }									
        echo '<p style="color:#000;color: #6d6c6c;">Locations : ' . ltrim($branches,",") . '</p>';				
        //Collect offer details                                     
        $offer_list = "";                                   
        foreach ($offers_array as $key2 => $o_value) {                                    	
            if(($bd_value[0] == $o_value[0]) and strtotime($o_value[4]) >= strtotime(date("Y-m-d"))){
          		$offer_list = $offer_list . "<li style='color: chocolate;'>" .$o_value[1] . " | ".$o_value[2]." | Valid Till: ".date("m-d-Y",strtotime($o_value[4])). "</li>";									
            }
        }
        if($offer_list != ""){
           	echo '<p style="color:#000">Available Offers: </p>';                                    	
        }
        echo '<ul style="list-style: inherit;padding-left:30px;font-size:14px">';
        echo $offer_list;
        $bid = $bd_value[0];
        echo '</ul>';
		echo '<br>';
		echo '<p>';
		// Check if user is already subscribed to the business
		$already_subscribed_flag = 0;
		foreach ($subscribed_array as $key3 => $subscribed_value) {										
			if(($bd_value[0] == $subscribed_value[1]) and ($subscribed_value[2] == 1) ){
				$already_subscribed_flag = 1;
				break;
			}
		}
		if($already_subscribed_flag == 0){
			echo "<a style='padding: 0px 5px;font-size: 12px;margin-left: 0px;' class='btn btn-primary btn-xs' href='subscribe.php?bid=".$bid."&cid=".$userid."'>Subscribe</a>";
		}else{
			echo "<a disabled style='padding: 0px 5px;font-size: 12px;margin-left: 0px;' class='btn btn-primary btn-xs' href=''>Subscribed</a>";
		}
								
		echo "<a style='padding: 0px 5px;font-size: 12px;' role='button' data-toggle='modal' class='btn btn-primary btn-xs' onClick ='show_modal(".$bid.", \"".$bd_value[1]."\");'>View Details</a>";
		echo '</p>';
        echo '</td>';        
        echo '</tr>';
        echo '</table>'; 
        echo '<br>';                                   
                        
	}	
	echo '<div id="myModal" class="modal hide fade">										
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id = "business_name" style="text-align:left"></h3>
	</div>	
	<div class="modal-body">'; 
		
		
	echo '</div>	
	<div class="modal-footer">
		<a href="#" style="float: right;" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>';
	
 ?>


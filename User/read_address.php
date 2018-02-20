
<?php
    
    session_start();        
    require "../config.php";

    $user_lat = ($_REQUEST['user_lat']);
    $user_lon = ($_REQUEST['user_lon']);

   //$user_lat = 37.4323;
   //$user_lon = -121.8996;

    $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$user_lat.','.$user_lon.'&sensor=false');

    $output= json_decode($geocode);
              
        for($j=0;$j<count($output->results[0]->address_components);$j++){
            $cn=array($output->results[0]->address_components[$j]->types[0]);
            if(in_array("locality", $cn))
            {
                $_SESSION['curr_city']= $output->results[0]->address_components[$j]->long_name;
                echo $output->results[0]->address_components[$j]->long_name;
           }
           if(isset($_SESSION['curr_city'])){
                break;
           }
        }
    $city=$_SESSION['curr_city'];

    $query = "SELECT businessname,businesssector,address1,address2,city,state,country,zipcode FROM businessdetail where city='".$city."'";

    $result = $mysqli->query($query);
    $markers=array();
    $tagCount=0;
    while($row = mysqli_fetch_array($result)){

        if($row['address2'] == ""){

            $full_address = $row['address1'] . "," . $row['city'] .",". $row['state'] .",". $row['country'] ." ". $row['zipcode'];
        }
        else{
            $full_address = $row['address1'] . "," .$row['address2'] .",". $row['city'] .",". $row['state'] .",". $row['country'] ." ". $row['zipcode'];
        }
        // Get JSON results from this request
            $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($full_address).'&sensor=false');
            $geo = json_decode($geo, true); // Convert the JSON to an array

            if (isset($geo['status']) && ($geo['status'] == 'OK')) {

                $db_lat = $geo['results'][0]['geometry']['location']['lat']; // Latitude
                $db_lon = $geo['results'][0]['geometry']['location']['lng']; // Longitude

                $tempArray=array();


                //calculate distance
                $cal_distance=getDistance($db_lat,$db_lon,$user_lat,$user_lon)."<br/><br/>";
                if($cal_distance <= 8)
                {
                    array_push($tempArray,++$tagCount);
                    array_push($tempArray,$db_lat);
                    array_push($tempArray,$db_lon);
                    array_push($tempArray,$row['businessname']);
                    array_push($tempArray,$full_address);
                    array_push($tempArray,round($cal_distance,2));
                    
                    array_push($markers, $tempArray);

                }
          }

    }
    $makersObject = (object) $markers;
    $markerJson = json_encode($makersObject);

    echo $markerJson;
        

function getDistance($lat1, $lon1, $lat2, $lon2, $unit="miles") {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}


            

                    
?>
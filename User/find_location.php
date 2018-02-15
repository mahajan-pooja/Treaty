<?php
$address = '1095 E. Brokaw Road, Suite 60, Brokaw Commons'; // Address

// Get JSON results from this request
$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
$geo = json_decode($geo, true); // Convert the JSON to an array

if (isset($geo['status']) && ($geo['status'] == 'OK')) {
  $_SESSION['latitude'] = $geo['results'][0]['geometry']['location']['lat']; // Latitude
  $_SESSION['longitude'] = $geo['results'][0]['geometry']['location']['lng']; // Longitude
}
?>

<!DOCTYPE html>
<html>
<body>
<H1>Find Location</H1>
<?php echo "Lan:"; ?>
<?php echo $_SESSION['latitude'] ?>
<?php echo $_SESSION['longitude'] ?>
 
<div id="mapholder"></div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyB0qpryTItej9VssEJCtYPwddIIjdtqwu8"></script>

<script>
getLocation();
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    var latlon = new google.maps.LatLng(lat, lon)
    var mapholder = document.getElementById('mapholder')
    mapholder.style.height = '500px';
    mapholder.style.width = '1000px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,    
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
       
    }

    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,label:{text:"You",color:"#ffffff",fontWeight: "bold"}});

    //bussiness
    latlon = new google.maps.LatLng(<?php echo $_SESSION['latitude'] ?>,<?php echo $_SESSION['longitude'] ?>)
    var marker = new google.maps.Marker({position:latlon,map:map,label:{text:"1",color:"#ffffff",fontWeight: "bold"}});

}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
</script>

</body>
</html>
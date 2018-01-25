function loadPoints(){
	// document.getElementById('pointsDiv').style.display = 'block';
	// document.getElementById('downImg').src = 'images/up.png';


	var x = document.getElementById("pointsDiv");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById('downImg').src = 'images/up.png';
    } else {
        x.style.display = "none";
        document.getElementById('downImg').src = 'images/down.png';
    }
}

function loadSubCat(){ 
	var x = document.getElementById("business_title");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById('business_title_downImg').src = 'images/up.png';
    } else {
        x.style.display = "none";
        document.getElementById('business_title_downImg').src = 'images/down.png';
    }
}

function loadOffer(){
var x = document.getElementById("offer");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById('offer_downImg').src = 'images/up.png';
    } else {
        x.style.display = "none";
        document.getElementById('offer_downImg').src = 'images/down.png';
    }
}
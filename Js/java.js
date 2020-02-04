function updatepop() {
	// body...

	var x = document.getElementById('updateform');
	if (x.style.display === "none") {
		x.style.display = "block";
	}
	else{
		x.style.display = "none";
	}


}

function displayaboutme(){
	var applications = document.getElementById("applications");
	var aboutme = document.getElementById("aboutme");
	var jobs = document.getElementById("jobs");
	var internships = document.getElementById("Internships");
	var resources = document.getElementById("Resources")
	
	// let's hide the other stuff then;
	aboutme.style.display = "block";
	jobs.style.display = "none";
	internships.style.display = "none";
	resources.style.display="none";
	applications.style.display = "none";
	
}

function displayjobs(){
	var applications = document.getElementById("applications");
	var aboutme = document.getElementById("aboutme");
	var jobs = document.getElementById("jobs");
	var internships = document.getElementById("Internships");
	var resources = document.getElementById("Resources")
	
	// let's hide the other stuff then;
	aboutme.style.display = "none";
	jobs.style.display = "block";
	internships.style.display = "none";
	resources.style.display="none";
	applications.style.display = "none";
	
}

function displayinternships(){
	var applications = document.getElementById("applications");
	var aboutme = document.getElementById("aboutme");
	var jobs = document.getElementById("jobs");
	var internships = document.getElementById("Internships");
	var resources = document.getElementById("Resources")
	
	// let's hide the other stuff then;
	aboutme.style.display = "none";
	jobs.style.display = "none";
	internships.style.display = "block";
	resources.style.display="none";
	applications.style.display = "none";
	
}

function displayresources(){
	var applications = document.getElementById("applications");
	var aboutme = document.getElementById("aboutme");
	var jobs = document.getElementById("jobs");
	var internships = document.getElementById("Internships");
	var resources = document.getElementById("Resources")
	
	// let's hide the other stuff then;
	aboutme.style.display = "none";
	jobs.style.display = "none";
	internships.style.display = "none";
	resources.style.display="block";
	applications.style.display = "none";
	
}


function displayapplications(){
	var applications = document.getElementById("applications");
	var aboutme = document.getElementById("aboutme");
	var jobs = document.getElementById("jobs");
	var internships = document.getElementById("Internships");
	var resources = document.getElementById("Resources")
	
	// let's hide the other stuff then;
	aboutme.style.display = "none";
	jobs.style.display = "none";
	internships.style.display = "none";
	resources.style.display="none";
	applications.style.display = "block";

}

function picturepic(){
	var pic = document.getElementById("formtoupload");
	pic.style.display="block";
}

function triggerClick(e) {
  document.querySelector('#picture').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
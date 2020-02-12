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

	var deleteactive = document.getElementsByClassName("links");


	//BCKG variables
     var abt_bckg = document.getElementById("bckg1");
     var bckg2 = document.getElementById("bckg2");
     var bckg3 = document.getElementById("bckg3");
     var bckg4 = document.getElementById("bckg4");
     var bckg5 = document.getElementById("bckg5");
     var bckg6 = document.getElementById("bckg6");
     abt_bckg.style.background = "#C8E31C";
     bckg2.style.background="";
     bckg3.style.background="";
     bckg4.style.background="";
     bckg5.style.background="";
     bckg6.style.background="";
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
		var deleteactive = document.getElementById("active");

    
    //BCKG variables
     var abt_bckg = document.getElementById("bckg1");
     var bckg2 = document.getElementById("bckg2");
     var bckg3 = document.getElementById("bckg3");
     var bckg4 = document.getElementById("bckg4");
     var bckg5 = document.getElementById("bckg5");
     var bckg6 = document.getElementById("bckg6");
     abt_bckg.style.background = "";
     bckg2.style.background="#C8E31C";
     bckg3.style.background="";
     bckg4.style.background="";
     bckg5.style.background="";
     bckg6.style.background="";
     deleteactive.style.background="";

	
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

	//BCKG variables
     var abt_bckg = document.getElementById("bckg1");
     var bckg2 = document.getElementById("bckg2");
     var bckg3 = document.getElementById("bckg3");
     var bckg4 = document.getElementById("bckg4");
     var bckg5 = document.getElementById("bckg5");
     var bckg6 = document.getElementById("bckg6");
     abt_bckg.style.background = "";
     bckg2.style.background="";
     bckg3.style.background="";
     bckg4.style.background="#C8E31C";
     bckg5.style.background="";
     bckg6.style.background="";

	
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

	//BCKG variables
     var abt_bckg = document.getElementById("bckg1");
     var bckg2 = document.getElementById("bckg2");
     var bckg3 = document.getElementById("bckg3");
     var bckg4 = document.getElementById("bckg4");
     var bckg5 = document.getElementById("bckg5");
     var bckg6 = document.getElementById("bckg6");
     abt_bckg.style.background = "";
     bckg2.style.background="";
     bckg3.style.background="";
     bckg4.style.background="";
     bckg5.style.background="#C8E31C";
     bckg6.style.background="";

	
}


function displayapplications(){
	var applications = document.getElementById("applications");
	var aboutme = document.getElementById("aboutme");
	var jobs = document.getElementById("jobs");
	var internships = document.getElementById("Internships");
	var resources = document.getElementById("Resources");
	
	// let's hide the other stuff then;
	aboutme.style.display = "none";
	jobs.style.display = "none";
	internships.style.display = "none";
	resources.style.display="none";
	applications.style.display = "block";
     
     //BCKG variables
     var abt_bckg = document.getElementById("bckg1");
     var bckg2 = document.getElementById("bckg2");
     var bckg3 = document.getElementById("bckg3");
     var bckg4 = document.getElementById("bckg4");
     var bckg5 = document.getElementById("bckg5");
     var bckg6 = document.getElementById("bckg6");
     abt_bckg.style.background = "";
     bckg2.style.background="";
     bckg3.style.background="#C8E31C";
     bckg4.style.background="";
     bckg5.style.background="";
     bckg6.style.background="";



}

function picturepic(){
	var pic = document.getElementById("formtoupload");
	if (pic.style.display==="block") {
		pic.style.display = "none";
	}
	else{
		pic.style.display="block";
	}
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



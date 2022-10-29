var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
	document.getElementById("nextBtn").innerHTML = "Pay";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("appointmentform").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

function ShowHideDiv() {
  var fullerton = document.getElementById("Fullerton");
  var dvtext = document.getElementById("dvtext");
  dvtext.style.display = fullerton.checked ? "block" : "none";
  
  var raffles = document.getElementById("Raffles");
  var dvtext2 = document.getElementById("dvtext2");
  dvtext2.style.display = raffles.checked ? "block" : "none";
}

function getlocation() {
  var radioBtn = document.getElementsByName("location");
  var c;
  for(i=0; i<radioBtn.length; i++){
   if(radioBtn[i].checked){
     c = radioBtn[i].value;
   }
  }
  document.getElementById("location").innerHTML = c;
}

function getdoctor() {
  var radioBtn = document.getElementsByName("doctor");
  var c;
  for(i=0; i<radioBtn.length; i++){
   if(radioBtn[i].checked){
     c = radioBtn[i].value;
   }
  }
  document.getElementById("doctor").innerHTML = c;
}

function getDate() {
  var x = document.getElementById("date").value;
  document.getElementById("date-confirm").value = x;
}

function getTime() {
  var radioBtn = document.getElementsByName("timeslot");
  var c;
  for(i=0; i<radioBtn.length; i++){
   if(radioBtn[i].checked){
     c = radioBtn[i].value;
   }
  }
  document.getElementById("time").innerHTML = c;
}

function chkDate(event) {

  // Get the target node of the event
  
  var dateInput = event.currentTarget;
  const currentDate = Date.now() + 6*1000*60*60;
  const dateValue = new Date(dateInput.value);

  if (dateValue <= currentDate) {
    alert("The date you entered (" + dateInput.value + 
          ") should be after today \n");
    dateInput.focus();
    dateInput.select();
	dateInput.value = currentDate;
    return false;
  } 
}

var dateNode = document.getElementById("date");

dateNode.addEventListener("change", chkDate, false);
var today = new Date();
today = new Date(today.setDate(today.getDate() + 2))
  .toISOString()
  .split("T")[0];
document.getElementsByName("date")[0].setAttribute("min", today);

function chkDate(event) {
  // Get the target node of the event

  var dateInput = event.currentTarget;
  const currentDate = Date.now() + 6 * 1000 * 60 * 60;
  const dateValue = new Date(dateInput.value);

  if (dateValue <= currentDate) {
    alert(
      "The date you entered (" + dateInput.value + ") should be after today \n"
    );
    dateInput.focus();
    dateInput.select();
    dateInput.value = currentDate;
    return false;
  }
}

var dateNode = document.getElementById("date");

dateNode.addEventListener("change", chkDate, false);

function getlocation() {
  var radioBtn = document.getElementsByName("location");
  var c;
  var d;
  for(i=0; i<radioBtn.length; i++){
   if(radioBtn[i].checked){
     c = radioBtn[i].value;
	 if (c == "1") {
	 d = "NTU Clinic Fullerton";
	 }
	 else if (c == "2") {
	 d = "NTU Clinic Raffles";
	 }
   }
  }
  document.getElementById("location").innerHTML = d;
}

function getdoctor() {
  var radioBtn = document.getElementsByName("doctor");
  var c;
  var d;
  for(i=0; i<radioBtn.length; i++){
   if(radioBtn[i].checked){
     c = radioBtn[i].value;
	 if (c == "1") {
	 d = "Dr Tan Kim";
	 }
	 else if (c == "2") {
	 d = "Dr Stanford";
	 }
	 else if (c == "3") {
	 d = "Dr Tasha";
	 }
	 else if (c == "4") {
	 d = "Dr Strange";
	 }
	 else if (c == "5") {
	 d = "Dr Kang";
	 }
   }
  }
  document.getElementById("doctor").innerHTML = d;
}

function getDate() {
  var x = document.getElementById("date").value;
  document.getElementById("date_show").innerHTML = x.toString();
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

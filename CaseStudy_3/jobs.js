function chkName(event) {

  // Get the target node of the event
  
  var nameInput = event.currentTarget;

  var pos = nameInput.value.search(/^[a-zA-Z][a-zA-Z ]+?$/);

  if (pos != 0) {
    alert("The name you entered (" + nameInput.value + 
          ") is not in the correct form. \n" +
          "It should contains at least one " +
          "alphabet characters and character spaces.");
    nameInput.focus();
    nameInput.select();
    return false;
  } 
}

function chkEmail(event) {

  // Get the target node of the event
  
  var emailInput = event.currentTarget;

  var pos = emailInput.value.search(/^[\w-\.]+@([\w]+\.)([\w]+\.)?([\w]+\.)?[\w]{2,3}$/);

  if (pos != 0) {
    alert("The email you entered (" + emailInput.value + 
          ") is not in the correct form. \n");
    emailInput.focus();
    emailInput.select();
    return false;
  } 
}


function chkDate(event) {

  // Get the target node of the event
  
  var dateInput = event.currentTarget;
  const currentDate = Date.now();
  const dateValue = new Date(dateInput.value);

  if (dateValue <= Date.now()) {
    alert("The date you entered (" + dateInput.value + 
          ") should be after today \n");
    dateInput.focus();
    dateInput.select();
    return false;
  } 
}


var nameNode = document.getElementById("name");
var emailNode = document.getElementById("email");
var dateNode = document.getElementById("date");

nameNode.addEventListener("change", chkName, false);
emailNode.addEventListener("change", chkEmail, false);
dateNode.addEventListener("change", chkDate, false);

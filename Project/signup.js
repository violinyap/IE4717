console.log('bye');
function checkNRIC(event) {

  // Get the target node of the event


  var nricInput = event.currentTarget;

  var pos = nricInput.value.search(/(?i)^[STFG]\d{7}[A-Z]$/);
  console.log('nric check', pos);
  if (pos != 0) {
    alert("The NRIC/FIN you entered (" + nricInput.value + 
          ") is not in the correct form. The format should be an alphabet (S/T/F/G), followed by 7 numbers, and ends with another alphabet. \n");
    nricInput.focus();
    nricInput.select();
    return false;
  } 
  }

var nricNode = document.getElementById("nric");
nricNode.addEventListener("change", checkNRIC, false);

var today = new Date();
today = new Date(today.setDate(today.getDate()))
  .toISOString()
  .split("T")[0];
document.getElementsByName("date")[0].setAttribute("max", today);

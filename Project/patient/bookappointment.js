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

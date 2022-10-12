function allowEditJJ(event) {
  var editJJ = event.currentTarget;
  var JJpriceNode = document.getElementById("JJPrice");
  var JJsubmitNode = document.getElementById("saveJJ");

  if (editJJ.checked) {
    JJpriceNode.removeAttribute('disabled');
    JJsubmitNode.removeAttribute('disabled');
  } else {
    JJpriceNode.setAttribute('disabled','');
    JJsubmitNode.setAttribute('disabled','');
  }
}

function allowEditAL(event) {
  var editAL = event.currentTarget;
  var ALpriceSNode = document.getElementById("ALPriceS");
  var ALpriceDNode = document.getElementById("ALPriceD");
  var ALsubmitNode = document.getElementById("saveAL");

  if (editAL.checked) {
    ALpriceSNode.removeAttribute('disabled');
    ALpriceDNode.removeAttribute('disabled');
    ALsubmitNode.removeAttribute('disabled');
  } else {
    ALpriceSNode.setAttribute('disabled','');
    ALpriceDNode.setAttribute('disabled','');
    ALsubmitNode.setAttribute('disabled','');
  }
}

function allowEditIC(event) {
  var editIC = event.currentTarget;
  var ICpriceSNode = document.getElementById("CPriceS");
  var ICpriceDNode = document.getElementById("CPriceD");
  var ICsubmitNode = document.getElementById("saveIC");

  if (editIC.checked) {
    ICpriceSNode.removeAttribute('disabled');
    ICpriceDNode.removeAttribute('disabled');
    ICsubmitNode.removeAttribute('disabled');
  } else {
    ICpriceSNode.setAttribute('disabled','');
    ICpriceDNode.setAttribute('disabled','');
    ICsubmitNode.setAttribute('disabled','');
  }
}


var editJJNode = document.getElementById("editJJ");
var editALNode = document.getElementById("editAL");
var editICNode = document.getElementById("editIC");

editJJNode.addEventListener("change", allowEditJJ, false);
editALNode.addEventListener("change", allowEditAL, false);
editICNode.addEventListener("change", allowEditIC, false);

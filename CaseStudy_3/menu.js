function calculatesubtotal(){
  var price1 = 2.00;
  var qty1 = document.getElementById('JJQty').value;
  var subtotal1 = price1 * qty1;
  document.getElementById('subtotal1').value = subtotal1.toFixed(2);
  
  var price2 = 2.00;
  var price3 = 3.00;
  var qty2 = document.getElementById('ALQty1').value;
  var qty3 = document.getElementById('ALQty2').value;
  var subtotal2 = (price2 * qty2) + (price3 * qty3);
  document.getElementById('subtotal2').value = subtotal2.toFixed(2);
  
  var price4 = 4.75;
  var price5 = 5.75;
  var qty4 = document.getElementById('CQty1').value;
  var qty5 = document.getElementById('CQty2').value;
  var subtotal3 = (price4 * qty4) + (price5 * qty5);
  document.getElementById('subtotal3').value = subtotal3.toFixed(2);
  
  var totalprice = subtotal1 + subtotal2 + subtotal3;
  document.getElementById('totalprice').value = totalprice.toFixed(2);
}

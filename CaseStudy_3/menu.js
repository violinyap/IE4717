function calculatesubtotal(){
  var price1 = 2.00;
  var qty1 = document.getElementById('JJQty').value;
  var subtotal1 = price1 * qty1;
  document.getElementById('subtotal1').innerHTML = subtotal1.toFixed(2);
  
  var price2=0;
  if (document.getElementById('AL1').checked == true)
  {price2 = 2.00;}
  if (document.getElementById('AL2').checked == true) 
  {price2 = 3.00;}
  var qty2 = document.getElementById('ALQty').value;
  var subtotal2 = price2 * qty2;
  document.getElementById('subtotal2').innerHTML = subtotal2.toFixed(2);
  
  var price3=0;
  if (document.getElementById('C1').checked == true) 
  {price3 = 4.75; }
  if (document.getElementById('C2').checked == true) 
  {price3 = 5.75;}
  var qty3 = document.getElementById('CQty').value;
  var subtotal3 = price3 * qty3;
  document.getElementById('subtotal3').innerHTML = subtotal3.toFixed(2);
  
  var totalprice = subtotal1 + subtotal2 + subtotal3;
  document.getElementById('totalprice').innerHTML = totalprice.toFixed(2);
}

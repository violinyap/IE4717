function savePrice(coffeeType) {
  // TODO: handle non number input
  switch (coffeeType) {
    case 'justjava':
      const newJJPrice = document.getElementById('JJPrice').value;
      // post to database
      document.getElementById('justjava-endless').innerHTML = parseFloat(newJJPrice).toFixed(2);
      document.getElementById('JJPrice').value = 0.00;
      break;

    case 'aulait':
      const newALSPrice = document.getElementById('ALPriceS').value;
      const newALDPrice = document.getElementById('ALPriceD').value;

      // post to database
      document.getElementById('aulait-single').innerHTML = parseFloat(newALSPrice).toFixed(2);
      document.getElementById('aulait-double').innerHTML = parseFloat(newALDPrice).toFixed(2);
      document.getElementById('ALPriceS').value = 0;
      document.getElementById('ALPriceD').value = 0;
      break;

    case 'cappuccino':
      const newCSPrice = document.getElementById('CPriceS').value;
      const newCDPrice = document.getElementById('CPriceD').value;

      // post to database
      document.getElementById('cappuccino-single').innerHTML = parseFloat(newCSPrice).toFixed(2);
      document.getElementById('cappuccino-double').innerHTML = parseFloat(newCDPrice).toFixed(2);
      document.getElementById('CPriceS').value = 0;
      document.getElementById('CPriceD').value = 0;
      break;
  }
}
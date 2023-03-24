window.addEventListener('DOMContentLoaded', function() {
  var orderIdInput = document.getElementById('order_id');
  var productValueInput = document.getElementById('product-value');

  // Generate random order ID of at least 4 digits
  var orderId = Math.floor(Math.random() * (9999 - 1000 + 1) + 1000);
  
    // Set the values of the input fields
    orderIdInput.value = orderId;
    productValueInput.value = '₹499';
  });